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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            /* Reference id column on users table */
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            /* Reference id column on alamats table */
            $table->foreignId('alamat_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama', 60);
            $table->bigInteger('coin');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
