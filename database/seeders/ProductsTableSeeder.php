<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Coca-Cola',

                'description' => 'Cold and refreshing soft drinks',
                'price' => '5000',
                'image' => 'products/coca_cola.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Cheeseburger',
                'description' => 'Classic cheeseburger with fries',
                'price' => '20000',
                'image' => 'products/cheeseburger.jpg',
            ],
            [
                'category_id' => 4,
                'name' => 'Chocolate Cake',

                'description' => 'Rich chocolate dessert',
                'price' => '15000',
                'image' => 'products/chocolate_cake.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

