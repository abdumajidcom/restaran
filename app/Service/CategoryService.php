<?php

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
}
