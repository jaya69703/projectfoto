<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'page_id',
        'name',
        'desc',
    ];

    public function pages()
    {
        return $this->belongsTo(CategoryB::class);
    }

}
