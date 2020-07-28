<?php

namespace App\Models;

use App\Models\Business_type;
use App\Models\Service_Place;
use App\Models\ServiceFood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Service extends Model implements TranslatableContract
{
    use Translatable;
    use SearchableTrait;
    use SoftDeletes;

    protected $table = 'services';
    public $translatedAttributes = ['name', 'description', 'terms_and_condition'];
    protected $fillable = ['provider_id', 'business_type_id', 'main_category', 'status'];

    public function Service_offer()
    {
        return $this->hasMany(Service_offer::class, 'service_id');
    }

    public function Business_type()
    {
        return $this->hasOne(Business_type::class);
    }
    public function Service_Place()
    {
        return $this->hasOne(Service_Place::class, 'service_id');
    }
    public function Service_Food()
    {
        return $this->hasOne(ServiceFood::class, 'service_id');
    }
    public function Service_feature()
    {
        return $this->belongsToMany(Feature::class, 'service_feature');
    }

    public function Service_addons()
    {
        return $this->belongsToMany(Addons::class, 'service_addons');
    }
    public function Service_packages()
    {
        return $this->belongsToMany(Packages::class, 'service_packages');
    }

    public function Service_address()
    {
        return $this->hasMany(provider_address::class, 'foreign_id');
    }

    public function provider()
    {
        return $this->belongsTo(provider::class, 'provider_id');
    }
    public function services_translation()
    {
        return $this->hasMany(services_translation::class, 'service_id');
    }
    public function Service_images()
    {
        return $this->hasMany(Service_Image::class, 'service_id')
            ->where('size', 'large')
            ->orderBy('is_master', 'asc');
    }

    public function Service_master_images()
    {
        return $this->hasOne(Service_Image::class, 'service_id')
            ->where('size', 'large')
            ->where('is_master', 1);
    }

    public function category()
    {
        return $this->belongsTo(Business_type::class, 'main_category')->where('parent_id', 0);
    }

    public function subCategory()
    {
        return $this->belongsTo(Business_type::class, 'business_type_id')->where('parent_id', '!=', 0);
    }

    public function Service_fits_with()
    {
        return $this->belongsToMany(FitsWith::class, 'service_fits_with');
    }

    public function Service_setup()
    {
        return $this->belongsToMany(Setup::class, 'service_setup')->withPivot('number');
    }

    public function Service_feature_outdoor()
    {
        return $this->belongsToMany(Feature::class, 'service_feature')->where('type_id', 4);
    }
    public function Service_feature_indoor()
    {
        return $this->belongsToMany(Feature::class, 'service_feature')->where('type_id', 5);
    }

    public function Service_foodType()
    {
        return $this->belongsToMany(Feature::class, 'service_feature')->where('type_id', 6);
    }

    public function Services_address()
    {
        return $this->hasMany(provider_address::class, 'foreign_id')->whereIn('type', ['place_address', 'food_address']);
    }

    public function Services_provider_address()
    {
        return $this->hasMany(provider_address::class, 'foreign_id', 'provider_id')->where('type', 'provider_address');
    }

    public function Service_provider_address()
    {
        return $this->hasOne(provider_address::class, 'foreign_id', 'provider_id')->where('type', 'provider_address');
    }

    public function Service_one_address()
    {
        return $this->hasOne(provider_address::class, 'foreign_id')->whereIn('type', ['place_address', 'food_address']);
    }

    public function Service_packages_by_date()
    {
        return $this->belongsToMany(Packages::class, 'service_packages')
            ->where('date_from', '<=', date('Y-m-d'))
            ->where('date_to', '>=', date('Y-m-d'));
    }

    public function Service_offer_by_date()
    {
        return $this->hasOne(Service_offer::class, 'service_id')
            ->where('date_from', '<=', date('Y-m-d'))
            ->where('date_to', '>=', date('Y-m-d'));
    }

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'provider.brand_name' => 10,
            'services_translation.name' => 10,
            'services_translation.description' => 10,
        ],
        'joins' => [
            'services_translation' => ['services.id', 'services_translation.service_id'],
            'provider' => ['provider.id', 'services.provider_id'],
        ],
    ];
}
