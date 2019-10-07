<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Item::class, function (Faker $faker){
    return [
        'name' => $faker->word(),
        'price' => $faker->randomFloat(2, 100, 1)
    ];
});
