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
        if (!Schema::hasTable('kontraktor')) {
            Schema::create('kontraktor', function (Blueprint $table) {
                $table->increments('kontraktor_id');
                $table->unsignedInteger('proyek_id');
                $table->string('nama', 150);
                $table->string('penanggung_jawab', 150)->nullable();
                $table->string('kontak', 150)->nullable();
                $table->text('alamat')->nullable();
                $table->timestamps();

                $table->foreign('proyek_id')
                    ->references('proyek_id')
                    ->on('proyek')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraktor');
    }
};


