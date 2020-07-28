<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Resources\Slider;
use App\Models\sliderBar;
use App\Models\neighborhood;
use App\Models\Nav_bar;
use App\Models\blogs;
use App\Models\Business_type;
use App\Models\Service;

use App\Http\Resources\Category;
use App\Http\Resources\ServicesVenue;
use App\Http\Resources\NavBar;
use App\Http\Resources\Blog;
use App\Http\Resources\FoodSubCategory;
use App\Http\Resources\neighbor_hood;
use App\Http\Resources\ServicesFood;

class HomePageController extends Controller
{


    /** api for return
     * all place services grouped by subCategory
     */
    public function venues_services()
    {
        $lang = App::getLocale();

        $business_types = Business_type::where('parent_id', 1)->where('status', 1)->get();

        $data = [];

        foreach ($business_types as $business_type) {

            $places = Service::select(
                'services.id as id',
                'address.neighborhood_en as neighborhood_en',
                'address.neighborhood_ar as neighborhood_ar',
                'place.max_capacity',
                'place.min_price as min_price',
                'image.url as image',
                'offer.discount_type as offer_type',
                'offer.discount_value as offer_value',
                'package.id as package_id'
            )
                ->where('services.status', true)
                ->where('services.show_in_homePage', true)
                ->where('services.main_category', 1)
                ->where('services.business_type_id', $business_type->id)
                ->join('services_place as place', function ($join) {
                    $join->on('services.id', '=', 'place.service_id');
                })
                ->leftJoin('provider_address as address', function ($join) {
                    $join->on('services.provider_id', '=', 'address.foreign_id')
                        ->where('address.type', 'provider_address');
                })
                /** join with service place images table */
                ->leftJoin('service_image as image', function ($join) {
                    $join->on('services.id', '=', 'image.service_id')
                        ->where('image.size', 'medium')
                        ->where('image.is_master', 1);
                })
                /** join with service offer table */
                ->leftJoin('service_offer as offer', function ($join) {
                    $join->on('services.id', '=', 'offer.service_id')
                        ->where('offer.date_to', '>=', Carbon::now())
                        ->where('offer.date_from', '<=', Carbon::now());
                })
                /** join with service packages table */
                ->leftJoin('service_packages as package', function ($join) {
                    $join->on('services.id', '=', 'package.service_id')
                        ->join('packages as p', function ($join2) {
                            $join2->on('package.packages_id', '=', 'p.id')
                                ->where('p.date_to', '>=', Carbon::now())
                                ->where('p.date_from', '<=', Carbon::now());
                        });
                })
                ->take(15)->orderBy('services.id', 'desc')->groupBy('services.id')->get();

            $data[$business_type->name] = ServicesVenue::collection($places);
        }

        return response()->json([
            "status" => 200,
            "message" => 'data returned successfully',
            "data"  => $data,
        ], 200);
    }


    /** api for return
     * all place services grouped by subCategory
     */
    public function catering_services()
    {
        $lang = App::getLocale();

        $business_types = Business_type::where('parent_id', 2)->where('status', 1)->get();

        $data = [];

        foreach ($business_types as $business_type) {

            $food = Service::select(
                'services.id as id',
                'food.max_num_order_day',
                'food.price_per_item',
                'image.url as image',
                'offer.discount_type as offer_type',
                'offer.discount_value as offer_value',
                'package.id as package_id'
                // 'subcategory.name as business_name'
            )
                ->where('services.status', true)
                ->where('services.show_in_homePage', true)
                ->where('services.main_category', 2)
                ->join('business_type_translation as subcategory', function ($join) use ($business_type) {
                    $join->on('services.business_type_id', '=', 'subcategory.business_type_id')
                        ->where('services.business_type_id', $business_type->id)
                        ->where('subcategory.locale', App::getLocale());
                })
                ->join('services_food as food', function ($join) {
                    $join->on('services.id', '=', 'food.service_id');
                })
                /** join with service place images table */
                ->leftJoin('service_image as image', function ($join) {
                    $join->on('services.id', '=', 'image.service_id')
                        ->where('image.size', 'medium')
                        ->where('image.is_master', 1);
                })
                /** join with service offer table */
                ->leftJoin('service_offer as offer', function ($join) {
                    $join->on('services.id', '=', 'offer.service_id')
                        ->where('offer.date_to', '>=', Carbon::now())
                        ->where('offer.date_from', '<=', Carbon::now());
                })
                /** join with service packages table */
                ->leftJoin('service_packages as package', function ($join) {
                    $join->on('services.id', '=', 'package.service_id')
                        ->join('packages as p', function ($join2) {
                            $join2->on('package.packages_id', '=', 'p.id')
                                ->where('p.date_to', '>=', Carbon::now())
                                ->where('p.date_from', '<=', Carbon::now());
                        });
                })
                ->take(15)->orderBy('services.id', 'desc')->groupBy('services.id')->get();

            $data[$business_type->name] = ServicesFood::collection($food);
        }

        return response()->json([
            "status" => 200,
            "message" => 'data returned successfully',
            "data"  => $data,
        ], 200);
    }

