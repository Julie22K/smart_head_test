<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Film;
use App\Models\Genre;
use App\Models\GenreFilm;
use Database\Factories\FilmFactory;
use Database\Factories\GenreFactory;
use Database\Factories\GenreFilmFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Film::factory(15)->create();
        Genre::factory(15)->create();
        GenreFilm::factory(30)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
