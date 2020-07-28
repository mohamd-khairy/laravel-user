<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_typeTranslation extends Model
{
    protected $table = 'business_type_translation';
    public $timestamps = false;
    protected $fillable = ['name'];
}
