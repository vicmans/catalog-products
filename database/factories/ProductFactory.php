<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name), // Generar slug a partir del nombre
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 5, 100), // Precio entre 5 y 100
            'category_id' => Category::factory(), // Crea una categoría automáticamente
            'seo_title' => fake()->sentence(),
            'seo_description' => fake()->paragraph(),
            'is_featured' => fake()->boolean(),
        ];
    }
}
