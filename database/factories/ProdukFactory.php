<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coba>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'namaproduk' => fake()->name(),
            'harga' => fake()->randomDigit,
            'deskripsi' => fake()->paragraph(mt_rand(1,2)),
            'fotoproduk' => fake()->name(),
            'id_kategori' => 1
        ];
    }
}
