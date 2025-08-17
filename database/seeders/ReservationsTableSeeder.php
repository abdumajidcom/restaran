<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    public function run()
    {
        Reservation::insert([
            [
                'name' => 'Ali Karimov',
                
                'phone' => '998901234567',
                'guest_count' => 4,
                'reservation_time' => Carbon::now()->addDays(1)->setTime(19, 30),
                'note' => 'Window seat, please'
            ],
            [
                'name' => 'Nodira Abdullayeva',
                
                'phone' => '998998887766',
                'guest_count' => 2,
                'reservation_time' => Carbon::now()->addDays(2)->setTime(20, 0),
                'note' => null
            ],
        ]);
    }
}
