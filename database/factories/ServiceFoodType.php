<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ServiceFeature;
use Faker\Generator as Faker;

$factory->define(ServiceFeature::class, function (Faker $faker) {
    return [
        'feature_id' =>  $faker->numberBetween($min = 44, $max = 46),
    ];
});
