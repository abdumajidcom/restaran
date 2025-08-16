<?php

namespace App\Listeners;

use App\Service\Telegram\TelegramService;

class TelegramListener
{
    protected $telegramService;

    public function __construct()
    {
        $this->telegramService = new TelegramService();
    }

    public function handle($event)
    {
        $products = $event->products;
        $action = $event->action;

        $this->telegramService->send($products, $action);
    }
}
