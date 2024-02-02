<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function __construct(
        private SeriesRepository $repository
    ) {}

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

        $serie = $this->repository->add($request);

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
