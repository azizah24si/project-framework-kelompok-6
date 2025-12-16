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
        Schema::create('lokasi_proyek', function (Blueprint $table) {
            $table->increments('lokasi_id');
            $table->unsignedInteger('proyek_id');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->json('geojson')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_proyek');
    }
};


