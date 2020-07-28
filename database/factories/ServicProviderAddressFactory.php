<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\City;
use App\Models\provider_address;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');

$factory->define(provider_address::class, function (Faker $faker) use ($fakerAr) {
    return [
        'address_ar' => $fakerAr->address,
        'address_en' => $faker->address,
        'country_ar' =>  $fakerAr->country,
        'country_en' =>  $faker->country,
        'city_ar' => $fakerAr->city,
        'city_en' => City::find($faker->numberBetween($min = 1, $max = 27))->city_key,
        'neighborhood_ar' => $fakerAr->streetName,
        'neighborhood_en' => $faker->streetName,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'status' => 0
    ];
});
