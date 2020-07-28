<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ServiceFitsWith;
use Faker\Generator as Faker;

$factory->define(ServiceFitsWith::class, function (Faker $faker) {
    return [
        'fits_with_id' =>  $faker->numberBetween($min = 1, $max = 4),
    ];
});