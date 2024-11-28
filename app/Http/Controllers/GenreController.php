<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Models\Genre;
use App\Models\GenreFilm;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return $genres;
    }

    public function store(GenreStoreRequest $request)
    {
        $title = $request->title;
        $films = $request->films;

        $new_genre=Genre::create([
            'title' => $title,
        ]);
        foreach ($films as $film) {
            GenreFilm::create([
                'genre_id'=>$new_genre->id,
                'film_id'=>$film
            ]);
        }

        return redirect('genres/' . $new_genre->id);
    }

    public function show($genre)
    {
        $genre = Genre::find($genre);

        return $genre;
    }

    public function update(GenreUpdateRequest $request, $genre)
    {
        $title = $request->title;
        $films = $request->films;

        $genre = Genre::find($genre)->update([
            'title' => $title,
        ]);


        GenreFilm::where('genre_id',$genre)->delete();

        foreach ($films as $film) {
            GenreFilm::create([
                'genre_id' => $genre,
                'film_id' => $film
            ]);
        }

        return redirect('genres/' . $genre->id);
    }

    public function destroy($genre)
    {
        Genre::destroy($genre);

        return redirect('/genres');
    }
}
