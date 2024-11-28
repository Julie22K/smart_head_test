<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/films',[FilmController::class,'index'])->name('films.index');
Route::get('/films/create',[FilmController::class,'create'])->name('films.create');
Route::get('/films/publish/{film}',[FilmController::class,'publish'])->name('films.publish');//?
Route::post('/films',[FilmController::class,'store'])->name('films.store');
Route::get('/films/{film}',[FilmController::class,'show'])->name('films.show');
Route::get('/films/{film}/edit',[FilmController::class,'edit'])->name('films.edit');
Route::put('/films/{film}',[FilmController::class,'update'])->name('films.update');
Route::delete('/films/{film}',[FilmController::class,'destroy'])->name('films.destroy');


Route::get('/genres',[GenreController::class,'index'])->name('genres.index');
Route::get('/genres/create',[GenreController::class,'create'])->name('genres.create');
Route::post('/genres',[GenreController::class,'store'])->name('genres.store');
Route::get('/genres/{genre}',[GenreController::class,'show'])->name('genres.show');
Route::get('/genres/{genre}/edit',[GenreController::class,'edit'])->name('genres.edit');
Route::put('/genres/{genre}',[GenreController::class,'update'])->name('genres.update');
Route::delete('/genres/{genre}',[GenreController::class,'destroy'])->name('genres.destroy');
