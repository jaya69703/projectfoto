<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'pakets'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'cpaket_id',
        'user_id',
        'name',
        'image',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'slug',
        'price',
        'description',
        'updated_at',
        'created_at'
    ];
    public function getPriceAttribute($value)
    {
        // Hapus aksesor ini jika Anda ingin mengakses nilai asli tanpa format tambahan
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
    public function getRawPriceAttribute()
    {
        return $this->attributes['price'];
    }

    public function cpaket()
    {
        return $this->belongsTo(PaketKategori::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
