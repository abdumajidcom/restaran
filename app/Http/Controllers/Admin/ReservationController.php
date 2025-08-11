<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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


    public function create()
    {
        $user = User::all();
        return view('admin.pages.reservations.create', compact('user'));
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id'          => 'nullable|exists:users,id',
            'name'             => 'required|string|max:255',
            'phone'            => 'required|string|max:255',
            'type'             => 'nullable|string|max:255',
            'guest_count'      => 'required|integer|min:1',
            'guest_total'      => 'nullable|integer|min:1',
            'reservation_time' => 'required|date_format:Y-m-d\TH:i',
            'note'             => 'nullable|string',
            'status'           => 'required|in:pending,confirmed,cancelled',
        ]);

        $this->reservationService->create($validated);

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservation successfully added.');
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
