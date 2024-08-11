<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 30),
            'judul_buku' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'jumlah_buku' => rand(1, 50),
            'file_buku' => 'file_buku/buku1.pdf',
            'cover_buku' => 'cover_buku/ganteng.jpg',
        ];
    }
}
