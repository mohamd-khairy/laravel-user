<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_Season extends Model
{
    protected $table = 'service_seasons';
    protected $fillable = [
        "provider_id", "service_id", "date_from", "date_to", "reservation_day", "reservation_period",
        "price_per_day", "price_per_morning", "price_per_evening"
    ];
}