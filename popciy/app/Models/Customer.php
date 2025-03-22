<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Sesuai dengan nama tabel di database
    protected $fillable = ['name', 'phone', 'email', 'address'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'customer_id');
    }
}
