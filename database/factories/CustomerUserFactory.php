<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CustomerUser;
use Faker\Generator as Faker;

$factory->define(CustomerUser::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'middle_name' => $faker->name,
        'last_name' => $faker->name,
        'date_of_birth' => "1991/12/15",
        'email' => "evntoo@evntoo.com",
        'gender' => 'male',
        'job_title' => 'php',
        'personal_phone' => '01555512090',
        'email_verified_at' =>  date('Y-m-d'),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'personal_image' => null
    ];
});
