<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alamat>
 */
class AlamatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jalan' => fake()->word(),
            'rtrw' => fake()->randomNumber(5, true),
            'desa' => fake()->word(),
            'kecamatan' => fake()->word(),
            'kabupaten' => fake()->word(),
            'provinsi' => fake()->word(),
            'kodepos' => fake()->randomNumber(5, true)
        ];
    }
}
