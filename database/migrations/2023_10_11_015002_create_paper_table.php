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
        Schema::create('tm_paper', function (Blueprint $table) {
            $table->id('id_paper');
            $table->string('nama_paper', 100);
            $table->foreignId('id_jenis_paper')->constrained()->references('id_jenis_paper')->on('tm_jenis_paper')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_data')->constrained()->references('id_data')->on('ts_data')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_paper');
    }
};
