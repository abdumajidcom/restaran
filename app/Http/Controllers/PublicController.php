<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function drinks(): View
    {
        $drinks = Product::whereHas('category', function ($query) {
            $query->where('name', 'Drinks');
        })->get();

        return view('public.drinks', compact('drinks'));
    }

    public function foods(): View
    {
        $foods = Product::whereHas('category', function ($query) {
            $query->where('name', 'Foods');
        })->get();

        return view('public.foods', compact('foods'));
    }

    public function desserts(): View
    {
        $desserts = Product::whereHas('category', function ($query) {
            $query->where('name', 'Desserts');
        })->get();

        return view('public.desserts', compact('desserts'));
    }
}
