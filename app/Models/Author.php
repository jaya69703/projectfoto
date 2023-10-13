<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'author_name',
        // 'author_nitk',
        // 'divisi_id',
        // 'position_id',
        'author_start',
        'author_end',
        // 'author_sknumber',

        // PRIVATE DATA
        'author_kawin',
        'author_niknumber',
        // 'author_kknumber',
        'author_email',
        'author_phone',
        'author_placebirth',
        'author_datebirth',
        'author_gender',
        'author_religion',

        // KONTAK DARURAT
        'author_mother',
        'author_phonemother',
        'author_father',
        'author_phonefather',
        'author_wali',
        'author_phonewali',

        // SPECIAL IDENTITY
        'code',
    ];

}
