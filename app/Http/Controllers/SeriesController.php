<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();

        $message = session('message');

        return view('pages.series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('pages.series.create');
    }

    public function edit(Serie $serie)
    {

        return view('pages.series.edit')->with('serie', $serie);
    }

    public function store(SeriesFormRequest $request)
    {

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

        return to_route('series.index')->with('message', [
            'type' => 'success',
            'text' => "Série {$serie->nome} criada com sucesso"
        ]);
    }

    public function update(Serie $serie, SeriesFormRequest $request)
    {

        $serie->nome = $request->nome;

        $serie->save();

        return to_route('series.index')->with('message', [
            'type' => 'primary',
            'text' => "Série {$serie->nome} editada com sucesso"
        ]);
    }

    public function destroy(Serie $serie)
    {

        $serie->delete();

        return to_route('series.index')->with('message', [
            'type' => 'danger',
            'text' => "Série {$serie->nome} deletada com sucesso"
        ]);

    }
}
