<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada kategori hewan
        $kucingCategory = Category::firstOrCreate(['nama' => 'Kucing', 'tipe' => 'hewan']);
        $anjingCategory = Category::firstOrCreate(['nama' => 'Anjing', 'tipe' => 'hewan']);

        $animals = [
            [
               
                'nama' => 'Milo (Persia)',
                'umur' => 12,
                'category_id' => $kucingCategory->id,
                'deskripsi' => 'Kucing persia asli yang sangat lucu dan lincah. Sudah divaksin lengkap dan rutin pemeriksaan dokter hewan.',
                'harga' => 1500000,
                'stok' => 1,
                'isFavorite' => true,
                'photo' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'jenis_kelamin' => 'jantan',
                'sudah_steril' => true,
                'asal_hewan' => 'lokal',
                'berat' => 4.5,
            ],
            [
                'nama' => 'Bella (Beagle)',
                'umur' => 6,
                'category_id' => $anjingCategory->id,
                'deskripsi' => 'Anjing jenis beagle yang sangat aktif dan ramah. Cocok untuk diajak bermain dan penjaga rumah.',
                'harga' => 2500000,
                'stok' => 2,
                'isFavorite' => false,
                'photo' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'jenis_kelamin' => 'betina',
                'sudah_steril' => false,
                'asal_hewan' => 'hasil_breeding',
                'berat' => 12.0,
            ],
            [
                'nama' => 'Luna (Scottish Fold)',
                'umur' => 8,
                'category_id' => $kucingCategory->id,
                'deskripsi' => 'Scottish fold betina dengan warna abu-abu solid. Karakternya sangat tenang dan manja.',
                'harga' => 3000000,
                'stok' => 1,
                'isFavorite' => true,
                'photo' => 'https://images.unsplash.com/photo-1573865526739-10659fec78a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'jenis_kelamin' => 'betina',
                'sudah_steril' => false,
                'asal_hewan' => 'impor',
                'berat' => 3.8,
            ],
        ];

        foreach ($animals as $animalData) {
            $animal = Animal::create($animalData);

            // Buat dummy galeri
            $galleryPhotos = [
                'https://images.unsplash.com/photo-1495360010541-f48722b34f7d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1533738363-b7f9aef128ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1573865526739-10659fec78a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            ];

            foreach ($galleryPhotos as $photo) {
                \App\Models\FotoHewan::create([
                    'hewan_id' => $animal->id,
                    'path_foto' => $photo,
                ]);
            }
        }
    }
}
