<?php

namespace App\Service;

use App\Models\Order;
use App\Repository\OrderRepository;
use Illuminate\Database\Eloquent\Collection;
use Exception;

class OrderService
{
    protected OrderRepository $orderRepository;
    protected TelegramNotificationService $telegramService;

    public function __construct(OrderRepository $orderRepository, TelegramNotificationService $telegramService)
    {
        $this->orderRepository = $orderRepository;
        $this->telegramService = $telegramService;
    }

    public function getOrders(): Collection
    {
        return $this->orderRepository->getOrders();
    }

    public function findOrderById(int $id): Order
    {
        $order = $this->orderRepository->findById($id);
        if (!$order) {
            throw new Exception("Order not found");
        }
        return $order;
    }

    public function createOrder(array $data): Order
    {

        $order = $this->orderRepository->create($data);

        $message = "*🆕 New Order!*\n";
        $message .= "🧾 Order ID: `{$order->id}`\n";
        $message .= "📅 Time: `{$order->created_at->format('d.m.Y H:i')}`\n";
        $message .= "👤 Customer: `{$order->name}`\n";
        $message .= "📞 Phone: `{$order->phone}`";

        // Send the message to Telegram
        $this->telegramService->sendMessage($message);

        // Return the created order
        return $order;
    }


    public function updateOrder(int $id, array $data): bool
    {
        return $this->orderRepository->update($id, $data);
    }

    public function deleteOrder(int $id): bool
    {
        return $this->orderRepository->delete($id);
    }
}
