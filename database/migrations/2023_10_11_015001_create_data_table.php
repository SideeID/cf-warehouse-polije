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
        Schema::create('ts_data', function (Blueprint $table) {
            $table->id('id_data');
            $table->string('nama_data', 100);
            $table->text('deskripsi_data');
            $table->string('file_data', 255);
            $table->integer('download_count');
            $table->foreignId('id_user')->constrained()->references('id_user')->on('tm_user')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ts_data');
    }
};
