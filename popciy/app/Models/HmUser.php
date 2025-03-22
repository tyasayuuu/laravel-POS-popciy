<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HmUser extends Authenticatable
{
    use HasFactory;

    // 1) Tabel yang dipakai
    protected $table = 'hm_user';

    // 2) Primary key (kalau auto increment, namanya apa?)
    //    Misalnya kolom 'id' (jika sudah sesuai) atau 'user_id'
    protected $primaryKey = 'id';
    // Jika PK-mu adalah 'id', biarkan saja.
    // Jika PK di an_user adalah 'user_id', ganti di sini.

    // 3) Kalau tidak pakai timestamps, set false
    public $timestamps = false;

    // 4) Kolom apa saja yang bisa diisi mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        // kolom lain yang mau diisi
    ];

    // 5) Agar Auth::attempt() cocok dengan kolom 'password'
    //    Pastikan kolom di DB juga bernama 'password'
    //    Jika bernama 'user_pass', kita override getAuthPassword():
    //    public function getAuthPassword()
    //    {
    //        return $this->user_pass;
    //    }
}
