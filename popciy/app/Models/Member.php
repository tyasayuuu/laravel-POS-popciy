<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_member', 'nama', 'telepon', 'alamat',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($member) {
            $member->kode_member = 'MBRPOP-' . strtoupper(uniqid());
        });
    }
}
