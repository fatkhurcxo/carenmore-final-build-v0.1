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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            /* Reference id column on users table */
            $table->foreignId('user_id')->constrained();
            /* Reference id column on alamats table */
            $table->foreignId('alamat_id')->constrained();
            $table->string('provider', 50);
            $table->string('pemilik', 64);
            $table->string('kontak', 15);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
