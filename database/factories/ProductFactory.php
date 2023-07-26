<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'image' => fake()->imageUrl(640, 480),
        'name' => fake()->name,
        'category_id' => fake()->numberBetween($min = 1, $max = 10),
        'quantity' => fake()->numberBetween($min = 1, $max = 10),
        'price' => fake()->numberBetween($min = 1000000, $max = 10000000),
        'discount' => fake()->numberBetween($min = 10, $max = 20),
        'selled' => '0'
    ];
});
