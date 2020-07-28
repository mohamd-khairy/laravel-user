<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationAddon extends Model
{
    protected $fillable = ['service_id','addons_id','quantity'];
}
