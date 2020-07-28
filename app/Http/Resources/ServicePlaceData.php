<?php

namespace App\Http\Resources;

use App\Models\Feature;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ServicePlaceData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $facilities_indoor = Feature::select('id')->where('type_id', 5)->get();
        $facilities_outdoor = Feature::select('id')->where('type_id', 4)->get();
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
            'setup'          => $this->service_setup->map(function ($item) {
                return [
                    'name'   => $item->name ?? null,
                    'image'  => $item->image ? env('CDN_read_path') . $item->image : null,
                    'number' => $item->pivot->number ?? null
                ];
            }),
            'provider'          => $this->provider ?? null,
            'floor_plane'       => $this->service_place->floor_image ? env('CDN_read_path') . $this->service_place->floor_image : null,
            'min_capacity'      => $this->service_place->min_capacity ?? null,
            'max_capacity'      => $this->service_place->max_capacity ?? null,
            'min_price'         => $this->service_place->min_price ?? null,
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
            'min_deposit'       => $this->min_deposit ?? null,
            'facilities_indoor' => $facilities_indoor->map(function ($item) {
                return [
                    'id'      => $item->id ?? null,
                    'name'    => $item->name ?? null,
                    'checked' => in_array($item->id, $this->Service_feature_indoor->pluck('id')->toArray()) ? true : false
                ];
            }),
            'facilities_outdoor' => $facilities_outdoor->map(function ($item) {
                return [
                    'id'      => $item->id ?? null,
                    'name'    => $item->name ?? null,
                    'checked' => in_array($item->id, $this->Service_feature_outdoor->pluck('id')->toArray()) ? true : false
                ];
            }),
            'address' => [
                'lat'     => $this->Service_one_address->lat ?? null,
                'lng'     => $this->Service_one_address->lng ?? null,
                'address' =>
                App::getLocale() == 'en' ?
                    $this->Service_one_address->city_en . ',' . $this->Service_one_address->neighborhood_en . ',' . $this->Service_one_address->address_en
                    : $this->Service_one_address->city_ar . ',' . $this->Service_one_address->neighborhood_ar . ',' . $this->Service_one_address->address_ar
            ],
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
            })
        ];
    }
}
