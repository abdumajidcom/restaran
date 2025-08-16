<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Admin bo'lgani uchun ruxsat beramiz
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'in:pending,approved,cancelled'],
        ];
    }
}
