<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Service_offer;
use Faker\Generator as Faker;

$factory->define(Service_offer::class, function (Faker $faker) {
    return [
        "provider_id" => 1,
        "offer_occasion_id" => $faker->numberBetween($min = 1, $max = 5),
        "date_from" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "date_to" => date('Y-m-d', strtotime('+2 years')),
        "discount_type" => $faker->randomElement($array = ['cash','percentage']),
        "discount_value" => $faker->numberBetween($min = 1, $max = 100),
    ];
});
