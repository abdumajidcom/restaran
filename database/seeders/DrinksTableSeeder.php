<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class DrinksTableSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Drinks')->first();

        if (!$category) {
            $this->command->error("Drinks category topilmadi!");
            return;
        }

        $drinks = [
            ['name' => 'Cola', 'price' => 8000],
            ['name' => 'Pepsi', 'price' => 8000],
            ['name' => 'Fanta', 'price' => 8000],
            ['name' => 'Sprite', 'price' => 8000],
            ['name' => 'Apple Juice', 'price' => 12000],
            ['name' => 'Orange Juice', 'price' => 12000],
            ['name' => 'Water', 'price' => 5000],
            ['name' => 'Coffee', 'price' => 15000],
            ['name' => 'Green Tea', 'price' => 10000],
            ['name' => 'Milkshake', 'price' => 16000],
        ];

        foreach ($drinks as $drink) {
            Product::create([
                'category_id' => $category->id,
                'name' => $drink['name'],
                'price' => $drink['price'],
                'sold_out' => false,
                'description' => '',
                'image' => null,
            ]);
        }
    }
}

