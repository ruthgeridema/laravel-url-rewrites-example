<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(250),
        'image' => $faker->imageUrl(242, 300, 'cats')
    ];
});
