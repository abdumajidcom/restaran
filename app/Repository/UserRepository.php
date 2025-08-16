<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    public function getModel(): string
    {
        return User::class;
    }

    public function getUsers(): Collection
    {
        return $this->model::all();
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model::where('email', $email)->first();
    }
}
