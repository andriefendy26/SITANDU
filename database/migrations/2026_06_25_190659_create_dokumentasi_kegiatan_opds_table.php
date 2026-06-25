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
        Schema::create('dokumentasi_kegiatan_opd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kegiatan_opd')->nullable();
            $table->foreign('id_kegiatan_opd')->references('id')->on('kegiatan_opd')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_kegiatan_opds');
    }
};
