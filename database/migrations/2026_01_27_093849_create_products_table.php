<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary(); // ULID sebagai primary key

            $table->string('nama'); // Nama produk

            $table->foreignId('kategori_id')->constrained('categories')->cascadeOnDelete(); // Relasi ke kategori

            $table->text('deskripsi'); // Deskripsi produk

            $table->decimal('harga', 10, 2)->default(0); // Harga produk

            $table->integer('stok')->default(0); // Jumlah stok tersedia

            $table->boolean('is_favorit')->default(false); // Penanda produk favorit

            $table->string('foto_utama'); // Foto utama produk

            // 🔥 Field Tambahan
            $table->string('merek')->nullable(); // Merek produk

            $table->date('tanggal_kadaluarsa')->nullable(); // Tanggal kadaluarsa (untuk makanan/vitamin)

            $table->decimal('berat', 6, 2)->nullable(); // Berat produk (misalnya dalam gram atau kg)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
