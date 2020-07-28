<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceWishList extends Model
{
    protected $fillable=['service_id' , 'user_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function service_image()
    {
        return $this->belongsTo(service_image::class , 'service_id' , 'service_id')
         ->where('size' , 'large')
        ->orderBy('is_master','asc');
    }
}
