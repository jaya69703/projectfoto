<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketKategori extends Model
{
    use HasFactory;
    protected $table = 'paket_kategoris'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'name',
        'slug',
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'cpaket_id');
    }
}
