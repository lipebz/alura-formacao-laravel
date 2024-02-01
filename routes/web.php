<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/series');

Route::controller(SeriesController::class)->group(function () {

    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/cadastro', 'create')->name('series.create');
    Route::post('/series', 'store')->name('series.store');
    Route::delete('/series/{id}', 'destroy')->name('series.destroy');

});

