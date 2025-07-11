<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductGallerySeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            '/img/products/1.jpg',
            '/img/products/2.jpg',
            '/img/products/3.jpg',
        ];

        $products = Product::all();

        foreach ($products as $product) {
            foreach ($images as $img) {
                DB::table('product_gallery')->insert([
                    'product_id' => $product->id,
                    'img' => $img,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}