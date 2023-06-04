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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            /* Reference id column on users table */
            $table->foreignId('user_id')->constrained();
            $table->string('avatar', 150)->nullable();
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->enum('access', ['master', 'regular']);
            /* Reference id column on alamats table */
            $table->foreignId('alamat_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
