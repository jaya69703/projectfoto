<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'book_id',
        'user_id',
        'paket_id',
        'rate',
        'desc',
    ];

    public function book()
    {
        return $this->belongsTo(Booking::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
