<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'type',
        'email',
        'guest_count',
        'guest_total',
        'reservation_time',
        'note',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

