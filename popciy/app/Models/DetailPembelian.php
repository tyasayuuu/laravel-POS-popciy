<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian';
    protected $fillable = ['pembelian_id', 'nama_produk', 'jumlah', 'harga_beli'];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
    
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
