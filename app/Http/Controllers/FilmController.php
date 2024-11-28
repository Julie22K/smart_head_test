<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\GenreFilm;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();

        return $films;
    }

    public function create()
    {
        $genres = Genre::all();

        return view('films.create', compact(['genres']));
    }

    private $storage_path = 'storage/files/';

    public function store(FilmStoreRequest $request)
    {
        $title = $request->title;
        $genres = $request->genres;
        $file = $request->file('poster');

        $file_name = $file->getClientOriginalName();
        $file_ext = $file->getClientOriginalExtension();
        $file_size = $file->getSize();

        $location = $this->storage_path;

        $file_name = md5($file_name . time()) . "." . $file_ext;
        $file->move($location, $file_name);

        $file_path = public_path($location . $file_name);

        $new_film = Film::create([
            'title' => $title,
            'poster' => $file_name
        ]);

        //FIXME:
        foreach ($genres as $genre) {
            GenreFilm::create([
                'genre_id' => $genre,
                'film_id' => $new_film->id
            ]);
        }

        return redirect("films/" . $new_film->id);
    }

    public function publish($film)
    {
        Film::find($film)->update([
            'published_status'=>!$film->published_status,
        ]);

        return redirect("films/" . $film);
    }

    public function show($film)
    {
        $film = Film::find($film);

        if ($film->poster == null || $film->poster == "") {
            $film->poster = 'coming_soon.png';//?
        }

        return view('films.show', compact('film'));
    }

    public function update(FilmUpdateRequest $request, $film)
    {
        $title = $request->title;
        $poster = $request->poster;
        $genres = $request->genres;

        $film = Film::find($film)->update([
            'title'=>$title,
            'poster'=>$poster
        ]);

        GenreFilm::where('film_id',$film)->delete();

        foreach ($genres as $genre) {
            GenreFilm::create([
                'genre_id' => $genre,
                'film_id' => $film
            ]);
        }

        return redirect("films/" . $film);
    }

    public function destroy($film)
    {
        Film::destroy($film);

        return redirect('/films');
    }
}
