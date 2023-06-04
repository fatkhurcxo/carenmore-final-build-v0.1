<?php

namespace Database\Factories;

use App\Models\Alamat;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'alamat_id' => Alamat::factory(),
            'provider' => fake()->word(),
            'pemilik' => fake()->word(),
            'kontak' => fake()->randomNumber(),
            'status' => 'nonaktif',
            'deskripsi' => fake()->sentence()
        ];
    }
}
