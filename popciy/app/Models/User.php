<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'hm_user'; // pakai tabel an_user

    // Karena di migrasi kita pakai kolom 'id', ini sudah sesuai dengan Laravel default
    protected $primaryKey = 'id';

    // Kita pakai timestamps
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
