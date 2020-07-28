<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFitsWith extends Model
{
    protected $table = "service_fits_with";

    protected $fillable = ['fits_with_id' , 'service_id'];

    public $timestamps = false;

}
