<?php

namespace App\Service\Telegram;

use App\Models\Product;

class TelegramService
{
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram();
    }

    public function send(Product $products, string $action)
    {
        $message = $this->prepareMessage($products, $action);
        return $this->telegram->send($message);
    }

    protected function prepareMessage(Product $products, string $action): string
    {
        $emoji = match ($action) {
            'created' => '✅',
            'updated' => '✏️',
            'deleted' => '❌',
            default   => 'ℹ️',
        };

        return "{$emoji} Product {$action}:\n"
            . "🆔 Category ID: {$products->category_id}\n"
            . "👤 Name: {$products->name}\n"
            . "📧 Price: {$products->price}";
    }
}
