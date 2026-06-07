<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_anggota')->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->string('email')->nullable();
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Cerai', 'Janda', 'Duda'])->default('Belum Menikah');
            $table->enum('status_keanggotaan', ['Aktif', 'Tidak Aktif', 'Pindah', 'Meninggal'])->default('Aktif');
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};