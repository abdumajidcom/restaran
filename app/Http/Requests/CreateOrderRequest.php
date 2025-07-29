<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_number' => 'required|string|unique:orders,order_number',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:50',
            'customer_email' => 'nullable|email|max:255',
            'total' => 'nullable|numeric',
            'status' => 'required|in:pending,confirmed,rejected',
            'status' => 'required|string|max:50',
        ];
    }

}
