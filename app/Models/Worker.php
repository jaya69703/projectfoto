<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'worker'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        // IDENTITAS ACCOUNT
        'worker_name',
        'worker_nitk',
        'divisi_id',
        'position_id',
        'worker_start',
        'worker_end',
        'worker_sknumber',

        // PRIVATE DATA
        'worker_kawin',
        'worker_niknumber',
        'worker_kknumber',
        'worker_email',
        'worker_phone',
        'worker_placebirth',
        'worker_datebirth',
        'worker_gender',
        'worker_religion',

        // KONTAK DARURAT
        'worker_mother',
        'worker_phonemother',
        'worker_father',
        'worker_phonefather',
        'worker_wali',
        'worker_phonewali',

        // SPECIAL IDENTITY
        'code',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

}
