<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2,true),
            'content' => $this->faker->paragraph(1),
            'image' => $this->faker->imageUrl(640, 480, 'posts', true), // fake image url
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(), 
            // যদি category না থাকে তাহলে factory দিয়ে বানাবে
        ];
    }
}
