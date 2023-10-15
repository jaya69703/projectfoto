<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryB extends Model
{
    use HasFactory;

    protected $table = 'categorybs'; // Sesuaikan dengan nama tabel yang ada di database

    protected $guarded = [];
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
