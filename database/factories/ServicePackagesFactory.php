<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ServicePackages;
use Faker\Generator as Faker;

$factory->define(ServicePackages::class, function (Faker $faker) {
    return [
        'packages_id' => function () {
            return  factory('App\Models\Packages')->create()->id;
        }
    ];
});