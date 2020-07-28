<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model;
use App\Models\Service;
use Faker\Factory;
use Faker\Generator as Faker;


$fakerAr = Factory::create('ar_JO');

$factory->define(Service::class, function(Faker $faker , $params) use ($fakerAr) {

    return [
        'name:en' => $faker->firstName,
        'description:en' => $faker->realText,

        'name:ar' => $fakerAr->firstName,
        'description:ar' => $fakerAr->realText,

        'provider_id' => 1,

        'min_deposit' =>$faker->numberBetween($min = 10, $max = 100),

        'vat_service' =>$faker->boolean,

        'vat_service_value' => $faker->numberBetween($min = 10, $max = 100),

        'preparation_type' => $faker->boolean,

        'preparation_time' => $faker->randomDigit,

        'preparation_time_type' => $faker->randomElement($array = array ('day','hour')) ,// 'b' ,

        'cancel_free' => $faker->randomDigit,

        'cancel_fees' => $faker->numberBetween($min = 10, $max = 100),

        'status' => 1,
        'active' => 1,
        'show_in_homePage' => 1,


        'business_type_id' => $params['main_category'] == 2 ?
            $faker->numberBetween($min = 19, $max = 23) :
            $faker->numberBetween($min = 9, $max = 18) ,
    ];
});
