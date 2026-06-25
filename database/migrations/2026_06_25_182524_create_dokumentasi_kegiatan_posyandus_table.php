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
        Schema::create('dokumentasi_kegiatan_posyandus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kegiatan_posyandu')->nullable();
            $table->foreign('id_kegiatan_posyandu')->references('id')->on('kegiatan_posyandus')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_kegiatan_posyandus');
    }
};
