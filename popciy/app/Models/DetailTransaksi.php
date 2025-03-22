<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $fillable = ['transaksi_id', 'product_id', 'jumlah', 'harga', 'subtotal'];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
