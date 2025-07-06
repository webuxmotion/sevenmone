<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['id' => 1, 'parent_id' => 0, 'slug' => 'computers']);
        Category::create(['id' => 2, 'parent_id' => 0, 'slug' => 'tablets']);
        Category::create(['id' => 3, 'parent_id' => 0, 'slug' => 'laptops']);
        Category::create(['id' => 4, 'parent_id' => 3, 'slug' => 'mac']);
        Category::create(['id' => 5, 'parent_id' => 3, 'slug' => 'windows']);
        Category::create(['id' => 6, 'parent_id' => 0, 'slug' => 'phones']);
        Category::create(['id' => 7, 'parent_id' => 0, 'slug' => 'cameras']);
    }
}
