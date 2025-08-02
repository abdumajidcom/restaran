<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Service\ReservationService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\UpdateReservationStatusRequest;

class ReservationController extends Controller
{
    protected ReservationService $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * Display a listing of the reservations.
     */
    public function index(): View
    {
        $reservations = $this->reservationService->getAllWithRelations();
        return view('admin.pages.reservations.index', compact('reservations'));
    }



    /**
     * Display the specified reservation.
     */
    public function show(int $id): View
    {
        $reservation = $this->reservationService->findByIdWithRelations($id);
        return view('admin.pages.reservations.show', compact('reservation'));
    }

    /**
     * Update the reservation status (approve or cancel).
     */
    public function update(UpdateReservationStatusRequest $request, int $id): RedirectResponse
    {
        $this->reservationService->updateStatus($id, $request->validated()['status']);
        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservation status successfully updated.');
    }

    public function destroy(Reservation $reservation): RedirectResponse
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted.');
    }
}
