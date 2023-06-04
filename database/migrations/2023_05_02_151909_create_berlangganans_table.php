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
        Schema::create('berlangganans', function (Blueprint $table) {
            $table->id();
            /* Reference id column on layanans table */
            $table->foreignId('layanan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            /* Reference id column on provider table */
            $table->foreignId('provider_id')->constrained();
            /* Nama paket langganan */
            $table->string('nama', 50);
            $table->integer('jumlah');
            $table->boolean('auto');
            $table->integer('deepfree');
            $table->integer('voucher');
            $table->bigInteger('harga');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berlangganans');
    }
};
