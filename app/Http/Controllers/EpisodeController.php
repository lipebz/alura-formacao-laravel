<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Serie $serie, Season $season)
    {
        return view('pages.episodes.index', ['episodes' => $season->episodes]);
    }

    public function watch(Request $request)
    {
        dd($request->all());
    }
}
