<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class Services extends JsonResource
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

        if($this->offer_type)
            if($this->offer_type == "cash"){
                $offer =  $lang == "en" ? $this->offer_value . " EG" : "ج.م ".$this->offer_value;
            }else{
                $offer = $this->offer_value ?  $this->offer_value." %" : null;
            }
        else
            $offer = null;


        if($this->min_price)
            $price =  $lang == "en" ? $this->min_price . " EG" : "ج.م ".$this->min_price;
        else
            $price = null;


        return [
            'service_id' => $this->service_id,
            'brand_name' =>$this->brand_name,
            'service_name' =>$this->service_name,
//            'service_description' =>$this->service_description,
            'business_name' =>$this->business_name,
            'area' => $this->area,
            'min_price' => $price,
            'max_capacity' => $this->max_capacity,
            'package' => $this->package_id ? true : false,
            'offer' => $offer,
            'image' => $this->image ? env('CDN_read_path') .$this->image : null,
            'city_name' => App::getLocale() == 'en' ? $this->city_en : $this->city_ar,
            'neighborhood_name' => App::getLocale() == 'en' ? $this->neighborhood_en : $this->neighborhood_ar,
        ];
    }
}

