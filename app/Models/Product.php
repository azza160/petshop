<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'nama',
        'kategori_id',
        'deskripsi',
        'harga',
        'stok',
        'is_favorit',
        'foto_utama',
        'merek',
        'tanggal_kadaluarsa',
        'berat'
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id')->where('tipe', 'produk');
    }

    public function galeri()
    {
        return $this->hasMany(GaleriProduk::class, 'produk_id');
    }
}
