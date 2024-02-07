<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;

use App\Http\Middleware\Autenticador;

use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'signIn'])->name('login.signIn');
Route::get('/registrar', [LoginController::class, 'register'])->name('login.register');
Route::post('/registrar', [LoginController::class, 'signUp'])->name('login.signUp');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::redirect('/', '/series');

Route::middleware('autenticador')->group(function() {
    

    Route::controller(SeriesController::class)->group(function () {

        Route::get('/series', 'index')->name('series.index');
        Route::get('/series/cadastro', 'create')->name('series.create');
        Route::get('/series/{serie}', 'edit')->name('series.edit');


        Route::post('/series', 'store')->name('series.store');
        Route::delete('/series/{serie}', 'destroy')->name('series.destroy');
        Route::put('/series/{serie}', 'update')->name('series.update');

    });

    Route::get('/series/{serie}/seasons', [SeasonController::class, 'index'])
        ->name('seasons.index');

    Route::get('/series/{serie}/seasons/{season}', [EpisodeController::class, 'index'])->name('episodes.index');
    Route::post('/series/{serie}/seasons/{season}', [EpisodeController::class, 'watch'])->name('episodes.watch');


});
