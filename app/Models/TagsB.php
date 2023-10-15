<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsB extends Model
{
    use HasFactory;
    protected $table = 'tagsb'; // Sesuaikan dengan nama tabel yang ada di database

    protected $guarded = [];
    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
