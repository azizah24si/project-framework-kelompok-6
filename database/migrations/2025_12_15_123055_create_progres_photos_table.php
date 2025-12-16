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
        Schema::create('progres_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('progres_id');
            $table->string('file_path');
            $table->string('original_name');
            $table->string('mime_type')->nullable();
            $table->integer('file_size')->nullable();
            $table->timestamps();

            $table->foreign('progres_id')->references('progres_id')->on('progres_proyek')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_photos');
    }
};
