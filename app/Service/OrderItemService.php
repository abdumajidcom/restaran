<?php

namespace App\Service;

use App\Repository\OrderItemRepository;
use Illuminate\Database\Eloquent\Collection;

class OrderItemService
{
    protected OrderItemRepository $orderItemRepository;

    public function __construct()
    {
        $this->orderItemRepository = new OrderItemRepository();
    }

    public function getItemsByOrder(int $orderId): Collection
    {
        return $this->orderItemRepository->getItemsByOrder($orderId);
    }

    public function create(array $data)
    {
        return $this->orderItemRepository->initialize()->create($data);
    }
}
