<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Category;

class DessertsTableSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Desserts')->first();

        $desserts = [
            ['name' => 'Chocolate Cake', 'price' => 15000],
            ['name' => 'Ice Cream', 'price' => 12000],
            ['name' => 'Fruit Salad', 'price' => 10000],
            ['name' => 'Tiramisu', 'price' => 18000],
            ['name' => 'Cheesecake', 'price' => 16000],
        ];

        foreach ($desserts as $dessert) {
            Product::create([
                'category_id' => $category->id,
                'name' => $dessert['name'],
                'price' => $dessert['price'],
                'description' => '',
                'sold_out' => false,
                'image' => null,
            ]);
        }
    }
}
