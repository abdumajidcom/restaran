<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            $randomProducts = $products->random(min(4, $products->count()));

            foreach ($randomProducts as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 3),
                    'price' => $product->price,
                ]);
            }

          
            $order->update([
                'total' => $order->items->sum(fn($item) => $item->price * $item->quantity),
            ]);
        }
    }
}
