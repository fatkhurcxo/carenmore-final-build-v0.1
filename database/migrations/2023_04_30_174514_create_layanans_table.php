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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            /* Reference id column on providers table */
            $table->foreignId('provider_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 50);
            $table->enum('kendaraan', ['motor', 'mobil']);
            $table->boolean('tempat')->nullable();
            $table->boolean('air')->nullable();
            $table->enum('jenis', ['Cuci Dirumah', 'Cuci Ditempat']);
            $table->bigInteger('harga', false, true);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
