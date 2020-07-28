<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class RecentViewServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lang = App::getLocale();

        if ($this->Service_offer_by_date) {
            if ($this->Service_offer_by_date->discount_type == "cash") {
                $offer =  $lang == "en" ? $this->Service_offer_by_date->discount_value . " EG" : "ج.م " . $this->Service_offer_by_date->discount_value;
            } else {
                $offer = $this->Service_offer_by_date->discount_value ?  $this->Service_offer_by_date->discount_value . " %" : null;
            }
        } else {
            $offer = null;
        }

        if ($this->service_place) {
            $price =  $lang == "en" ? $this->service_place->min_price . " EG" : "ج.م " . $this->service_place->min_price;
            $max_capacity = $this->service_place->max_capacity;
        } else {
            $price =  $lang == "en" ? $this->service_food->price_per_item . " EG" : "ج.م " . $this->service_food->price_per_item;
            $max_capacity = $this->service_food->max_num_order_day;
        }



        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' =>  [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'subCategory' =>  [
                'id' => $this->subCategory->id,
                'name' => $this->subCategory->name
            ],
            'package' => $this->Service_packages_by_date ? true : false,
            'offer' => $offer,
            'price' => $price,
            'max_capacity' => $max_capacity
        ];
    }
}
