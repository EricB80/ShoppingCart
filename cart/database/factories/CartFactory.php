<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cart::class, function (Faker $faker){
    return [
        'total' => 0,
        'taxes' => 0
    ];
});