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
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique(); // Nomor surat
            $table->foreignId('kategori_id')->constrained('kategori_surat')->onDelete('cascade'); 
            $table->string('judul'); // Judul surat
            $table->string('file_pdf'); // Nama file PDF yang diupload
            $table->timestamps(); // otomatis ada created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_surat');
    }
};
