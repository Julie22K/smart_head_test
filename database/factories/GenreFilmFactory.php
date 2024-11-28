<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Genre;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GenreFilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genre_id' =>fake()->numberBetween(1, 15), //Genre::factory(),
            'film_id' => fake()->numberBetween(1, 15)//Film::factory(),
        ];
    }
}
