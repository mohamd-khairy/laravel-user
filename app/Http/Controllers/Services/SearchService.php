<?php

namespace App\Http\Controllers\Services;

use App\Http\Resources\Services;
use App\Http\Resources\ServicesFood;
use App\Http\Resources\ServicesVenue;
use App\Models\ServiceFoodSearch;
use App\Models\ServiceSearch;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SearchService
{

    public function search_place($request, $services, $services_ids)
    {
        $sortColumn = $request->sortColumn;
        $sortDirection = $request->sortDirection ?? 'desc';

        $ids_ordered = implode(',', $services_ids);
        $final_data = ServiceSearch::select(
            'service_search.id as id',
            'service_search.brand_name',
            'service_search.service_name as name',
            //'service_search.service_description',
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
                            ->where('p.date_to', '>=', date('Y-m-d'))
                            ->where('p.date_from', '<=', date('Y-m-d'));
                    });
            })
            /** join with service place images table */
            ->leftJoin('service_image as image', function ($join) {
                $join->on('service_search.id', '=', 'image.service_id')
                    ->where('image.size', 'large');
            })
            ->whereIn('service_search.id', $services_ids);

        if (empty($sortColumn)) {
            $final_data = $final_data->orderByRaw(DB::raw("FIELD(service_search.id, $ids_ordered)"));
        } else {
            $final_data = $final_data->orderBy('service_search.min_price', $sortDirection);
        }

        $final_data = $final_data->Where('service_search.locale', App::getLocale())
            ->groupBy('service_search.id')
            ->get();

        /** returned ... json data */
        $final_services = $services->toArray();
        $final_services['data'] = ServicesVenue::collection($final_data);

        return $final_services;
    }

    public function search_food($request, $services, $services_ids)
    {
        $sortColumn = $request->sortColumn;
        $sortDirection = $request->sortDirection ?? 'desc';

        $ids_ordered = implode(',', $services_ids);
        $final_data = ServiceFoodSearch::select(
            'service_food_search.id as id',
            'package.id as package_id',
            'offer.discount_type as offer_type',
            'offer.discount_value as offer_value',
            'service_food_search.service_name as name',
            'service_food_search.business_name',
            'service_food_search.max_num_order_day',
            'service_food_search.price_per_item',
            'image.url as image'
        )
            /** join with service offer table */
            ->leftJoin('service_offer as offer', function ($join) {
                $join->on('service_food_search.id', '=', 'offer.service_id')
                    ->where('offer.date_to', '>=', date('Y-m-d'))
                    ->where('offer.date_from', '<=', date('Y-m-d'));
            })
            /** join with service packages table */
            ->leftJoin('service_packages as package', function ($join) {
                $join->on('service_food_search.id', '=', 'package.service_id')
                    ->join('packages as p', function ($join2) {
                        $join2->on('package.packages_id', '=', 'p.id')
                            ->where('p.date_to', '>=', date('Y-m-d'))
                            ->where('p.date_from', '<=', date('Y-m-d'));
                    });
            })
            /** join with service place images table */
            ->leftJoin('service_image as image', function ($join) {
                $join->on('service_food_search.id', '=', 'image.service_id')
                    ->where('image.size', 'large');
            })
            /** get only record that match services ids array */
            ->whereIn('service_food_search.id', $services_ids);

        if (empty($sortColumn)) {
            $final_data = $final_data->orderByRaw(DB::raw("FIELD(service_food_search.id, $ids_ordered)"));
        } else {
            $final_data = $final_data->orderBy('service_food_search.price_per_item', $sortDirection);
        }

        $final_data = $final_data->Where('service_food_search.locale', App::getLocale())
            ->groupBy('service_food_search.id')
            ->get();

        /** returned ... json data */
        $final_services = $services->toArray();
        $final_services['data'] = ServicesFood::collection($final_data);


        return $final_services;
    }
}