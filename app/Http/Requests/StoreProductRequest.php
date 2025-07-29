<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Agar foydalanuvchini tekshirmoqchi bo‘lsang, bu yerda o‘zgartirasan
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string|max:1000',
            'sold_out' => 'nullable|boolean',
        ];
    }
}
