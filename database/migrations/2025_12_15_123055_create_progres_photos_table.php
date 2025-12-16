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
        if (!Schema::hasTable('progres_photos')) {
            Schema::create('progres_photos', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('progres_id');
                $table->string('file_path');
                $table->string('original_name');
                $table->string('mime_type')->nullable();
                $table->integer('file_size')->nullable();
                $table->timestamps();

                // Foreign key constraint akan ditambahkan setelah tabel progres_proyek dibuat
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_photos');
    }
};
