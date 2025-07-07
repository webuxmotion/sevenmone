<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Приклад: створити по 5 продуктів для кожної категорії
        $categories = \App\Models\Category::all();

        foreach ($categories as $category) {
            Product::factory()->count(5)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}