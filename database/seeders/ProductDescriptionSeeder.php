<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Language;
use App\Models\ProductDescription;

class ProductDescriptionSeeder extends Seeder
{
    public function run()
    {
        $languages = Language::all();

        Product::all()->each(function ($product) use ($languages) {
            foreach ($languages as $language) {
                ProductDescription::factory()->create([
                    'product_id' => $product->id,
                    'language_id' => $language->id,
                ]);
            }
        });
    }
}