<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class ApiFilmController extends Controller
{
    public function index()
    {
        $films=Film::paginate(10);

        return response()->json($films);
    }

    public function show($id)
    {
        $film=Film::find($id);

        return response()->json($film);
    }
}
