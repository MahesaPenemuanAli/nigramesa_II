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
        Schema::create('tanamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->string('kategori');
            $table->string('gambar')->nullable();
            $table->text('deskripsi_singkat');
            $table->longText('cara_perawatan');
            $table->string('kebutuhan_air')->nullable();
            $table->string('kebutuhan_cahaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanamans');
    }
};
