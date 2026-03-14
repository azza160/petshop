<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil category by nama
        $catMakananKering   = Category::where('nama', 'Makanan Kering')->first();
        $catMakananBasah    = Category::where('nama', 'Makanan Basah')->first();
        $catCamilan         = Category::where('nama', 'Camilan & Snack')->first();
        $catVitamin         = Category::where('nama', 'Vitamin & Suplemen')->first();
        $catAksesoris       = Category::where('nama', 'Aksesoris')->first();
        $catMainan          = Category::where('nama', 'Mainan Hewan')->first();
        $catGrooming        = Category::where('nama', 'Grooming & Perawatan')->first();
        $catPasir           = Category::where('nama', 'Pasir & Alas Kandang')->first();
        $catKandang         = Category::where('nama', 'Kandang & Sangkar')->first();
        $catObat            = Category::where('nama', 'Obat-obatan')->first();

        $catWadah            = Category::firstOrCreate(['nama' => 'Tempat Minum & Makan', 'tipe' => 'produk']);
        $catPakaian          = Category::firstOrCreate(['nama' => 'Pakaian Hewan', 'tipe' => 'produk']);

        $products = [
            [
                'nama'               => 'Royal Canin Kitten 400gr',
                'kategori_id'        => $catMakananKering->id,
                'deskripsi'          => 'Makanan kering premium untuk anakan kucing usia 1-4 bulan. Kaya nutrisi, mengandung vitamin E dan C untuk menunjang antibodi anak kucing. Dilengkapi DHA untuk perkembangan otak optimal.',
                'harga'              => 85000,
                'stok'               => 25,
                'is_favorit'         => true,
                'foto_utama'         => 'https://picsum.photos/seed/prod1/500/500',
                'merek'              => 'Royal Canin',
                'tanggal_kadaluarsa' => '2027-04-12',
                'berat'              => 0.4,
            ],
            [
                'nama'               => 'Whiskas Tuna in Jelly 85gr',
                'kategori_id'        => $catMakananBasah->id,
                'deskripsi'          => 'Makanan basah kucing dewasa dengan potongan tuna asli dalam jelly yang lezat. Mengandung protein tinggi dan taurin untuk kesehatan jantung dan penglihatan kucing.',
                'harga'              => 12000,
                'stok'               => 100,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod2/500/500',
                'merek'              => 'Whiskas',
                'tanggal_kadaluarsa' => '2026-11-30',
                'berat'              => 0.085,
            ],
            [
                'nama'               => 'Temptations Mix Ups Kucing 85gr',
                'kategori_id'        => $catCamilan->id,
                'deskripsi'          => 'Camilan lezat berbentuk bintang untuk kucing dewasa. Renyah di luar dan lembut di dalam. Cocok sebagai hadiah saat melatih kucing. Tersedia dalam tiga varian rasa.',
                'harga'              => 35000,
                'stok'               => 60,
                'is_favorit'         => true,
                'foto_utama'         => 'https://picsum.photos/seed/prod3/500/500',
                'merek'              => 'Temptations',
                'tanggal_kadaluarsa' => '2026-08-20',
                'berat'              => 0.085,
            ],
            [
                'nama'               => 'Vitapet Omega 3 & 6 untuk Anjing',
                'kategori_id'        => $catVitamin->id,
                'deskripsi'          => 'Suplemen minyak ikan kaya omega 3 dan omega 6 untuk anjing. Membantu menjaga kesehatan bulu, kulit, sendi, dan sistem imun. Tersedia dalam bentuk kapsul soft gel.',
                'harga'              => 120000,
                'stok'               => 30,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod4/500/500',
                'merek'              => 'Vitapet',
                'tanggal_kadaluarsa' => '2027-01-15',
                'berat'              => 0.15,
            ],
            [
                'nama'               => 'Kalung Kulit Anjing Premium M',
                'kategori_id'        => $catAksesoris->id,
                'deskripsi'          => 'Kalung kulit asli berkualitas tinggi untuk anjing ukuran sedang. Dilengkapi ring stainless untuk tali leash, gesper tahan karat yang kuat dan tahan lama. Tersedia dalam berbagai warna.',
                'harga'              => 75000,
                'stok'               => 45,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod5/500/500',
                'merek'              => 'PawsPlus',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.08,
            ],
            [
                'nama'               => 'Bola Interaktif Kucing LED',
                'kategori_id'        => $catMainan->id,
                'deskripsi'          => 'Bola mainan interaktif dengan lampu LED berputar yang menstimulasi insting berburu kucing. Bergerak sendiri secara random sehingga membuat kucing aktif bergerak dan tidak mudah bosan.',
                'harga'              => 45000,
                'stok'               => 55,
                'is_favorit'         => true,
                'foto_utama'         => 'https://picsum.photos/seed/prod6/500/500',
                'merek'              => 'CatFun',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.12,
            ],
            [
                'nama'               => 'Sampo Anjing Anti Kutu Herbal 250ml',
                'kategori_id'        => $catGrooming->id,
                'deskripsi'          => 'Sampo herbal khusus anjing dengan formula anti kutu dan pinjal alami. Mengandung ekstrak neem dan lavender yang aman untuk anjing dan efektif membasmi kutu. PH balanced sesuai kulit anjing.',
                'harga'              => 55000,
                'stok'               => 40,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod7/500/500',
                'merek'              => 'BioGroom',
                'tanggal_kadaluarsa' => '2027-06-10',
                'berat'              => 0.25,
            ],
            [
                'nama'               => 'Pasir Gumpal Wangi Kopi 5L',
                'kategori_id'        => $catPasir->id,
                'deskripsi'          => 'Pasir gumpal aroma kopi untuk kucing yang efektif menetralisir bau kotoran. Cepat menggumpal sehingga mudah dibersihkan, debu minimal, dan tidak menempel ke kaki kucing.',
                'harga'              => 42000,
                'stok'               => 80,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod8/500/500',
                'merek'              => 'Meow Litter',
                'tanggal_kadaluarsa' => null,
                'berat'              => 5.0,
            ],
            [
                'nama'               => 'Kandang Kawat Hamster 2 Lantai',
                'kategori_id'        => $catKandang->id,
                'deskripsi'          => 'Kandang kawat dua lantai untuk hamster dengan roda putar, botol minum otomatis, dan tempat makan. Dilengkapi tangga penghubung antar lantai. Mudah dibersihkan dan berventilasi baik.',
                'harga'              => 185000,
                'stok'               => 15,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod9/500/500',
                'merek'              => 'HamsterHome',
                'tanggal_kadaluarsa' => null,
                'berat'              => 1.2,
            ],
            [
                'nama'               => 'Obat Cacing Drontal Cat 1 Tablet',
                'kategori_id'        => $catObat->id,
                'deskripsi'          => 'Obat cacing spektrum luas untuk kucing dewasa. Efektif membasmi berbagai jenis cacing seperti cacing gelang, cacing tambang, dan cacing pita. Diberikan sekali per 3 bulan sesuai berat badan.',
                'harga'              => 28000,
                'stok'               => 200,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod10/500/500',
                'merek'              => 'Bayer',
                'tanggal_kadaluarsa' => '2026-12-31',
                'berat'              => 0.005,
            ],
            [
                'nama'               => 'Pedigree Adult Chicken & Veg 3kg',
                'kategori_id'        => $catMakananKering->id,
                'deskripsi'          => 'Makanan kering lengkap untuk anjing dewasa semua ras. Formula dengan ayam dan sayuran segar yang seimbang untuk mendukung kesehatan gigi, tulang, kulit, dan bulu anjing kesayangan Anda.',
                'harga'              => 135000,
                'stok'               => 35,
                'is_favorit'         => true,
                'foto_utama'         => 'https://picsum.photos/seed/prod11/500/500',
                'merek'              => 'Pedigree',
                'tanggal_kadaluarsa' => '2026-09-15',
                'berat'              => 3.0,
            ],
            [
                'nama'               => 'Me-O Creamy Treats Tuna 15g',
                'kategori_id'        => $catCamilan->id,
                'deskripsi'          => 'Camilan krim lezat berbahan dasar tuna untuk kucing dewasa. Teksturnya creamy membuatnya mudah dijilat langsung dari sachet. Mengandung vitamin E dan B6 untuk kesehatan kucing.',
                'harga'              => 7000,
                'stok'               => 150,
                'is_favorit'         => true,
                'foto_utama'         => 'https://picsum.photos/seed/prod12/500/500',
                'merek'              => 'Me-O',
                'tanggal_kadaluarsa' => '2026-07-01',
                'berat'              => 0.015,
            ],
            [
                'nama'               => 'Topi & Baju Anjing Natal Size S',
                'kategori_id'        => $catAksesoris->id,
                'deskripsi'          => 'Set kostum natal lucu untuk anjing kecil. Terdiri dari topi Santa dan baju rajut motif natal berwarna merah dan putih. Bahan soft fleece nyaman dipakai dan mudah dicuci.',
                'harga'              => 95000,
                'stok'               => 20,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod13/500/500',
                'merek'              => 'PetStyle',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.09,
            ],
            [
                'nama'               => 'Sisir Grooming Bulu Panjang Anti Rontok',
                'kategori_id'        => $catGrooming->id,
                'deskripsi'          => 'Sisir grooming khusus untuk hewan berbulu panjang seperti kucing Persia dan anjing Golden. Gigi baja tahan karat yang lentur menjangkau lapisan bulu dalam tanpa menyakiti kulit hewan.',
                'harga'              => 48000,
                'stok'               => 70,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod14/500/500',
                'merek'              => 'FurmiBrush',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.11,
            ],
            [
                'nama'               => 'HappyCat Vitamin Kucing Senior 60 Tab',
                'kategori_id'        => $catVitamin->id,
                'deskripsi'          => 'Vitamin lengkap khusus kucing senior di atas 7 tahun. Mengandung glukosamin untuk kesehatan sendi, antioksidan tinggi, serta vitamin B kompleks untuk menjaga stamina dan kesehatan organ vital kucing tua.',
                'harga'              => 95000,
                'stok'               => 25,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod15/500/500',
                'merek'              => 'HappyCat',
                'tanggal_kadaluarsa' => '2027-03-20',
                'berat'              => 0.08,
            ],
            [
                'nama'               => 'Dispenser Air Otomatis 2L',
                'kategori_id'        => $catWadah->id,
                'deskripsi'          => 'Dispenser air otomatis dengan filter karbon aktif untuk menjaga kebersihan air minum hewan. Kapasitas 2 liter, suara pompa senyap, dan hemat energi.',
                'harga'              => 155000,
                'stok'               => 12,
                'is_favorit'         => true,
                'foto_utama'         => 'https://picsum.photos/seed/prod16/500/500',
                'merek'              => 'FreshPaws',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.8,
            ],
            [
                'nama'               => 'Baju Kucing Model Hoodie M',
                'kategori_id'        => $catPakaian->id,
                'deskripsi'          => 'Baju hoodie keren untuk kucing atau anjing kecil. Bahan katun berkualitas tinggi yang lembut dan hangat. Tersedia dalam warna abu-abu dan kuning.',
                'harga'              => 65000,
                'stok'               => 25,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod17/500/500',
                'merek'              => 'PetTrend',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.07,
            ],
            [
                'nama'               => 'Mangkuk Makan Anti Semut Double',
                'kategori_id'        => $catWadah->id,
                'deskripsi'          => 'Sepasang mangkuk makan stainless steel dengan wadah plastik anti semut di bagian bawah. Mudah dibersihkan dan menjaga makanan tetap higienis.',
                'harga'              => 45000,
                'stok'               => 30,
                'is_favorit'         => false,
                'foto_utama'         => 'https://picsum.photos/seed/prod18/500/500',
                'merek'              => 'CleanEats',
                'tanggal_kadaluarsa' => null,
                'berat'              => 0.2,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
