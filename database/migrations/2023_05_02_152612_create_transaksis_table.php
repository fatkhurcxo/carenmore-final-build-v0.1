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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            /* Reference id on table layanan */
            $table->foreignId('layanan_id')->constrained();
            /* Reference id on table provider */
            $table->foreignId('provider_id')->constrained();
            /* Reference id on table customers */
            $table->foreignId('customer_id')->constrained();
            $table->boolean('berlangganan');
            $table->string('reference', 25);
            $table->enum('pembayaran', ['paid', 'unpaid', 'expired']);
            $table->enum('status', ['selesai', 'dibatalkan', 'proses']);
            $table->bigInteger('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
