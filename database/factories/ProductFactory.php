<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id, // випадкова категорія
            'slug' => $this->faker->unique()->slug(),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'old_price' => $this->faker->randomFloat(2, 5, 150),
            'status' => 1,
            'hit' => $this->faker->boolean(20), // 20% шанс
            'img' => '/public/uploads/no_image.jpg',
            'is_download' => $this->faker->boolean(10), // 10% шанс
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
