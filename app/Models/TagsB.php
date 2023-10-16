<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsB extends Model
{
    use HasFactory;
    protected $table = 'tagsb'; // Sesuaikan dengan nama tabel yang ada di database

    protected $guarded = [];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id')->withPivot('post_id', 'tag_id');
    }

}
