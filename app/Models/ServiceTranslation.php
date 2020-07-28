<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ServiceTranslation extends Model
{
    use SearchableTrait;

    protected $table = 'services_translation';
    public $timestamps = false;
    protected $fillable = ['name','description','terms_and_condition'];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'services_translation.name' => 50,
        ]
    ];
}
