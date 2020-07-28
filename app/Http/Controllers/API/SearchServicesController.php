<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\SearchService;
use App\Http\Requests\AutoSearchServicePlaceRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\SearchServicePlaceRequest;
use App\Http\Requests\TopTrendRequest;
use App\Http\Resources\Services;
use App\Http\Resources\FitsWiths;
use App\Http\Resources\ServicesFood;
use App\Http\Resources\ServicesVenue;
use App\Models\Business_type;
use App\Models\Business_typeTranslation;
use App\Models\City;
use App\Models\FeatureTranslation;
use App\Models\FitsWith;
use App\Models\FitsWithTranslation;
use App\Models\provider_address;
use App\Models\ServiceSearch;
use App\Models\Service;
use App\Models\Service_Place;
use App\Models\ServiceFeature;
use App\Models\ServiceFood;
use App\Models\ServiceFoodSearch;
use App\Models\ServiceTranslation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SearchServicesController extends Controller
{
    public $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function cities_categories()
    {
        $lang = App::getLocale();
        /** all business types for two categories (place ,food) */
        $business_types = Business_type::select('id')->whereIn('id', [1, 2])->where('status', 1)->get();
        $business_types = collect($business_types)->map(function ($item) {
            $item = $item->toArray();
            unset($item['translations']);
            return $item;
        });

        $final_data = new \stdClass();
        /** categories */
        $final_data->categories = $business_types;

        /** cities */
        $final_data->cities = City::select('city_key as key', 'city_' . $lang . ' as name')->where(['status' => 1])->get();


        return response()->json([
            "status" => 200,
            "data"  => $final_data,
        ], 200);
    }

    public function auto_search(AutoSearchServicePlaceRequest $request)
    {
        $limit = $request->page_size ?? 10;

        // DB::enableQueryLog();

        $data = ServiceTranslation::select('services_translation.service_id', 'services_translation.name')
            ->join('services', function ($join) {
                $join->on('services.id', '=', 'services_translation.service_id');
            })
            ->where('services.status', 1)
            ->Where('services.main_category', $request->category)
            ->search($request->text, 50, true)
            ->Where('services_translation.locale', App::getLocale())
            ->simplePaginate($limit);

        return response()->json([
            "status" => 200,
            "message" => 'Search result returned successfully',
            "data"  => $data->toArray()['data'] ?? [],
        ], 200);

        // return  DB::getQueryLog();
    }

    public function filter_search(FilterRequest $request)
    {
        $limit = $request->page_size ?? 30;
        $sortDirection = $request->sortDirection ?? 'desc';

        $services = Service::select('services.id', 'services.business_type_id')
            ->Where('services.status', true)
            ->Where('services.main_category', $request->category);

        /** city */
        if (!empty($request->city)) {

            if ($request->category == 1) {
                $services =  $services->join('provider_address as address', function ($join) {
                    $join->on('services.id', '=', 'address.foreign_id');
                })->where('address.type', 'place_address')->where('address.city_en', $request->city);
            }

            if ($request->category == 2) {
                $services =  $services->join('provider_address as address', function ($join) {
                    $join->on('services.id', '=', 'address.foreign_id');
                })->where('address.type', 'food_address')->where('address.city_en', $request->city);
            }
        }

        /** Keyword */
        if (!empty($request->text)) {
            $services = $services->search($request->text, 10, true);
        }

        /** business_types */
        if ($request->business_types) {
            $services =  $services->whereIn('services.business_type_id', json_decode($request->business_types));
        }

        /** capacity */
        if ($request->capacity) {
            if ($request->category == 1) {
                $services =  $services->join('services_place as place', function ($join) use ($request) {
                    $join->on('services.id', '=', 'place.service_id');
                })->where('place.min_capacity', '<=', $request->capacity)
                    ->where('place.max_capacity', '>=', $request->capacity);
            }

            if ($request->category == 2) {
                $services =  $services->join('services_food as food', function ($join) use ($request) {
                    $join->on('services.id', '=', 'food.service_id');
                })->where('food.max_num_order_day', '<=', $request->capacity);
            }
        }

        /** package */
        if ($request->package) {
            /** join with service packages table */
            $services = $services->rightJoin('service_packages as package', function ($join) {
                $join->on('services.id', '=', 'package.service_id')
                    ->join('packages as p', function ($join2) {
                        $join2->on('package.packages_id', '=', 'p.id');
                    });
            })->where('p.date_to', '>=', date('Y-m-d'))
                ->where('p.date_from', '<=', date('Y-m-d'));
        }

        /** offer */
        if ($request->offer) {
            /** join with service offer table */
            $services = $services->rightJoin('service_offer as offer', function ($join) {
                $join->on('services.id', '=', 'offer.service_id');
            })->where('offer.date_to', '>=', date('Y-m-d'))
                ->where('offer.date_from', '<=', date('Y-m-d'));
        }

        /** fits_with */
        if ($request->fits_with) {
            $services = $services->rightJoin('service_fits_with as fitsWith', function ($join) {
                $join->on('services.id', '=', 'fitsWith.service_id');
            })->whereIn('fitsWith.fits_with_id', json_decode($request->fits_with));
        }

        /** neighborhood */
        if ($request->neighborhood) {

            if ($request->category == 1) {
                $services = $services->rightJoin('provider_address as address2', function ($join) {
                    $join->on('services.id', '=', 'address2.foreign_id');
                })->where('address2.type', 'place_address')->whereIn('address2.id', json_decode($request->neighborhood));
            }

            if ($request->category == 2) {
                return not_allowed_filter();
            }
        }

        /** price */
        if ($request->min_price && $request->max_price) {
            if (+$request->category == 1) {
                $services =  $services->join('services_place as place1', function ($join) {
                    $join->on('services.id', '=', 'place1.service_id');
                })->where('place1.min_price', '<=', $request->max_price)
                    ->where('place1.min_price', '>=', $request->min_price);
            }

            if ($request->category == 2) {
                $services =  $services->join('services_food as food2', function ($join) {
                    $join->on('services.id', '=', 'food2.service_id');
                })->where('food2.price_per_item', '<=', $request->max_price)
                    ->where('food2.price_per_item', '>=', $request->min_price);
            }
        }

        /** food_types */
        if ($request->food_types) {
            if ($request->category == 1) {
                return not_allowed_filter();
            }

            if ($request->category == 2) {
                $services =  $services->rightJoin('service_feature', function ($join) {
                    $join->on('services.id', '=', 'service_feature.service_id')
                        ->join('feature as f', function ($join2) {
                            $join2->on('service_feature.feature_id', '=', 'f.id');
                        });
                })->where('f.type_id', 6)->whereIn('service_feature.feature_id', json_decode($request->food_types));
            }
        }

        if ($request->sortColumn) {
            if ($request->category == 1) {
                $services =  $services->join('services_place as place3', function ($join) {
                    $join->on('services.id', '=', 'place3.service_id');
                })->orderBy('place3.min_price', $sortDirection);
            }

            if ($request->category == 2) {
                $services =  $services->join('services_food as food3', function ($join) {
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
                "message" => 'Search result returned successfully',
                "data"  => [],
            ], 200);
        }

        if ($request->category == 1) {

            $final_services = $this->searchService->search_place($request, $services, $services_ids);
        } else if ($request->category == 2) {

            $final_services = $this->searchService->search_food($request, $services, $services_ids);
        }

        return response()->json([
            "status" => 200,
            "message" => 'Search result returned successfully',
            "data"  => count($final_services['data']) > 0 ? $final_services : [],
        ], 200);
    }

    public function search(SearchServicePlaceRequest $request)
    {
        /** search fields */
        $limit = $request->page_size ?? 30;
        $sortDirection = $request->sortDirection ?? 'desc';

        $services = Service::select('services.id', 'services.business_type_id')
            ->Where('services.status', true)
            ->Where('services.main_category', $request->category);

        /** city */
        if (!empty($request->city)) {

            if ($request->category == 1) {
                $services =  $services->join('provider_address as address', function ($join) {
                    $join->on('services.id', '=', 'address.foreign_id');
                })->where('address.type', 'place_address')->where('address.city_en', $request->city);
            }

            if ($request->category == 2) {
                $services =  $services->join('provider_address as address', function ($join) {
                    $join->on('services.id', '=', 'address.foreign_id');
                })->where('address.type', 'food_address')->where('address.city_en', $request->city);
            }
        }

        /** Keyword */
        if (!empty($request->text)) {
            $services = $services->search($request->text, 10, true);
        }

        /** all_business_type_ids */
        $business_type_ids = array_values(array_unique($services->pluck('business_type_id')->toArray()));


        if ($request->category == 1) {
            /** all_services_ids */
            $all_services_ids = $services->join('services_place as place', function ($join) use ($request) {
                $join->on('services.id', '=', 'place.service_id');
            });
            if ($request->sortColumn) {
                $all_services_ids = $all_services_ids->orderBy('place.min_price', $sortDirection);
            }
            $all_services_ids = $all_services_ids->pluck('id')->toArray();
        } else if ($request->category == 2) {
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
        $services = $services->groupBy('services.id')->paginate($limit);
        $services_ids = $services->pluck('id')->toArray(); // only 10 ids

        if (empty($services_ids)) {
            return response()->json([
                "status" => 200,
                "message" => 'Search result returned successfully',
                "data"  => [],
            ], 200);
        }

        /** select id,name of subcategory of services */
        $subCategory = Business_typeTranslation::select('business_type_id as id', 'name')
            ->whereIn('business_type_id', $business_type_ids)
            ->where('locale', App::getLocale())
            ->get();

        $fits_with = FitsWithTranslation::select('fits_with_translation.fits_with_id as id', 'fits_with_translation.name')
            ->join('service_fits_with as fitsWith', function ($join) use ($all_services_ids) {
                $join->on('fits_with_translation.fits_with_id', '=', 'fitsWith.fits_with_id')
                    ->whereIn('fitsWith.service_id', $all_services_ids);
            })
            ->where('locale', App::getLocale())
            ->groupBy('id')
            ->get();

        if ($request->category == 1) {

            /** select min and max capacity */
            $min_max_feature = Service_Place::whereIn('service_id', $all_services_ids)
                ->selectRaw("MAX(max_capacity) as max, MIN(min_capacity) as min")
                ->selectRaw("MAX(min_price) as max_price, MIN(min_price) as min_price")
                ->get()[0];

            $neighborhood = provider_address::select('id', 'neighborhood_' . App::getLocale() . ' as name')
                ->where('type', 'place_address')
                ->whereIn('foreign_id', $all_services_ids)
                ->groupBy('name')
                ->orderBy('id', 'asc')
                ->get();


            $final_services = $this->searchService->search_place($request, $services, $services_ids);
            $final_services['neighborhood'] = $neighborhood;
        } else if ($request->category == 2) {
            /** food_type_ids */
            $food_type_ids =  ServiceFeature::has('feature')
                ->whereIn('service_id', $all_services_ids)
                ->groupBy('feature_id')->pluck('feature_id')->toArray();

            /** select min and max capacity */
            $min_max_feature = ServiceFood::whereIn('service_id', $all_services_ids)
                ->selectRaw("MAX(max_num_order_day) as max, MIN(max_num_order_day) as min")
                ->selectRaw("MAX(price_per_item) as max_price, MIN(price_per_item) as min_price")
                ->get()[0];

            /** food type */
            $foodTypes = FeatureTranslation::select('feature_id as id', 'name')
                ->whereIn('feature_id', $food_type_ids)
                ->where('locale', App::getLocale())
                ->get();

            $final_services =  $this->searchService->search_food($request, $services, $services_ids);
            $final_services['foodTypes'] = $foodTypes;
        }
        $final_services['capacity'] = ['max' => $min_max_feature->max, 'min' => $min_max_feature->min];
        $final_services['business_types'] = $subCategory;
        $final_services['fits_with'] = $fits_with;
        $final_services['price'] = ['min' => $min_max_feature->min_price, 'max' => $min_max_feature->max_price];

        return response()->json([
            "status" => 200,
            "message" => 'Search result returned successfully',
            "data"  => count($final_services['data']) > 0 ? $final_services : [],
        ], 200);
    }

    public function events_banner()
    {
        /** all business types for two categories (place ,food) */
        $events = FitsWith::select('id', 'position')->where('show_in_homepage', 1)->orderBy('position', 'asc')->get();
        $events = FitsWiths::collection($events);
        return response()->json([
            "status" => 200,
            "data"  => $events,
        ], 200);
    }

    public function select_trend(TopTrendRequest $request)
    {
        if ($request->category == 1) {

            return $this->top_trending_place($request);
        } else if ($request->category == 2) {

            return $this->top_trending_food($request);
        }
    }

    public function top_trending_place($request)
    {

        $final_data = ServiceSearch::select(
            'service_search.id as id',
            'service_search.brand_name',
            'service_search.service_name as name',
            'service_search.business_name',
            'service_search.area',
            'service_search.min_price',
            'service_search.max_capacity',
            'service_search.neighborhood_ar',
            'service_search.neighborhood_en',
            'service_search.city_ar',
            'service_search.city_en',
            'package.id as package_id',
            'offer.discount_type as offer_type',
            'offer.discount_value as offer_value',
            'image.url as image'
        )
            /** join with service offer table */

            ->leftJoin('service_offer as offer', function ($join) {
                $join->on('service_search.id', '=', 'offer.service_id')
                    ->where('offer.date_to', '>=', date('Y-m-d'))
                    ->where('offer.date_from', '<=', date('Y-m-d'));
            })
            /** join with service packages table */
            ->leftJoin('service_packages as package', function ($join) {
                $join->on('service_search.id', '=', 'package.service_id')
                    ->join('packages as p', function ($join2) {
                        $join2->on('package.packages_id', '=', 'p.id')
                            ->where('p.date_to', '>=', Carbon::now())
                            ->where('p.date_from', '<=', Carbon::now());
                    });
            })
            /** join with service place images table */
            ->leftJoin('service_image as image', function ($join) {
                $join->on('service_search.id', '=', 'image.service_id')
                    ->where('image.size', 'large');
            })

            ->orderBy('service_search.id', 'desc')
            ->take(20)
            ->Where('service_search.locale', App::getLocale())
            ->get();

        return response()->json([
            "status" => 200,
            "message" => 'Top Trending Place Services  returned successfully',
            "data" => ServicesVenue::collection($final_data)

        ], 200);
    }

    public function top_trending_food($request)
    {
        $final_data = ServiceFoodSearch::select(
            'service_food_search.id as id',
            'package.id as package_id',
            'offer.discount_type as offer_type',
            'offer.discount_value as offer_value',
            'service_food_search.brand_name',
            'service_food_search.service_name as name',
            'service_food_search.business_name',
            'service_food_search.max_num_order_day',
            'service_food_search.price_per_item',
            'image.url as image'
        )
            /** join with service offer table */
            ->leftJoin('service_offer as offer', function ($join) {
                $join->on('service_food_search.id', '=', 'offer.service_id')
                    ->where('offer.date_to', '>=', Carbon::now())
                    ->where('offer.date_from', '<=', Carbon::now());
            })
            /** join with service packages table */
            ->leftJoin('service_packages as package', function ($join) {
                $join->on('service_food_search.id', '=', 'package.service_id')
                    ->join('packages as p', function ($join2) {
                        $join2->on('package.packages_id', '=', 'p.id')
                            ->where('p.date_to', '>=', Carbon::now())
                            ->where('p.date_from', '<=', Carbon::now());
                    });
            })

            /** join with service place images table */
            ->leftJoin('service_image as image', function ($join) {
                $join->on('service_food_search.id', '=', 'image.service_id')
                    ->where('image.size', 'large');
            })

            ->orderBy('service_food_search.id', 'desc')
            ->take(20)
            ->Where('service_food_search.locale', App::getLocale())
            ->get();

        return response()->json([
            "status" => 200,
            "message" => 'Top Trending Food Services  returned successfully',
            "data" => ServicesFood::collection($final_data)

        ], 200);
    }
}