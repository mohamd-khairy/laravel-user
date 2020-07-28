<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class wishListService extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $price = $this->service->main_category == 1 ? $this->service->Service_Place->min_price :
                                                    $this->service->Service_Food->price_per_item ;
        if($price)
            $price =  App::getLocale() == "en" ? $price . " EG" : "ج.م ".$price;
        else
            $price = null;
                                        
        return [
            'id' => $this->service_id ?? null,
            'name' => $this->service->name ?? null,
            'category' => $this->service->category->name ?? null,
            'subCategory' => $this->service->subCategory->name ?? null,
            'price' => $price ?? null,
            'image' => $this->service_image->url ? env('CDN_read_path') . $this->service_image->url : null,
        ];
    }
}
