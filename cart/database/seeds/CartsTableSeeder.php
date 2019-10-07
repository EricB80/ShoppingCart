<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Cart::class, 1)->create([
            'total' => 0,
            'taxes' => 0
        ]);
    }
}