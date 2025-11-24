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
        Schema::create('proyek', function (Blueprint $table) {
            $table->increments('proyek_id');
            $table->string('kode_proyek')->unique();
            $table->string('nama_proyek', 100);
            $table->year('tahun')->nullable();
            $table->string('lokasi', 100);
            $table->decimal('anggaran', 15, 2);
            $table->string('sumber_dana', 100);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
