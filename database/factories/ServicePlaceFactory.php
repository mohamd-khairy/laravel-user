<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Service_Place;
use Faker\Generator as Faker;

$factory->define(Service_Place::class, function (Faker $faker) {
    return [
        'provider_id' => 1,


        'min_capacity' =>$faker->numberBetween($min = 10, $max = 500),
        'max_capacity' =>$faker->numberBetween($min = 500, $max = 50000),

        'area' => $faker->randomFloat(),
        'length' => $faker->randomFloat(),
        'width' => $faker->randomFloat(),
        'height' => $faker->randomFloat(),
        'can_subdivided' => 1 ,
        'can_food_outside' => 1,
        'can_catering' => 1,
        'external_lounge' => 1,
        'additional_addons' => 1,

        'reservation_types' => $faker->randomElement($array = array ('day','period')) ,

        'price_per_day' => $faker->numberBetween($min = 10, $max = 500000),
        'price_per_morning' => $faker->numberBetween($min = 10, $max = 50000),
        'price_per_evening' =>$faker->numberBetween($min = 10, $max = 50000),

        'min_price' => $faker->numberBetween($min = 10, $max = 50000),
    ];
});
