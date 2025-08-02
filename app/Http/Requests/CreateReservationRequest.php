<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Agar admin panelda ishlatilayotgan bo‘lsa
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'type' => ['required', 'in:table,cabinet'],
            'guest_count' => ['required', 'integer', 'min:1'],
            'reservation_time' => ['required', 'date', 'after:now'],
            'note' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,confirmed,cancelled'],
        ];
    }
}
