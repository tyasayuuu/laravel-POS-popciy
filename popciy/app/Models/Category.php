<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'biaya_tambahan']; // Sesuaikan dengan kolom kategori di database

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
