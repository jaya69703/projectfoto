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
        'book_done',
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
            return 'Menunggu Pembayaran';
        } elseif ($value === 1) {
            return 'Menunggu Verifikasi';
        } elseif ($value === 2) {
            return 'Diterima';
        } elseif ($value === 3) {
            return 'Ditolak';
        } elseif ($value === 4) {
            return 'Menunggu Penjadwalan';
        } elseif ($value === 5) {
            return 'Sedang Foto Shoot';
        } elseif ($value === 6) {
            return 'Tahap Editing Hasil Foto';
        } elseif ($value === 7) {
            return 'Selesai';
        } else {
            return 'Status Tidak Diketahui';
        }
    }

}
