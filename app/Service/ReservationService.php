<?php

namespace App\Service;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReservationService
{
    /**
     * Get all reservations with related user and time.
     */
    public function getAllWithRelations(): Collection
    {
        return Reservation::with('user')->latest()->get();
    }

    /**
     * Find a reservation by ID with user relation.
     */
    public function findByIdWithRelations(int $id): Reservation
    {
        return Reservation::with('user')->findOrFail($id);
    }

    /**
     * Update reservation status (approve, cancel).
     */
    public function updateStatus(int $id, string $status): void
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $status;
        $reservation->save();
    }
}
