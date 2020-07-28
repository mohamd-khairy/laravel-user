<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ProviderUser;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(ProviderUser::class, function (Faker $faker) {
    return [
        'first_name'  => $faker->name,
        'last_name'  => $faker->name,
        'middle_name'  => $faker->name,
        'email' => "evntoo@evntoo.com",
        'gender' => 'male',
        'job_title' => 'php',
        'national_id' => '29403131802254',
        'provider_id' => function(){
            return  factory('App\Models\provider')->create()->id;
        },
        'date_of_birth'  =>  '1979-06-09',
        'personal_phone' => '01555512090',
        'email_verified_at' =>  '2020-01-01',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'personal_image' => null// $faker->imageUrl($width = 640, $height = 480),

    ];
});
