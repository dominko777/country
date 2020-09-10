<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Country;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
        'country_id' => random_int(Country::min('id'), Country::max('id')),
    ];
});
