<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'image',
        'phone',
        'email',
        'type',
        'password',
        'isverify',
        'created_at', // tambahkan created_at di sini
        'updated_at', // tambahkan updated_at di sini
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function type(): Attribute

    {

        return new Attribute(

            get: fn ($value) =>  match ($value) {
                0 => "Member",
                1 => "Member Plus",
                2 => "Author",
                3 => "Admin",
                4 => "Super Admin",
                default => throw new \Exception("Undefined array key"),
            }
        );
    }

    public function worker()
    {
        return $this->hasOne(Worker::class, 'code', 'code');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getPhoneAttribute($value)
    {
        // Periksa apakah nomor telepon dimulai dengan "0"
        if (strpos($value, '0') === 0) {
            // Jika ya, ubah menjadi "+62" dan hapus angka "0" di awal
            return '+62' . substr($value, 1);
        }

        // Jika tidak dimulai dengan "0", biarkan seperti itu
        return $value;
    }
}
