<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    // Relasi ke Animals
    public function animals()
    {
        return $this->hasMany(Animal::class)->where('type', 'animal');
    }

    // Relasi ke Products
    public function products()
    {
        return $this->hasMany(Product::class)->where('type', 'product');
    }

}
