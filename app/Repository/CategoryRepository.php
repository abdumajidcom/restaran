<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends BaseRepository
{
    public function getModel(): string
    {
        return Category::class;
    }


    public function getCategories(): Collection
    {
        return $this->model::get();
    }

    public function create(array $data): Category
    {
        return $this->model::create($data);
    }

    public function findById(int $id): ?Category
    {
        return $this->model::find($id);
    }

    public function update(int $id, array $data): bool
    {
        $category = $this->findById($id);
        return $category ? $category->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $category = $this->findById($id);
        return $category ? $category->delete() : false;
    }
}