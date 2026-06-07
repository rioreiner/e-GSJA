<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_ibadah_id')->constrained('jadwal_ibadah')->cascadeOnDelete();
            $table->string('nama_pelayan');
            $table->enum('jenis_pelayanan', ['Singer', 'Musik', 'Multimedia', 'Usher']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelayanan');
    }
};