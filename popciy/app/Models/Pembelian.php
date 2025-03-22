<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian'; // Pastikan nama tabel benar
    protected $fillable = ['tanggal_pembelian', 'pemasok_id', 'total_modal'];

    // Relasi ke Detail Pembelian
    public function pembelianDetails()
    {
        return $this->hasMany(DetailPembelian::class, 'pembelian_id');
    }

    public function pemasok()
    {
        return $this->belongsTo(\App\Models\Pemasok::class, 'pemasok_id');
    }
}
