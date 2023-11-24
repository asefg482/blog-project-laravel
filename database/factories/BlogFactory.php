<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\blog>
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
            'title'=>\Faker\Factory::create('fa')->text(12),
            'slug'=>\Faker\Factory::create('fa')->slug(),
            'description'=>\Faker\Factory::create('fa')->word(),
            'short_description'=>\Faker\Factory::create('fa')->text(70),
            'content'=>\Faker\Factory::create('fa')->text(100000),
            'image'=>'assets/img/blog/blog-1.jpg',
            'user_id'=>1
        ];
    }
}
