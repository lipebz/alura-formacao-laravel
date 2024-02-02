<?php

namespace App\Providers;

use App\Http\Repositories\EloquentSeriesRepository;
use App\Http\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{

    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];

}
