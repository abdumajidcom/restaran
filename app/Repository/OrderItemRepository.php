<?php

namespace App\Repository;


use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;


class OrderItemRepository extends BaseRepository
{
    // Bu metod qaysi model bilan ishlashini aniqlaydi
    // Bu holatda model — OrderItem
    public function getModel(): string
    {
        return OrderItem::class;
    }

    // Berilgan order_id bo‘yicha OrderItemlarni olib keladi
    // Bu metod integer tipidagi $orderId qabul qiladi va natijada kolleksiya qaytaradi
    public function getItemsByOrder(int $orderId): Collection
    {
        // OrderItemlar ichidan order_id teng bo‘lganlarini olib keladi
        return $this->model::where('order_id', $orderId)->get();
    }
}
