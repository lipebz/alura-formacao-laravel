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

        return view('pages.series.index', compact('series'));
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

        $insert = Serie::create($data);

        if (!$insert)
            return 'erro';

        return redirect()->route('series.index');
    }
}
