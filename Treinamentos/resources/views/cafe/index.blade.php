@extends('layout')

@section('titulo')
    Salas de Coffee Break
@endsection

@section('conteudo')

        <ul class="list-group w-75">
            @foreach($cafes as $cafe)
                <li class="list-group-item">
                    <a class="text-decoration-none" href="/cafe/{{$cafe->id}}">
                        {{$cafe->nome}}
                    </a>
                </li>
            @endforeach

        </ul>

@endsection
