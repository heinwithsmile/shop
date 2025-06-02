<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Middleware\Admin;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(5)->create();
        Product::factory()->count(30)->create();
        Order::factory()->count(30)->create();
        $this->call([
            UserSeeder::class,
            // StaffSeeder::class,
            AdminSeeder::class
        ]);
    }
}
