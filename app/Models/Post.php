<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'posts'; // Sesuaikan dengan nama tabel yang ada di database

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(CategoryB::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tagsb::class, 'post_tag', 'post_id', 'tag_id')->withPivot('post_id', 'tag_id');
    }
}
