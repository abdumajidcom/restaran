<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'required|string|max:50',
            'reservation_time' => 'nullable|date',
            'status' => 'required|in:pending,confirmed,rejected',
        ];
    }
}
