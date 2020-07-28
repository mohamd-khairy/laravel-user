<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Feature extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'feature';
    public $translatedAttributes = ['name'];
    protected $fillable = ['code'];
}
