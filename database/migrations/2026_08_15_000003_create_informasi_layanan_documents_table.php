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
        Schema::create('informasi_layanan_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_informasi_layanan')->constrained('informasi_layanan')->cascadeOnDelete();
            $table->string('file_path');
            $table->string('document_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_layanan_documents');
    }
};
