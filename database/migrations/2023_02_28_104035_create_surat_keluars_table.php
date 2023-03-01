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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('surat_kepada')->nullable();
            $table->string('keluar_tgl')->nullable();
            $table->string('alamat_penerima')->nullable();
            $table->string('no_agenda')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('dari_bidang')->nullable();
            $table->string('perihal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
