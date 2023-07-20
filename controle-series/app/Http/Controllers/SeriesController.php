<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\{Episode, Series, Season};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $testeController = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with(["teste"=> $testeController, "mensagemSucesso" => $mensagemSucesso]);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) {
        $serie = Series::create($request->all());
        $seasons = [];
        for($i = 1; $i <= $request->seasonQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach($serie->seasons as $season) {
            for ($j=1; $j <= $request->episodeQty; $j++) { 
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        return to_route('series.index')->with('mensagem.sucesso',"Série {$serie->nome} adicionada com sucesso!");
    }

    public function destroy(Series $series, Request $request) {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso',"Série '{$series->nome}' removida com sucesso!");
    }

    public function edit(Series $series) {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request) {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso',"Série '{$series->nome}' atualizada com sucesso!");
    }
}
