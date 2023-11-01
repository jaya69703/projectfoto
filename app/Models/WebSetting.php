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
        'site_slide_1',
        'site_slide_2',
        'site_slide_3',
        'site_slide_4',
        'site_slide_5',
        'site_slide_6',
        'site_slide_7',
        'site_slide_8',
        'site_slide_9',
        'site_slide_10',
        'site_slide_11',
        'site_slide_12',
        'site_phone',
        'site_social_fb',
        'site_social_ig',
        'site_social_in',
        'site_social_tw',
    ];
}
