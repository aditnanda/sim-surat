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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('surat_dari')->nullable();
            $table->string('diterima_tgl')->nullable();
            $table->string('tgl_surat')->nullable();
            $table->string('no_agenda')->nullable(); // no urut (auto)
            $table->string('no_surat')->nullable(); //no berkas
            $table->string('diteruskan_kepada')->nullable();
            $table->string('perihal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
