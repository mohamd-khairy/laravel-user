<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class reservationReseourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'reservation_id'   => $this->id ?? '',
            'reservation_date' => $this->reservation_date ?? '',
            'service_status'   => $this->service_status ?? '',
            'service_id'       => $this->service->id ?? '',
            'service_name'     => $this->service->name ?? '',
            'provider_name'    => $this->service->provider->brand_name ?? '',
            'service_image'    => $this->service->service_master_images ? env('CDN_read_path') . $this->service->service_master_images->url : null,
            'service_addons'   => $this->reservation_addons->map(function ($item) {
                return [
                    'id'         => $item->id,
                    'quantity'   => $item->pivot->quantity,
                    'name'       => $item->name,
                    'image'      => $item->image ? env('CDN_read_path') . $item->image : null,
                    'price'      => $item->price_value,
                    'price_type' => $item->price_type
                ];
            }),
            'service_quantity'           => $this->quantity ?? '',
            'service_price'              => $this->service_offer['price'] ?? null,
            'service_addons_total_price' => $this->service_addons_total_price ?? '',
            'service_total'              => $this->service_total ?? '',
        ];

        if ($this->service_offer['offer']) {
            $data['service_offer'] = $this->service_offer['offer'];
        }

        return $data;
    }
}
