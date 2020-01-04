<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence,
        'price' => random_int(1, 9),
        'catagory_id' => random_int(1,10),
        
    ];
});
