<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Packages extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translationModel = 'App\Models\PackagesTranslation';
    public $translatedAttributes = ['name', 'description'];
    protected $table = 'packages';
    protected $fillable = [
        "provider_id", "date_from", "date_to", "price_value", "image"
    ];

    public function packages_services()
    {
        return $this->belongsToMany(Service::class, 'service_packages');
    }

    public function packages_addons()
    {
        return $this->belongsToMany(Addons::class, 'packages_addons');
    }
}
