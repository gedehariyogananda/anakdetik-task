<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Campain;
use App\Models\Category;
use App\Models\HistoryCampain;
use App\Models\ReqCamp;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // user seeder role admin 
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'admin',
        ]);

        // sedder category 
        $categoryBuku = ['Novel', 'Komik', 'Ensiklopedia', 'Biografi', 'Fiksi', 'Non-Fiksi', 'Pendidikan', 'Sejarah', 'Agama', 'Teknologi', 'Kesehatan', 'Olahraga', 'Bisnis', 'Politik', 'Hukum', 'Kesehatan', 'Kuliner', 'Pariwisata', 'Seni', 'Musik', 'Film', 'Pertanian', 'Perikanan', 'Peternakan', 'Kehutanan', 'Pertambangan', 'Perindustrian', 'Perdagangan', 'Pariwisata', 'Transportasi', 'Komunikasi', 'Pendidikan', 'Kesehatan', 'Kesejahteraan Sosial', 'Kebudaya'];
        foreach ($categoryBuku as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        // sedder books
        Book::factory(20)->create();
    }
}
