<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Exception;
use App\Events\TelegramEvent;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    protected ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function getAll(): Collection
    {
        return $this->productRepository->getModel()::all();
    }

    public function create(array $data)
    {
        return $this->productRepository->initialize()->create($data);

        TelegramEvent::dispatch($result, 'created');
    }

    public function find(int $id)
    {
        return $this->productRepository->initialize()->find($id);
    }
}
