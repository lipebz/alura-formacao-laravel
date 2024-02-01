<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::orderBy('nome')->get();

        $message = session('message');

        return view('pages.series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('pages.series.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' =>'required|string|max:128'
        ]);

        $serie = Serie::create($data);

        if (!$serie)
            return 'erro';

        return to_route('series.index')->with('message', [
            'type' => 'success',
            'text' => "Série {$serie->nome} criada com sucesso"
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
