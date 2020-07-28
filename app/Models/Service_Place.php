<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;


class Service_Place extends Model
{

    protected $table = 'services_place';
    protected $fillable = ['provider_id','service_id','view_ids','floor_image'];


    public function Service()
    {
        return $this->hasOne(Service::class);
    }

    public function address()
    {
        return $this->belongsTo(provider_address::class , 'address_id');
    }
}


