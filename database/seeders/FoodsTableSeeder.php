<?php
use App\Models\Product;
use App\Models\Category;

class FoodsTableSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Foods')->first();

        $foods = [
            ['name' => 'Beef Burger', 'price' => 28000],
            ['name' => 'Chicken Wings', 'price' => 24000],
            ['name' => 'French Fries', 'price' => 12000],
            ['name' => 'Grilled Chicken', 'price' => 32000],
            ['name' => 'Pizza', 'price' => 50000],
        ];

        foreach ($foods as $food) {
            Product::create([
                'category_id' => $category->id,
                'name' => $food['name'],
                'price' => $food['price'],
                'description' => '',
                'sold_out' => false,
                'image' => null,
            ]);
        }
    }
}
