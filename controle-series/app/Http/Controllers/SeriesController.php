<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $testeController = Serie::query()->orderby('nome', 'asc')->get();
        // dd($testeController);

        return view('series.index')->with("teste", $testeController);
    }
    public function create() {
        return view('series.create');
    }
    public function store(Request $request) {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();
        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        return redirect('/series');
    }
}
