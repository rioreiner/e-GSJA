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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');                  // Judul kegiatan/foto
            $table->string('kategori', 100)->nullable(); // Kategori foto (Ibadah, Pemuda, dll)
            $table->string('foto');                   // Nama file foto yang diupload
            $table->text('deskripsi')->nullable();    // Deskripsi singkat dokumentasi
            $table->boolean('is_utama')->default(false); // Status foto utama di beranda
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};