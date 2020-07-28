<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Business_type extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'business_type';
    public $translatedAttributes = ['name'];
    protected $fillable = ['parent_id' , 'status' , 'image' , 'show_in_homePage'];

    public function parent()
    {
        return $this->belongsTo(Business_type::class , 'parent_id')->withCount('services_by_main');
    }
    
    public function services()
    {
        return $this->hasMany(Service::class , 'business_type_id');
    }

    public function services_by_main()
    {
        return $this->hasMany(Service::class , 'main_category');
    }
}