    /**
     *
     * api for return subcategory for main category
     * grouped by main Category name
     */
    public function category_subcategory()
    {

        $business_types_sub = Business_type::withCount('services')->with('parent')
            ->has('services', '>', 0)
            ->has('parent.services_by_main', '>', 0)
            ->where('status', true)
            ->where('show_in_homePage', true)
            ->orderBy('services_count', 'desc')
            ->get();

        $data = Category::collection($business_types_sub);

        $data = collect($data)->groupBy('main_category_name')->map(function ($group) {
            return $group->map(function ($value) {
                unset($value['main_category_name']);
                unset($value['main_category_id']);
                return $value;
            });
        });

        return response()->json([
            "status" => 200,
            "message" => 'data returned successfully',
            "data"  => $data
        ], 200);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     * This API To Get data of Slider Bar With
     * image according to Language and Link
     * where Status is active and Date Between Start ,End Date
     *
     */
    public function slider_bar()
    {
        $lang = App::getLocale();
        $final_data = SliderBar::select('image_' . $lang . ' as image', 'link')

            ->whereDate('start_date', '<=', date("Y-m-d"))

            ->whereDate('end_date', '>=', date("Y-m-d"))

            ->where(['active' => 1])

            ->get();

        return response()->json(
            [
                "status" => 200,
                "data"  => Slider::collection($final_data),
            ],
            200
        );
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     *This API To Get
     * data of NavBar With Name according to
     * Language and Link
     * where Status is active
     */
    public function nav_bar()
    {
        $lang = App::getLocale();
        $final_data = Nav_bar::select('id', 'name_' . $lang . ' as name', 'link as link')
            ->where(['active' => 1])
            ->get();
        return response()->json([
            "status" => 200,
            "data"  => NavBar::collection($final_data),
        ], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function blog()
    {
        $lang = App::getLocale();
        $final_data = blogs::select(
            'id',
            'title_' . $lang . ' as title',
            'image_' . $lang . ' as image',
            'link as link',
            'blog_date as blog_date'
        )
            ->where(['active' => 1])
            ->take(3)->orderBy('blog_date', 'desc')
            ->get();
        return response()->json([
            "status" => 200,
            "data"  => Blog::collection($final_data),
        ], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *This API To get just 4 Neighborhood around
     *that's after check
     * if provider add service address to check
     * if Neighborhood is exists or not
     *
     */
    public function discover_neighborhood()
    {
        $lang = App::getLocale();
        $final_data = neighborhood::select(
            'id',
            'neighborhood_' . $lang . ' as neighborhood',
            'image',
            'neighborhood_key as neighborhood_key'
        )
            ->where(['active' => 1])
            ->where(['show_in_home_page' => 1])
            ->take(4)
            ->get();
        return response()->json([
            "status" => 200,
            "data"  => neighbor_hood::collection($final_data),
        ], 200);
    }
}