<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Catagory;
use Faker\Generator as Faker;

$factory->define(Catagory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'parent_id' => random_int(1,9),
    ];
});
