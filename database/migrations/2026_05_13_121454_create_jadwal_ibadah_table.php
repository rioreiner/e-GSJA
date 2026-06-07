<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_ibadah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->string('pendeta')->nullable();
            $table->string('tema')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadah');
    }
};