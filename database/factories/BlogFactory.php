<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'slug'=>fake()->unique()->slug(),
            'intro'=>fake()->sentence(),
            'body' => fake()->sentence(450),
            'thumbnail'=>'default_images/img_4_horizontal.jpg',
            'category_id'=>Category::factory(),
            'user_id'=>User::factory(),
        ];
    }
}
