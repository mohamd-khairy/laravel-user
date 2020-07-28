<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Offer_occasion;

class Service_offer extends Model
{
    protected $table = 'service_offer';
    protected $fillable = [
       "provider_id","service_id","offer_occasion_id", "date_from" , "date_to" , "discount_type" , "discount_value"
        ];

    public function Offer_occasion()
    {
        return $this->hasOne(Offer_occasion::class);
    }
}
