<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAddons extends Model
{
    protected $table = "service_addons";

    protected $fillable = ['addons_id' , 'service_id'];

    public $timestamps = false;

}
