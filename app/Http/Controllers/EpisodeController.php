<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Serie $serie, Season $season)
    {
        return view('pages.episodes.index', ['episodes' => $season->episodes]);
    }

    public function watch(Serie $serie, Season $season, Request $request)
    {
        
        $watchedEpisodes = $request->episodes;

        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
            $episode->watched = in_array($episode->id, $watchedEpisodes);
        });

        $season->push();

        return to_route('episodes.index', [
            'serie' => $serie->id,
            'season' => $season->id,
        ])->with('message', [
            'type' => 'success',
            'text' => "Episódios atualizados"
        ]);

    }
}
