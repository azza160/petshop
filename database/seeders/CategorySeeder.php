<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Kucing', 'tipe' => 'hewan'],
            ['nama' => 'Anjing', 'tipe' => 'hewan'],
            ['nama' => 'Kelinci', 'tipe' => 'hewan'],
            ['nama' => 'Hamster', 'tipe' => 'hewan'],
            ['nama' => 'Burung', 'tipe' => 'hewan'],
            ['nama' => 'Ikan Hias', 'tipe' => 'hewan'],
            ['nama' => 'Reptil', 'tipe' => 'hewan'],
            ['nama' => 'Guinea Pig', 'tipe' => 'hewan'],
            ['nama' => 'Makanan Kering', 'tipe' => 'produk'],
            ['nama' => 'Makanan Basah', 'tipe' => 'produk'],
            ['nama' => 'Camilan & Snack', 'tipe' => 'produk'],
            ['nama' => 'Vitamin & Suplemen', 'tipe' => 'produk'],
            ['nama' => 'Obat-obatan', 'tipe' => 'produk'],
            ['nama' => 'Aksesoris', 'tipe' => 'produk'],
            ['nama' => 'Kandang & Sangkar', 'tipe' => 'produk'],
            ['nama' => 'Mainan Hewan', 'tipe' => 'produk'],
            ['nama' => 'Grooming & Perawatan', 'tipe' => 'produk'],
            ['nama' => 'Tempat Minum & Makan', 'tipe' => 'produk'],
            ['nama' => 'Pasir & Alas Kandang', 'tipe' => 'produk'],
            ['nama' => 'Pakaian Hewan', 'tipe' => 'produk'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
