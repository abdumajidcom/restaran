<?php

namespace App\Repository;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository extends BaseRepository
{
    public function getModel(): string
    {
        return Order::class;
    }

    public function getOrders(): Collection
    {
        return $this->model::latest()->get();
    }

    public function findById(int $id): ?Order
    {
        return $this->model::find($id);
    }

    public function create(array $data): Order
    {
        return $this->model::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $order = $this->findById($id);
        return $order ? $order->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $order = $this->findById($id);
        return $order ? $order->delete() : false;
    }
}
