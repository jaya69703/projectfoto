<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'user_id',
        'paket_id',
        'book_date',
        'book_time',
        'book_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
