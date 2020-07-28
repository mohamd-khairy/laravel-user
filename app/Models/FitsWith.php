<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class FitsWith extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'fits_with';
    public $translatedAttributes = ['name','image'];
    protected $fillable = ['code'];
}
