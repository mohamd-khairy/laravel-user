<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sliderBar extends Model
{
    protected $table = 'sliderBar';
    protected $fillable = [
        "image_en","image_ar", "start_date" , "end_date" , "title" , "type" ,
        "link","navigation" ,"active"
    ];

}


