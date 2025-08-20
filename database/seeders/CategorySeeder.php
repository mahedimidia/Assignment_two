<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
         $roots = Category::factory()->count(5)->create();

        // Step 2: প্রত্যেক root-এর জন্য 5টা করে child বানাও
        
    }
}
