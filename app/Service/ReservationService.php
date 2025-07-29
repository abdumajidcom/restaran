<?php

namespace App\Service;

use App\Repository\ReservationRepository;
use Illuminate\Database\Eloquent\Collection;

class ReservationService
{
    protected ReservationRepository $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
    }

    public function getUpcoming(): Collection
    {
        return $this->reservationRepository->getUpcoming();
    }

    public function create(array $data)
    {
        return $this->reservationRepository->initialize()->create($data);
    }
}
