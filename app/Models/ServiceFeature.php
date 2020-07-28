<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    protected $table = "service_feature";

    public $timestamps = false;
    public function feature()
    {
        return $this->belongsTo(Feature::class)->where('type_id', 6);
    }
}
