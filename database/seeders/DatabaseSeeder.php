<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Fish;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //Product::factory(8)->create();
        Fish::factory(8)->create();
    }
}
