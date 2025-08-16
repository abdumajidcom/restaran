<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run()
    {
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
            Drink::create($drink);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
};
