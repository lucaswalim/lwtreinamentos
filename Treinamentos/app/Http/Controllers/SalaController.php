<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Sala;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;
use Ramsey\Collection\Collection;
use function Sodium\compare;


class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();

        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
    }

    public function store(Request $request)
    {
        $salas = Sala::all();
        $qtdSalas = count($salas);

        if ($qtdSalas >= 2)  {
            $request->session()->flash('mensagemLimite','Limite de Salas Atingido.');
            $mensagemLimite = $request->session()->get('mensagemLimite');

            return view('salas.create', compact('mensagemLimite'));
        }

        if ($request->lotacao <= 0) {
            $request->session()->flash('mensagemCampo','Lotação deve ser maior que 0');
            $mensagemCampo = $request->session()->get('mensagemCampo');

            return view('salas.create', compact('mensagemCampo'));
        }

        if (empty($request->nome) || empty($request->lotacao)) {
            $request->session()->flash('mensagemCampo','Os campos devem ser preenchidos');
            $mensagemCampo = $request->session()->get('mensagemCampo');

            return view('salas.create', compact('mensagemCampo'));
        }

        $nome = $request->nome;
        $lotacao = $request->lotacao;

        $sala = new Sala();
        $sala->nome = $nome;
        $sala->lotacao = $lotacao;
        $sala->save();

        $request->session()->flash('mensagem','Sala criada com sucesso!');
        $mensagem = $request->session()->get('mensagem');

        return view('salas.create', compact('mensagem'));


    }

    public function show(int $id)
    {
        $sala = Sala::query()->where('id', '=', $id)->get();

        $etapa1 = Pessoa::query()->where('etapa1', '=', $id)->get();
        $etapa2 = Pessoa::query()->where('etapa2', '=', $id)->get();

        return view('salas.show', compact('etapa1', 'etapa2', 'sala'));
    }

    public function segundaEtapaSala()
    {

        // Buscamos os alunos que possuem id Impar e etapa1 = 1 e criamos um array de Impares
        // O mesmo criamos com alunos de id Par e etapa1 = 2 e criamos um array de Peres

        $pessoasImpar = Pessoa::query()->where('etapa1', '=', 1)->get();
        $arrayImpar = $pessoasImpar->toArray();
        $metadeCountImpar = floor(count($arrayImpar) / 2);

        $pessoasPar = Pessoa::query()->where('etapa1','=', 2)->get();
        $arrayPar = $pessoasPar->toArray();
        $metadeCountpar = floor(count($arrayPar) / 2);


        // Retiramos a metade arredondada do Array e passamos para a variavel auxiliar
        // Adicionamos no inicio do Array Par, os elementos contidos no aux1
        $aux1 = [];
        for ($i = 0; $i < $metadeCountImpar; $i++) {
            $aux1[$i] = array_pop($arrayImpar);
            array_unshift($arrayPar, $aux1[$i]);
        }

        $aux2 = [];
        for ($i = 0; $i < $metadeCountpar; $i++) {
            $aux2[$i] = array_pop($arrayPar);
            array_unshift($arrayImpar, $aux2[$i]);
        }

        sort($arrayImpar);
        sort($arrayPar);

        // Os elementos Contidos no ArrayImpar, buscamos a referência do Aluno no banco atraves do ID
        // Setamos a propriedade etapa2 com 1
        foreach ($arrayImpar as $idPessoa) {
            $p = Pessoa::query()->where('id', '=', $idPessoa)->get();

            if (in_array($p[0]->id, $idPessoa)) {
                $p[0]->etapa2 = 1;
                $p[0]->save();
            }
        }

        // Os elementos Contidos no ArrayPar, buscamos a referÊncia do Aluno no banco atraves do ID
        // Setamos a propriedade etapa2 com 2
        foreach ($arrayPar as $idPessoa) {
            $p = Pessoa::query()->where('id', '=', $idPessoa)->get();

            if (in_array($p[0]->id, $idPessoa)) {
                $p[0]->etapa2 = 2;
                $p[0]->save();
            }
        }

        return redirect('/pessoas');

    }
}
