<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;
    protected $table = 'web_settings'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'name',
        'image',
        'head_title',
        'head_desc',
        'site_link',
        'site_mail',
        'site_phone',
        'site_social_fb',
        'site_social_ig',
        'site_social_in',
        'site_social_tw',
    ];
}
