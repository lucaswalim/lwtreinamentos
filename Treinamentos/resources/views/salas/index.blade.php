@extends('layout')

@section('titulo')
    Salas de Aula
@endsection

@section('conteudo')

    <ul class="list-group mt-3 w-75 ">
        @foreach($salas as $sala)
            <li  class="list-group-item d-flex justify-content-between">
               <a href="/salas/{{$sala->id}}" class="text-decoration-none"> Sala:  {{ $sala->nome  }} </a>
               <span class=""> Lotação: {{ $sala->lotacao }} </span>
            </li>
        @endforeach
    </ul>

@endsection
