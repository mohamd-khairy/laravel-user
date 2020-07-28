<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Addons extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'addons';
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ["provider_id", "price_type", "price_value", "image"];
    use SoftDeletes;
    public function addons_services()
    {
        return $this->belongsToMany(Service::class, 'service_addons');
    }
    public function addons_packages()
    {
        return $this->belongsToMany(Packages::class, 'packages_addons');
    }
}