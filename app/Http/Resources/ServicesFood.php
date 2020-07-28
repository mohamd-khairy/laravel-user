<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ServicesFood extends JsonResource
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

        if ($this->offer_type) {
            if ($this->offer_type == "cash") {
                $offer =  $lang == "en" ? $this->offer_value . " EG" : "ج.م " . $this->offer_value;
            } else {
                $offer = $this->offer_value ?  $this->offer_value . " %" : null;
            }
        } else {
            $offer = null;
        }


        if ($this->price_per_item)
            $price_per_item =  $lang == "en" ? $this->price_per_item . " EG" : "ج.م " . $this->price_per_item;
        else
            $price_per_item = null;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'subCategory' => $this->business_name,
            'max_num_order' => $this->max_num_order_day,
            'price' => $price_per_item,
            'package' => $this->package_id ? true : false,
            'offer' => $offer,
            'image' => $this->image ? env('CDN_read_path') .$this->image : null,
        ];
    }
}
