<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePackages extends Model
{
    protected $table = "service_packages";

    protected $fillable = ['packages_id' , 'service_id'];

    public $timestamps = false;
}
