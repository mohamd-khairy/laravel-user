<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Service_offer ;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Offer_occasion extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'offer_occasion';
    public $translatedAttributes = ['name'];
    protected $fillable = ['active'];
    public function Service_offer()
    {
        return $this->hasMany(Service_offer::class);
    }
}
