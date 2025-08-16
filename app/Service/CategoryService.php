<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\CategoryRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    protected $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    /**
     * Retrieves a list of categories.
     *
     * @return Collection The retrieved categories.
     * @throws Exception If no categories are found.
     */
    public function getCategories(): Collection
    {
        $categories = $this->categoryRepository->getCategories();
        if ($categories->count() == 0) {
            throw new Exception('Categories not found');
        }
        return $categories;
    }

    /**
     * @throws Exception
     */
    public function createCategory(array $data): \App\Models\Category
    {
        $categories = $this->getCategories();
        foreach ($categories as $category) {
            if ($category->name == $data['name']) {
                throw new Exception('Category already exists');
            }
        }
        $result = $this->categoryRepository->create($data);
        if (!$result) {
            throw new Exception('Category not created');
        }
        return $result;
    }

    public function findCategoryById(int $id): \App\Models\Category
    {
        $category = $this->categoryRepository->findById($id);
        if (!$category) {
            throw new Exception('Category not found');
        }
        return $category;
    }

    public function updateCategory(int $id, array $data): bool
    {
        $this->findCategoryById($id); // mavjudligini tekshir
        $updated = $this->categoryRepository->update($id, $data);
        if (!$updated) {
            throw new Exception('Category not updated');
        }
        return true;
    }

    public function deleteCategory(int $id): bool
    {
        $this->findCategoryById($id); // mavjudligini tekshir
        $deleted = $this->categoryRepository->delete($id);
        if (!$deleted) {
            throw new Exception('Category not deleted');
        }
        return true;
    }

    public function searchCategories(string $keyword): Collection
   {
        $results = $this->categoryRepository->search($keyword);
        if ($results->isEmpty()) {
            throw new Exception('No categories found for the given search keyword.');
        }
        return $results;
    }
}
