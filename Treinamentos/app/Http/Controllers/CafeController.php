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

        return view('cafe.show', compact('pessoas'));
    }

}
