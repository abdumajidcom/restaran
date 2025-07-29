<?php

namespace App\Repository;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;

class ReservationRepository extends BaseRepository
{
    // Ushbu repository qaysi modelga tegishli
    public function getModel(): string
    {
        return Reservation::class;
    }

    // Hozirdan keyingi barcha reservationlarni olib keladi
    public function getUpcoming(): Collection
    {
        return $this->model::where('reservation_time', '>=', now())->get();
    }
}
