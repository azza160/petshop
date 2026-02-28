<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'nama',
        'umur',
        'category_id',
        'deskripsi',
        'harga',
        'stok',
        'isFavorite',
        'photo',
        'jenis_kelamin',
        'sudah_steril',
        'asal_hewan',
        'berat'
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class)->where('tipe', 'hewan');
    }

    public function fotoHewan()
    {
        return $this->hasMany(FotoHewan::class, 'hewan_id');
    }
}
