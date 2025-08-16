<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryViewController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('site.categories.index', compact('categories'));
    }

    public function show($id): View
    {
        $category = Category::with('products')->findOrFail($id);
        return view('site.categories.show', compact('category'));
    }
}
