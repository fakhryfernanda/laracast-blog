<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            // 'category_id' => Category::factory()->create(),
            'category_id' => array_rand(Category::pluck('id')->toArray()) + 1,
            'slug' => fake()->slug(),
            'excerpt' => fake()->sentence(5),
            'body' => fake()->paragraph(4)
        ];
    }
}
