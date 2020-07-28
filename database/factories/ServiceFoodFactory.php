<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ServiceFood;
use Faker\Factory;
use Faker\Generator as Faker;

$fakerAr = Factory::create('ar_JO');

$factory->define(ServiceFood::class, function (Faker $faker) use ($fakerAr){
    return [

        'ingredient:en' => $faker->realText,
        'group_orders:en' => $faker->realText,

        'ingredient:ar' => $fakerAr->realText,
        'group_orders:ar' => $fakerAr->realText,


        'provider_id' => 1,
       // 'food_type_id' => 0,

        'delivery_type' => $faker->boolean,

        'max_num_order_day'=> $faker->numberBetween($min = 10, $max = 5000),
        'min_order_amount'=> $faker->numberBetween($min = 10, $max = 5000),
        'price_per_item'=> $faker->numberBetween($min = 1, $max = 500),

        'group_order_amount'=> $faker->numberBetween($min = 10, $max = 500),

        'price_group_order'=> $faker->numberBetween($min = 10, $max = 500),

        'delivery_time'=> $faker->randomDigit,

        'delivery_fees'=> $faker->randomDigit,

    ];
});
