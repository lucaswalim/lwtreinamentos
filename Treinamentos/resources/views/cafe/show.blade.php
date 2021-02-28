@extends('layout')

@section('titulo')
    Salas de Coffee Break
@endsection

@section('conteudo')

        <ul class="list-group">
            @foreach($pessoas as $pessoa)
                <li class="list-group-item">
                     {{$pessoa->nome}}
                </li>
            @endforeach

        </ul>

@endsection
