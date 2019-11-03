<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Borrower;
use Faker\Generator as Faker;

$factory->define(Borrower::class, function (Faker $faker) {
    return [
         'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'birthday' => $faker->date(),
        'referrer_id' => factory(\App\User::class),
        'gender' => 'M',
        'street' => $faker->streetAddress,
        'contact_num' => $faker->phoneNumber,
        'city' => $faker->numberBetween(1,\App\City::all()->count()),
        'barangay' => $faker->numberBetween(1,\App\Barangay::all()->count()),
        'province' => $faker->numberBetween(1,\App\Province::all()->count()),
        'civil_status' =>  $faker->numberBetween(1,\App\CivilStatus::all()->count()),
        'other_SOI' => $faker->text,
        'barangay_captain' => $faker->name,
    ];
});
