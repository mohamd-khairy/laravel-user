<?php

namespace App\Models;
use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class ServiceFoodSearch extends Model
{
    use SearchableTrait;
    //
    protected $table = 'service_food_search';
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'brand_name' => 10,
            'service_name' => 10,
            'service_description' => 10,
        ],
        //'joins' => [
       //     'posts' => ['users.id','posts.user_id'],
       // ],
    ];

}
