<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryBuku = ['Novel', 'Komik', 'Ensiklopedia', 'Biografi', 'Fiksi', 'Non-Fiksi', 'Pendidikan', 'Sejarah', 'Agama', 'Teknologi', 'Kesehatan', 'Olahraga', 'Bisnis', 'Politik', 'Hukum', 'Kesehatan', 'Kuliner', 'Pariwisata', 'Seni', 'Musik', 'Film', 'Pertanian', 'Perikanan', 'Peternakan', 'Kehutanan', 'Pertambangan', 'Perindustrian', 'Perdagangan', 'Pariwisata', 'Transportasi', 'Komunikasi', 'Pendidikan', 'Kesehatan', 'Kesejahteraan Sosial', 'Kebudaya'];
        return [
            'name' => $categoryBuku[rand(0, count($categoryBuku) - 1)],
        ];
    }
}
