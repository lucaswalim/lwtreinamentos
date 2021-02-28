<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Pessoa;
use App\Models\Sala;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;
use function PHPUnit\Framework\isNull;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::query()->orderBy('nome')->get();

        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(Request $request)
    {

       $salas = Sala::all();
       $cafe = Cafe::all();

       // Condições que verificam se as as salas de AULA e CAFÉ foram criadas primeiro
       // Fazendo com o que o fluxo da aplicação seja seguido
       if (count($salas) < 2) {
           $request->session()->flash('mensagem','Número de Salas de Aula e Café deve totalizar 2 para poder prosseguir');
           $mensagem = $request->session()->get('mensagem');

            return view('pessoas.create', compact('mensagem'));
       }

       if (count($cafe) < 0) {
           $request->session()->flash('mensagem','Número de Salas de Aula e Café deve totalizar 2 para poder prosseguir');
           $mensagem = $request->session()->get('mensagem');

           return view('pessoas.create', compact('mensagem'));
       }


       $sala1 = $salas[0]['lotacao'];
       $sala2 = $salas[1]['lotacao'];
       $lotacaoTotal = $sala1 + $sala2;


       if ($numeroPessoas = Pessoa::all()->count() == $lotacaoTotal) {
           $request->session()->flash('mensagem','Limite de Alunos Atingido.');
           $mensagem = $request->session()->get('mensagem');

           return view('pessoas.create', compact('mensagem'));
       }

       if (empty($request->nome)) {
           $request->session()->flash('mensagem','Os campos devem ser preenchidos');
           $mensagem = $request->session()->get('mensagem');

           return view('pessoas.create', compact('mensagem'));
       }

       $nome = $request->nome;

       $pessoa = new Pessoa();
       $pessoa->nome = $nome;
       $pessoa->save();

       $this->primeiraEtapa($pessoa);

       return redirect('/pessoas');
    }

    public function show(int $id, Request $request)
    {
        $pessoas = Pessoa::all();
        $pessoa = Pessoa::query()->where('id', '=', $id)->get();

        $salas = Sala::all();
        $salaEtapa1 = Sala::query()->where('id', '=', $pessoa[0]['etapa1'])->get();
        $salaEtapa2 = Sala::query()->where('id', '=', $pessoa[0]['etapa2'])->get();

        $salaCafe = Cafe::query()->where('id', '=', $pessoa[0]['cafe'])->get();

        if (count($salaCafe) === 0){
            $request->session()->flash('mensagem','Número de Salas de Café deve totalizar 2 para poder prosseguir');
            $mensagem = $request->session()->get('mensagem');
            return view('pessoas.index', compact('mensagem', 'pessoas'));
        }

        if (count($salas) < 2) {
            $request->session()->flash('mensagem','Número de Salas de Aula deve totalizar 2 para poder prosseguir');
            $mensagem = $request->session()->get('mensagem');
            return view('pessoas.index', compact('mensagem', 'pessoas'));
        }

        if ($pessoa[0]->etapa2 == null){
            $request->session()->flash('mensagem','Ops, você esqueceu de Separar as Etapas');
            $mensagem = $request->session()->get('mensagem');
            return view('pessoas.index', compact('mensagem', 'pessoas'));
        }



        return view('pessoas.show', compact('pessoa', 'salaEtapa1', 'salaEtapa2', 'salaCafe'));
    }

    public function primeiraEtapa($pessoa)
    {
        // Separamos a primeira etapa da seguinte forma:
        // Se o ID da pessoas for impar , recebe a sala com numero impar
        // Se o ID da pessoa for par, recebe a segunda sala que sera par

        if ($pessoa->id % 2 === 0) {
            $pessoa->etapa1 = 2;
            $pessoa->cafe = 2;
        }

        if ($pessoa->id % 2 === 1) {
            $pessoa->etapa1 = 1;
            $pessoa->cafe = 1;
        }

        $pessoa->save();
    }
}
