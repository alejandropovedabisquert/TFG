<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(5)->create();
        Product::factory(100)->create();
    }
}
