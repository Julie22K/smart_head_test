<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiGenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return response()->json($genres);
    }

    public function show($id)
    {
        $films = DB::table('films')
            ->join('film_genre', 'films.id', '=', 'film_genre.film_id')
            ->where('film_genre.genre_id',$id)
            ->paginate(10);

        return response()->json($films);
        // жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы

    }
}
