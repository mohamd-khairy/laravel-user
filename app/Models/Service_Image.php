<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_Image extends Model
{
    protected $table = 'service_image';
    protected $fillable = [

        "service_id","real_id", "url" , "size" ,"is_master" ,
         
    ];

}
