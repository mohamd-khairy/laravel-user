<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class RelatedServiceFood extends JsonResource
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


        $price_value =  $this->service_food->price_per_item;
        if($price_value)
            $price_per_item =  $lang == "en" ? $price_value . " EG" : "ج.م ".$price_value;
        else
            $price_per_item = null;

        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'subCategory' =>$this->subCategory->name ?? null,
            'max_num_order' => $this->service_food->max_num_order_day ?? null,
            'price' => $price_per_item  ?? null,
            'package' => count($this->Service_packages_by_date) > 0 ? true : false,
            'offer' => $offer  ?? null,  
            'image' => $this->service_images->first() ? env('CDN_read_path') . $this->service_images->first()->url : null,
        ];
    }
}
