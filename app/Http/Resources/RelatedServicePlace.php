<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class RelatedServicePlace extends JsonResource
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

        $discount_type = $this->Service_offer_by_date->discount_type;
        $discount_value = $this->Service_offer_by_date->discount_value;
        if($discount_type)
            if($discount_type == "cash"){
                $offer =  $lang == "en" ?  $discount_value . " EG" : "ج.م ". $discount_value;
            }else{
                $offer =  $discount_value ?   $discount_value." %" : null;
            }
        else
            $offer = null;


        $price = $this->service_place->min_price;
        if($price)
            $price =  $lang == "en" ? $price . " EG" : "ج.م ".$price;
        else
            $price = null;


        return [
            'id' => $this->id ?? null,
            'name' =>$this->name ?? null,
            'business_name' =>$this->subCategory->name ?? null,
            'min_price' => $price ?? null,
            'max_capacity' => $this->service_place->max_capacity ?? null,
            'package' => count($this->Service_packages_by_date) > 0 ? true : false,
            'offer' => $offer ?? null,
            'image' => $this->service_images->first() ? env('CDN_read_path') . $this->service_images->first()->url : null,
            'neighborhood_name' => $lang == "en" ? $this->service_one_address->neighborhood_en : $this->service_one_address->neighborhood_ar

        ];
    }
}
