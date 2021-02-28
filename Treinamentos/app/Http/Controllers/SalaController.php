<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Sala;
use Illuminate\Http\Request;
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

    public function primeiraEtapaSala()
    {

        $this->segundaEtapaSala();


        return redirect('/pessoas');
    }

    public function segundaEtapaSala()
    {

        $pessoasImpar = Pessoa::query()->where('etapa1', '=', 1)->get();
        $arrayImpar = $pessoasImpar->toArray();

        $metadeCountImpar = floor(count($arrayImpar) / 2);

        $pessoasPar = Pessoa::query()->where('etapa1','=', 2)->get();
        $arrayPar = $pessoasPar->toArray();
        $metadeCountpar = floor(count($arrayPar) / 2);



        // Retiramos a metade do Array e passamos para a variavel auxiliar
        // Adicionamos no inicio do Array novo, os elementos contidos no aux1
        $aux1 = [];
        $novo1 = [];
        for ($i = 0; $i < $metadeCountImpar; $i++) {
           // echo "teste" . '<br>';

            $aux1[$i] = array_pop($arrayImpar);
            array_unshift($arrayPar, $aux1[$i]);

        }

        $aux2 = [];
        for ($i = 0; $i < $metadeCountpar; $i++) {
            $aux2[$i] = array_pop($arrayPar);
            array_unshift($arrayImpar, $aux2[$i]);
        }


        //print_r($arrayImpar);
       // print_r($arrayPar);

        sort($arrayImpar);
        sort($arrayPar);

        foreach ($arrayImpar as $idPessoa) {
            $p = Pessoa::query()->where('id', '=', $idPessoa)->get();

            if (in_array($p[0]->id, $idPessoa)) {
                $p[0]->etapa2 = 1;
                $p[0]->save();
            }
        }

        foreach ($arrayPar as $idPessoa) {
            $p = Pessoa::query()->where('id', '=', $idPessoa)->get();

            if (in_array($p[0]->id, $idPessoa)) {
                $p[0]->etapa2 = 2;
                $p[0]->save();
            }
        }






        #// Transformamos o Array em String para Salvar no DB ***** Refatorar
        #$segundaEtapa1 = implode(',', $array1);
        #$segundaEtapa2 = implode(',', $array2);


        #$sala01[0]['etapa2'] = $segundaEtapa1;
        #$sala02[0]->etapa2 = $segundaEtapa2;

        #$sala01[0]->save();
        #$sala02[0]->save();

    }
}
