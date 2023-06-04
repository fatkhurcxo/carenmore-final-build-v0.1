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
        Schema::create('k_t_p_s', function (Blueprint $table) {
            $table->id();
            /* Reference id column on providers table */
            $table->foreignId('provider_id')->constrained();
            $table->string('pathKTP', 100);
            $table->string('fileNameKTP', 100);
            $table->string('pathSelfie', 100);
            $table->string('fileNameSelfie', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_t_p_s');
    }
};
