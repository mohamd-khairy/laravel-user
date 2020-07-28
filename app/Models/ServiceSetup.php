<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSetup extends Model
{
    protected $table = "service_setup";

    protected $fillable = ['setup_id' , 'service_id' ,'number'];

    public $timestamps = false;
}
