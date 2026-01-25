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

/**
 * Category Controller
 */
class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $categories = $this->categoryService->getCategories();
            return view('admin.pages.categories.index', compact('categories'));
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
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

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function products($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::with('products')->findOrFail($id);

        return view('admin.pages.categories.products', compact('category'));
    }

    /**
     * bu
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = $category->products()->latest()->get();

        return view('admin.pages.categories.show', compact('category', 'products'));
    }


}
