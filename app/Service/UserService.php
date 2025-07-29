<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAll(): Collection
    {
        return $this->userRepository->getUsers();
    }

    public function findByEmail(string $email)
    {
        return $this->userRepository->findByEmail($email);
    }
}
