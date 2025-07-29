<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
{
    $categories = ['Drinks', 'Foods', 'Snacks', 'Desserts', 'Beverages', 'Fruits'];

    foreach ($categories as $name) {
        Category::create([
            'name' => $name,
            'slug' => Str::slug($name),
        ]);
    }
    }
}
