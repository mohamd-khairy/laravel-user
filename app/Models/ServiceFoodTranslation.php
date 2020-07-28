<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFoodTranslation extends Model
{
    protected $table = 'services_food_translation';
    public $timestamps = false;
    protected $fillable = ['ingredient' , 'group_orders'];
  
}
