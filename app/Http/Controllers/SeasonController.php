<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(Serie $serie)
    {
        return view('pages.series.seasons.index', compact('serie'));
    }
}
