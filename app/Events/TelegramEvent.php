<?php

namespace App\Events;

use App\Models\Book;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TelegramEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $products;
    public string $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $products, string $action)
    {
        $this->products = $products;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
