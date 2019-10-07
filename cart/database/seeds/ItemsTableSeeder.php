<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Item::class, 25)->create([]);
    }
}