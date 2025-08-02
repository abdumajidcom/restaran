<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CategoriesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([ProductsTableSeeder::class]);
        $this->call([ReservationsTableSeeder::class]);
        $this->call([OrdersTableSeeder::class]);
        $this->call([ OrderItemsTableSeeder::class]);
        $this->call([ DrinksTableSeeder::class]);
        $this->call([ FoodsTableSeeder::class]);
        $this->call([ DessertsTableSeeder::class]);
    
    }
}
