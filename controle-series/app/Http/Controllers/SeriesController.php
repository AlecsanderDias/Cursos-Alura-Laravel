<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $testeController = 'Testando o Laravel e o Blade, simples assim!';
        return view('series.index')->with("teste", $testeController);
    }
    public function create() {
        return view('series.create');
    }
}
