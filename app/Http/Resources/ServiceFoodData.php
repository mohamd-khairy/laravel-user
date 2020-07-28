<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ServiceFoodData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $delivery_type = $this->service_food->delivery_type ? 'hour' : 'day';

        return [
            'service_id'        => $this->id ?? null,
            'images'            => $this->Service_images->map(function ($img) {
                return [
                    'url'     => $img->url ? env('CDN_read_path') . $img->url : null,
                    'master'  => $img->is_master ? true : false
                ];
            }),
            'service_name'      => $this->name ?? null,
            'category_id'       => $this->category->id ?? null,
            'category_name'     => $this->category->name ?? null,
            'subCategory_name'  => $this->subCategory->name ?? null,
            'fitsWith'          => $this->Service_fits_with->map(function ($item) {
                return [
                    'name' => $item->name ?? null
                ];
            }),
            'provider'            => $this->provider ?? null,
            'provider_address'    => App::getLocale() == 'en' ? $this->Service_provider_address->neighborhood_en : $this->Service_provider_address->neighborhood_ar,
            'min_order_amount'    => $this->service_food->min_order_amount ?? null,
            'max_num_order_day'   => $this->service_food->max_num_order_day ?? null,
            'description'       => $this->description ?? null,
            'addons'            => $this->Service_addons->map(function ($item) {
                return [
                    'id'          => $item->id ?? null,
                    'name'        => $item->name ?? null,
                    'description' => $item->description ?? null,
                    'price'       => $item->price_value ?? null,
                    'price_type'  => $item->price_type == 1 ? 'Day' : 'Period',
                    'image'       => $item->image ? env('CDN_read_path') . $item->image : null,
                ];
            }),
            'food_type'           => $this->Service_foodType->map(function ($item) {
                return [
                    'id'   => $item->id ?? null,
                    'name' => $item->name ?? null
                ];
            }),
            'ingredient'          => $this->service_food->ingredient ?? null,
            'group_orders'        => $this->service_food->group_orders ?? null,
            'coverage' => [
                'districts' =>  implode(',', $this->Services_address->map(function ($item) {
                    return  App::getLocale() == 'en' ? $item->neighborhood_en : $item->neighborhood_ar;
                })->toArray()) ?? null
            ],
            'serving_option'        => $this->service_food->serving_option ? "delivery_only" : "with_service",
            'prepration_time'     => $this->preparation_time . ' ' . $this->preparation_time_type ?? null,
            'delivery_time'       => $this->service_food->delivery_time . ' ' . $delivery_type ?? null,
            'terms_and_condition' => $this->terms_and_condition ?? null,
            'cancellation'        => [
                'cancel_free' => $this->cancel_free ?? null,
                'cancel_fees' => $this->cancel_fees ?? null
            ],
            'packages'    => $this->Service_packages_by_date->map(function ($item) {
                return [
                    'id'            => $item->id ?? null,
                    'name'          => $item->name ?? null,
                    'description'   => $item->description ?? null,
                    'price'         => $item->price_value ?? null,
                    'image'         => $item->image ? env('CDN_read_path') .'images/medium/'.$item->image : null
                ];
            }),
            'price_per_item' => $this->service_food->price_per_item ?? null,
        ];
    }
}
