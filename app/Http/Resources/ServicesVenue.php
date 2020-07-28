<?php

namespace App\Http\Resources;

use App\Models\Packages;
use App\Models\Service_offer;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ServicesVenue extends JsonResource
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
            'id' => $this->id,
            'name' =>$this->name,
            'min_price' => $price,
            'max_capacity' => $this->max_capacity,
            'package' => $this->package_id ? true : false,
            'offer' => $offer,
            'image' => $this->image ? env('CDN_read_path') .$this->image : null,
            'neighborhood_name' => App::getLocale() == 'en' ? $this->neighborhood_en : $this->neighborhood_ar,
            'business_name' => $this->business_name
        ];
    }
}