<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Referral;
use Faker\Generator as Faker;

$factory->define(Referral::class, function (Faker $faker) {
    return [
        'borrower_id' => factory(\App\Borrower::class),
        'referral_name' => $faker->name
    ];
});
