<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'type' => ['required', 'in:table,cabinet'],
            'guest_count' => ['required', 'integer', 'min:1'],
            'reservation_time' => ['required', 'date'],
            'note' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,confirmed,cancelled'],
        ];
    }
}
