<?php

namespace App\Service;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReservationService
{
    /**
     * Get all reservations with related user.
     */
    public function getAllWithRelations(): Collection
    {
        return Reservation::with('user')->latest()->get();
    }

    /**
     * Find a reservation by ID with user relation.
     *
     * @throws ModelNotFoundException
     */
    public function findByIdWithRelations(int $id): Reservation
    {
        return Reservation::with('user')->findOrFail($id);
    }

    /**
     * Create a new reservation.
     */
    public function create(array $data): Reservation
    {
        return Reservation::create($data);
    }

    /**
     * Update a reservation by ID.
     *
     * @throws ModelNotFoundException
     */
    public function update(int $id, array $data): Reservation
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($data);
        return $reservation;
    }

    /**
     * Update reservation status (approve, cancel, etc).
     *
     * @throws ModelNotFoundException
     */
    public function updateStatus(int $id, string $status): Reservation
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $status;
        $reservation->save();
        return $reservation;
    }

    /**
     * Delete a reservation by ID.
     *
     * @throws ModelNotFoundException
     */
    public function delete(int $id): bool
    {
        $reservation = Reservation::findOrFail($id);
        return $reservation->delete();
    }
}
