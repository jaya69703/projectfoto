<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    
    protected $table = 'galleries'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'user_id',
        'paket_id',
        'cpaket_id',
        'cover',
        'name',
        'desc',
        'slug',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function cpaket()
    {
        return $this->belongsTo(PaketKategori::class);
    }
}
