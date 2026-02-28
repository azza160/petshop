<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriProduk extends Model
{
    protected $table = 'galeri_produks';

    protected $fillable = [
        'produk_id',
        'path_foto',
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
}