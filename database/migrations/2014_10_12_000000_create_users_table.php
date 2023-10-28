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
        Schema::create('tm_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('email')->unique();
            $table->foreignId('id_level')->constrained()->references('id_level')->on('tm_level')->onUpdate('cascade')->onDelete('cascade')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_user');
    }
};
