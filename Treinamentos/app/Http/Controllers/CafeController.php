<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        $cafes = Cafe::all();

        return view('cafe.index', compact('cafes'));
    }

    public function create()
    {
        return view('cafe.create');
    }

    public function store(Request $request)
    {   // Pegamos o valor do formulário nome, instânciamos a Classe e Persistimos no Banco.

        $salas = Cafe::all();
        $qtdSalas = count($salas);

        if ($qtdSalas >= 2) {
            $request->session()->flash('mensagemLimite','Limite de Salas Café Atingido.');
            $mensagemLimite = $request->session()->get('mensagemLimite');

            return view('cafe.create', compact('mensagemLimite'));
        }

        if (empty($request->nome)) {
            $request->session()->flash('mensagemCampo','Os campos devem ser preenchidos');
            $mensagemCampo = $request->session()->get('mensagemCampo');

            return view('cafe.create', compact('mensagemCampo'));
        }

        $nome = $request->nome;
        $cafe = new Cafe();
        $cafe->nome = $nome;
        $cafe->save();

        return redirect('/pessoas');

    }

    public function show(int $id)
    {
        $pessoas = Pessoa::query()->where('cafe', '=', $id)->get();

       #$pessoas = $salacafe[0]['pessoas'];

       #$listaPessoas = explode(',', $pessoas);

       #$arrayId = [];

       #foreach ($listaPessoas as $pessoa) {
       #    $teste = Pessoa::query()->where('id', '=', $pessoa)->get();
       #    array_push($arrayId, $teste);

       #}



        return view('cafe.show', compact('pessoas'));
    }

    public function separar()
    {
        $pessoas = Pessoa::all();

        $cafes = Cafe::all();
        $cafe1 = $cafes[0];
        $cafe2 = $cafes[1];


        $idImpares = '';
        $idPares = '';

        foreach ($pessoas as $pessoa) {
            if ($pessoa->id % 2 === 1) {
                $idImpares .= $pessoa->id . ',' ;
            }

            if ($pessoa->id % 2 === 0) {
                $idPares .= $pessoa->id . ',' ;
            }
        }

        $cafe1['pessoas'] = substr($idImpares, 0, -1);
        $cafe2['pessoas'] = substr($idPares,0,-1);

        $cafe1->save();
        $cafe2->save();

    }
}
