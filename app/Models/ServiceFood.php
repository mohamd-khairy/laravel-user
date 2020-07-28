<?php

namespace App\Models;

use App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceFood extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'services_food';
    public $translatedAttributes = ['ingredient' , 'group_orders'];
    protected $fillable = ['provider_id','service_id' ];
    
    public function Service()
    {
        return $this->hasOne(Service::class);
    }
}
