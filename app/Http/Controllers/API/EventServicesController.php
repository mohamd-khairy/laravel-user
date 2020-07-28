<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\SearchService;
use App\Http\Requests\EventServiceRequest;
use App\Http\Requests\FilterEventRequest;
use App\Models\Business_type;
use App\Models\Business_typeTranslation;
use App\Models\FitsWithTranslation;
use App\Models\Service;
use App\Models\Service_Place;
use App\Models\ServiceFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventServicesController extends Controller
{
    public $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function get_events($id, EventServiceRequest $request)
    {
        $category = $request->category ?? 1;
        $fits_with_id = $id;
        $sortDirection = $request->sortDirection ?? 'desc';

        $fits_with = FitsWithTranslation::where('fits_with_id', $fits_with_id)
            ->where('locale', App::getLocale())
            ->first();

        if (empty($fits_with)) {
            return response()->json([
                "status" => 406,
                "message" => 'There is no event with this Id',
            ], 406);
        }

        $services = Service::select('services.id', 'services.business_type_id', 'services.main_category', 'fitsWith.fits_with_id')
            ->rightJoin('service_fits_with as fitsWith', function ($join) {
                $join->on('services.id', '=', 'fitsWith.service_id');
            })
            ->where(function ($q) use ($fits_with_id, $category) {
                $q->where('fitsWith.fits_with_id', $fits_with_id)
                    ->Where('services.main_category', $category);
            });

        /** all_business_type_ids */
        $business_type_ids = array_values(array_unique($services->pluck('business_type_id')->toArray()));

        if ($category == 1) {
            /** all_services_ids */
            $all_services_ids = $services->join('services_place as place', function ($join) use ($request) {
                $join->on('services.id', '=', 'place.service_id');
            });
            if ($request->sortColumn) {
                $all_services_ids = $all_services_ids->orderBy('place.min_price', $sortDirection);
            }
            $all_services_ids = $all_services_ids->pluck('id')->toArray();
        } else if ($category == 2) {
            /** all_services_ids */
            $all_services_ids = $services->join('services_food as food', function ($join) use ($request) {
                $join->on('services.id', '=', 'food.service_id');
            });
            if ($request->sortColumn) {
                $all_services_ids = $all_services_ids->orderBy('food.price_per_item', $sortDirection);
            }
            $all_services_ids = $all_services_ids->pluck('id')->toArray();
        }


        /** search result services ids pagination */
        $services = $services->groupBy('services.id')->paginate($request->page_size ?? 30);
        $services_ids = $services->pluck('id')->toArray(); // only 10 ids

        if ($category == 1) {
            $final_services = $this->searchService->search_place($request, $services, $services_ids);
        } else if ($category == 2) {
            $final_services = $this->searchService->search_food($request, $services, $services_ids);
        }


        if ($category == 1) {

            $min_max_feature = Service_Place::whereIn('service_id', $all_services_ids)
                ->selectRaw("MAX(max_capacity) as max_capacity, MIN(min_capacity) as min_capacity")
                ->selectRaw("MAX(min_price) as max_price, MIN(min_price) as min_price")
                ->get()[0];
        } else if ($category == 2) {

            $min_max_feature = ServiceFood::whereIn('service_id', $all_services_ids)
                ->selectRaw("MAX(max_num_order_day) as max_capacity, MIN(max_num_order_day) as min_capacity")
                ->selectRaw("MAX(price_per_item) as max_price, MIN(price_per_item) as min_price")
                ->get()[0];
        }
        /** select id,name of subcategory of services */
        $subCategory = Business_typeTranslation::select('business_type_id as id', 'name')
            ->whereIn('business_type_id', $business_type_ids)
            ->where('locale', App::getLocale())
            ->get();

        /** select id,name of subcategory of services */
        $AllCategories = Business_type::select('id')->where('parent_id', 0)->where('status', 1)->get();


        $final_services['capacity'] = ['min' => $min_max_feature->min_capacity, 'max' => $min_max_feature->max_capacity];
        $final_services['price'] = ['min' => $min_max_feature->min_price, 'max' => $min_max_feature->max_price];
        $final_services['event'] = ['name' => $fits_with->name, 'banner' => $fits_with->banner];
        $final_services['Category'] =  collect($AllCategories)->map(function ($item) {
            return ['id' => $item->id, 'name' => $item->name];
        });
        $final_services['subCategory'] = $subCategory;

        return response()->json([
            "status" => 200,
            "message" => 'Search result returned successfully',
            "data"  => count($final_services['data']) > 0 ? $final_services : [],
        ], 200);
    }


    public function filter_events(FilterEventRequest $request)
    {
        $limit = $request->page_size ?? 30;
        $category = $request->category ?? 1;
        $sortDirection = $request->sortDirection ?? 'desc';

        $services = Service::select('services.id', 'services.business_type_id')
            ->Where('services.main_category', $category);


        /** business_types */
        if ($request->business_types) {
            $business_types = json_decode($request->business_types);
            $services =  $services->whereIn('services.business_type_id', $business_types);
        }

        /** capacity */
        if ($request->capacity) {
            if ($category == 1) {
                $services =  $services->join('services_place as place', function ($join) use ($request) {
                    $join->on('services.id', '=', 'place.service_id');
                })->where('place.min_capacity', '<=', $request->capacity)
                    ->where('place.max_capacity', '>=', $request->capacity);
            }

            if ($category == 2) {
                $services =  $services->join('services_food as food', function ($join) use ($request) {
                    $join->on('services.id', '=', 'food.service_id');
                })->where('food.max_num_order_day', '<=', $request->capacity);
            }
        }


        /** price */
        if ($request->min_price && $request->max_price) {
            if ($category == 1) {
                $services =  $services->join('services_place as place1', function ($join) use ($request) {
                    $join->on('services.id', '=', 'place1.service_id');
                })->where('place1.min_price', '<=', $request->max_price)
                    ->where('place1.min_price', '>=', $request->min_price);
            }

            if ($category == 2) {
                $services =  $services->join('services_food as food2', function ($join) use ($request) {
                    $join->on('services.id', '=', 'food2.service_id');
                })->where('food2.price_per_item', '<=', $request->max_price)
                    ->where('food2.price_per_item', '>=', $request->min_price);
            }
        }

        if ($request->sortColumn) {
            if ($category == 1) {
                $services =  $services->join('services_place as place3', function ($join) use ($request) {
                    $join->on('services.id', '=', 'place3.service_id');
                })->orderBy('place3.min_price', $sortDirection);
            }

            if ($category == 2) {
                $services =  $services->join('services_food as food3', function ($join) use ($request) {
                    $join->on('services.id', '=', 'food3.service_id');
                })->orderBy('food3.price_per_item', $sortDirection);
            }
        }
        /** search result services ids pagination */
        $services = $services->groupBy('services.id')->paginate($limit);
        $services_ids = $services->pluck('id')->toArray(); // only 10 ids

        // dd($services->toSql(), $services->getBindings());

        if (empty($services_ids)) {
            return response()->json([
                "status" => 200,
                "message" => 'data result returned successfully',
                "data"  => [],
            ], 200);
        }

        if ($category == 1) {
            $final_services = $this->searchService->search_place($request, $services, $services_ids);
        } else if ($category == 2) {
            $final_services = $this->searchService->search_food($request, $services, $services_ids);
        }

        return response()->json([
            "status" => 200,
            "message" => 'data result returned successfully',
            "data"  => count($final_services['data']) > 0 ? $final_services : [],
        ], 200);
    }
}