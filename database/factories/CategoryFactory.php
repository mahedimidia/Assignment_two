<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true); // e.g. "Tech News"
        return [
            'title' => $title,
            // unique constraint ভাঙবে না—random suffix দিচ্ছি
            'slug' => Str::slug($title).'-'.Str::lower(Str::random(6)),
            'parent_category' => null, // পরে seeder থেকে কিছু child বানাবো
            'description' => $this->faker->paragraph(),
        ];
    }
}
