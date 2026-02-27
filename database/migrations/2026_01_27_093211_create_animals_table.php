<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
           $table->ulid('id')->primary(); // ULID sebagai PK
            $table->string('nama'); // Nama hewan
            $table->integer('umur')->nullable(); // Umur hewan
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();      // FK ke categories
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2)->default(0);
            $table->integer('stok')->default(0);
            $table->boolean('isFavorite')->default(false);
            $table->string('photo')->nullable(); // Nama file/folder foto
            $table->enum('jenis_kelamin', ['jantan', 'betina'])->nullable();
            $table->boolean('sudah_steril')->default(false);
            $table->enum('asal_hewan', [
                'lokal',
                'impor',
                'hasil_breeding',
                'rescue',
                'titipan'
            ])->nullable();
            $table->decimal('berat', 5, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
