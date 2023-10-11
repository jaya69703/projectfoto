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
        'book_stat',
        'book_prof',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function getBookStatAttribute($value)
    {
        if ($value === 0) {
            return '<span class="btn btn-sm btn-outline-danger">Menunggu Pembayaran</span>';
        } elseif ($value === 1) {
            // Tambahkan kondisi lain jika diperlukan
            return '<span class="btn btn-sm btn-outline-warning">Menunggu Verifikasi</span>';
        } else {
            // Tambahkan kondisi lain jika diperlukan
            return '<span class="badge badge-success">Status Lainnya</span>';
        }
    }
}
