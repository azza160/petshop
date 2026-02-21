<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public $incrementing = false; // ULID bukan auto increment
    protected $keyType = 'string'; // ULID string

     protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'stock',
        'photo',
        'isFavorite'
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
        return $this->belongsTo(Category::class)->where('type', 'product');
    }
}
