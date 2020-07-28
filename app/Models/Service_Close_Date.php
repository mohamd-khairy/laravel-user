<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_Close_Date extends Model
{
    protected $table = 'service_close_date';
    protected $fillable = [
        "provider_id", "service_id", "date_from", "date_to"
    ];
}