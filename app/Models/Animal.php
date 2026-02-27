<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;
    public $incrementing = false; // ULID bukan auto increment
    protected $keyType = 'string'; // ULID string

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

     // Generate ULID otomatis saat creating
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::ulid();
            }
        });
    }

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
