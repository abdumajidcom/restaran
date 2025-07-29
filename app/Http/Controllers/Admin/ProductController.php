<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.pages.products.index', compact('products'));
    }

   
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.products.create', compact('categories'));
    }

    // (formadan yuborilgan ma’lumot asosida)
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        // Agar rasm yuklangan bo‘lsa, uni saqlash
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Mahsulotni DB ga yozish
        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    
    public function show(Product $product)
    {
        return view('admin.pages.products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    
    public function update(StoreProductRequest $request, Product $product)
    {
        $data = $request->validated();

        // Yangi rasm bo‘lsa, eskisini o‘chirib, yangisini saqlash
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Ma'lumotlarni yangilash
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    
    public function destroy(Product $product)
    {
        // Rasmni o‘chirish
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Mahsulotni o‘chirish
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
