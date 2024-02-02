<?php

namespace App\Http\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository {

    public function add(SeriesFormRequest $request): Serie
    {

        $serie = DB::transaction(function() use ($request) {

            $serie = Serie::create($request->all());
            
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                array_push($seasons, [
                    'serie_id' => $serie->id,
                    'number' => $i,
                ]);
            }

            Season::insert($seasons);

            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($j = 1; $j <= $request->episodesQty; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }

            Episode::insert($episodes);

            return $serie;
        });

        return $serie;
    }

}