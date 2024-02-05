<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
use App\Models\Episode;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/series');

Route::controller(SeriesController::class)->group(function () {

    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/cadastro', 'create')->name('series.create');
    Route::get('/series/{serie}', 'edit')->name('series.edit');


    Route::post('/series', 'store')->name('series.store');
    Route::delete('/series/{serie}', 'destroy')->name('series.destroy');
    Route::put('/series/{serie}', 'update')->name('series.update');

});

Route::get('/series/{serie}/seasons', [SeasonController::class, 'index'])->name('seasons.index');

Route::get('/series/{serie}/seasons/{season}', [EpisodeController::class, 'index'])->name('episodes.index');
Route::post('/series/{serie}/seasons/{season}', [EpisodeController::class, 'watch'])->name('episodes.watch');
