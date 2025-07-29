<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        Order::insert([
            [
                'order_number' => 'ORD-1001',
                'customer_name' => 'Ali Karimov',
                'customer_phone' => '998901234567',
                'customer_email' => 'ali@example.com',
                'total' => 25000,
                'status' => 'pending',
            ],
            [
                'order_number' => 'ORD-1002',
                'customer_name' => 'Nodira Abdullayeva',
                'customer_phone' => '998998887766',
                'customer_email' => 'nodira@mail.com',
                'total' => 15000,
                'status' => 'approved',
            ]
        ]);
    }
}
