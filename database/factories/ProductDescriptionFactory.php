<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDescriptionFactory extends Factory
{
    public function definition()
    {
        return [
            'product_id' => \App\Models\Product::factory(), // створює зв’язок з продуктом
            'language_id' => 1, // або випадкове з існуючих мов, можна зробити кастомізовано
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraphs(3, true),
            'excerpt' => $this->faker->sentence(6),
            'keywords' => $this->faker->words(5, true),
            'description' => $this->faker->sentence(10),
        ];
    }
}
