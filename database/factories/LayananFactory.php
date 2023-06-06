<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider_id' => Provider::factory(),
            'nama' => fake()->word(),
            'kendaraan' => 'motor',
            'tempat' => 1,
            'air' => 1,
            'jenis' => 'Cuci Dirumah',
            'harga' => mt_rand(10000, 30000),
            'deskripsi' => fake()->sentence()
        ];
    }
}
