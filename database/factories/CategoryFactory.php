<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $parent = \App\Category::all();

    if ($parent->count() > 0 && rand(1, 3) === 2) {
        $parentId = $parent->random(1)->id;
    } else {
        $parentId = 0;
    }

    return [
        'name' => $faker->name,
        'parent_id' => $parentId,
    ];
});
