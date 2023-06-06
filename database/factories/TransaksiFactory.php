<?php

namespace Database\Factories;

use App\Models\Layanan;
use App\Models\Provider;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'layanan_id' => Layanan::factory(),
            'provider_id' => Provider::factory(),
            'customer_id' => Customer::factory(),
            'berlangganan' => 1,
            'reference' => fake()->word() . mt_rand(10000, 99999),
            'pembayaran' => 'paid',
            'status' => 'proses',
            'nominal' => mt_rand(15000, 100000)
        ];
    }
}
