<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcements'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'user_id',
        'title',
        'desc',
        'attach',
        'exp_date',
        'status',
        'updated_at',
        'created_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
