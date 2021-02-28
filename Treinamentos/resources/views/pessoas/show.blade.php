@extends('layout')

@section('titulo')
  Ola  {{$pessoa[0]->nome}}
@endsection

@section('conteudo')

    <ul class="list-group w-25">
        <li class="list-group-item">  Primeira Etapa Sala:  {{$salaEtapa1[0]->nome}} </li>
        <li class="list-group-item"> Segunda Etapa Sala:  {{$salaEtapa2[0]->nome}} </li>
        <li class="list-group-item"> Intervalo Café Sala:  {{$salaCafe[0]->nome}} </li>
    </ul>



@endsection
