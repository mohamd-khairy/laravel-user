<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ServiceAddons;
use Faker\Generator as Faker;

$factory->define(ServiceAddons::class, function (Faker $faker) {
    return [
        'addons_id' => function () {
            return  factory('App\Models\Addons')->create()->id;
        }
    ];
});
