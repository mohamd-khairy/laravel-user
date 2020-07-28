<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class provider_address extends Model
{
    protected $table = 'provider_address';

    protected $fillable = [
        'name',
        'address1',
        'address2',
        'lat',
        'lng',
    ];

    public function place()
    {
        return $this->belongsTo(Service_Place::class , 'foreign_id');
    }
}
