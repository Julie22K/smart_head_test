<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'genre_id',
    ];

    protected $table = 'film_genre';
}
