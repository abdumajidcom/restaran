<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Service\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View|RedirectResponse
    {
        try {
            $categories = $this->categoryService->getCategories();
            return view('admin.pages.categories.index', compact('categories'));
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function create(): View|RedirectResponse
    {
        try {
            return view('admin.pages.categories.create');
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        try {
        $this->categoryService->createCategory($request->validated());
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
        } catch (Throwable $th) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['error' => $th->getMessage()]);
        }
    }
    public function edit(int $id): View|RedirectResponse
    {
        try {
            $category = $this->categoryService->findCategoryById($id);
            return view('admin.pages.categories.edit', compact('category'));
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function update(UpdateCategoryRequest $request, int $id): RedirectResponse
    {
        try {
            $this->categoryService->updateCategory($id, $request->validated());
            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->categoryService->deleteCategory($id);
            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function products($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('admin.pages.categories.products', compact('category'));
    }

    public function show(Category $category): View
    {
        $products = $category->products()->latest()->get();

        return view('admin.pages.categories.show', compact('category', 'products'));
    }


}
