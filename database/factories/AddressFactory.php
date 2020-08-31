<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    $pro = $faker->boolean();

    return [
        'pro' => $pro,
        'civility' => $faker->boolean() ? 'Mr' : 'Mme',
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company' => $pro ? $faker->company : null,
        'address' => $faker->streetAddress,
        'address_bis' => $faker->boolean() ? $faker->streetAddress : null,
        'bp' => $faker->boolean() ? $faker->numberBetween(100,200) : null,
        'postal' => $faker->numberBetween(1000,9999),
        'city' => $faker->city,
        'country_id' => mt_rand(1,4),
        'phone' => $faker->phoneNumber,
    ];


});
