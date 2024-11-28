<?php

use App\Http\Controllers\ApiFilmController;
use App\Http\Controllers\ApiGenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/genres',[ApiGenreController::class,'index'])->name('genres.index');
Route::get('/genres/{id}',[ApiGenreController::class,'show'])->name('genres.show');

Route::get('/films',[ApiFilmController::class,'index'])->name('films.index');
Route::get('/films/{id}',[ApiFilmController::class,'show'])->name('films.show');
