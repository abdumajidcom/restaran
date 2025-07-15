<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function getModel(): string
    {
        return Product::class;
    }
}
