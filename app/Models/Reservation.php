<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $fillable = ['service_id', 'user_id', 'price_slot', 'reservation_date', 'quantity'];

    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    protected $appends = ['service_total', 'service_addons_total_price', 'service_offer', 'service_status'];

    public function setQuantityAttribute($value)
    {
        if (Service::find($this->service_id)->main_category == 1) {
            $this->attributes['quantity'] = 1;
        } else {
            $this->attributes['quantity'] = $value;
        }
    }

    public function setPriceSlotAttribute($value)
    {
        if (Service::find($this->service_id)->main_category == 1) {
            $this->attributes['price_slot'] = $value;
        } else {
            $this->attributes['price_slot'] = null;
        }
    }

    public function getReservationDateAttribute()
    {
        return $this->attributes['reservation_date'] ? date('Y-m-d', strtotime($this->attributes['reservation_date'])) : null;
    }

    public function service()
    {
        return $this->belongsTo(Service::class)->with('Service_offer_by_date', 'provider:id,brand_name', 'Service_master_images:id,url,service_id');
    }

    public function reservation_addons()
    {
        return $this->belongsToMany(Addons::class, 'reservation_addons')->withPivot('quantity');
    }

    public function getServiceStatusAttribute()
    {
        if (date('Y-m-d', strtotime($this->reservation_date)) >= date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }

    public function getServiceOfferAttribute()
    {
        $prices = final_price($this->service_id, date('Y-m-d'));

        switch ($this->price_slot) {
            case 'day':
                return  [
                    'offer'     => $prices['offer'],
                    'old_price' => $prices['old_prices']['price_per_day'],
                    'price'     => $prices['price_per_day']
                ];
                break;
            case 'morning':
                return  [
                    'offer'     => $prices['offer'],
                    'old_price' => $prices['old_prices']['price_per_morning'],
                    'price'     => $prices['price_per_morning']
                ];
                break;
            case 'evening':
                return  [
                    'offer'     => $prices['offer'],
                    'old_price' => $prices['old_prices']['price_per_evening'],
                    'price'     => $prices['price_per_evening']
                ];
                break;
            default:
                return  [
                    'offer'     => $prices['offer'],
                    'old_price' => $prices['old_prices']['price_per_item'],
                    'price'     => $prices['price_per_item']
                ];
                break;
        }
    }

    public function getServiceTotalAttribute()
    {
        return ($this->service_offer['price']  * $this->quantity) + $this->service_addons_total_price;
    }

    public function getServiceAddonsTotalPriceAttribute()
    {
        return $this->reservation_addons->map(function ($item) {
            return ($item->price_value * $item->pivot->quantity);
        })->sum();
    }
}