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
                'email' => 'ali@example.com',
                'phone' => '998901234567',
                'guest_total' => 4,
                'reservation_time' => Carbon::now()->addDays(1)->setTime(19, 30),
                'note' => 'Window seat, please'
            ],
            [
                'name' => 'Nodira Abdullayeva',
                'email' => 'nodira@mail.com',
                'phone' => '998998887766',
                'guest_total' => 2,
                'reservation_time' => Carbon::now()->addDays(2)->setTime(20, 0),
                'note' => null
            ],
        ]);
    }
}
