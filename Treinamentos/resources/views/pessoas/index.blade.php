@extends('layout')

@section('titulo')
    Lista de Alunos
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-danger w-50">
            {{ $mensagem }}
        </div>
    @endif

    <div class="justify-content-end d-flex">

    </div>
    <ul class="list-group mt-3 w-75">
        @foreach($pessoas as $pessoa)
            <li class="list-group-item align-items-center">
                <a href="/pessoas/{{$pessoa->id}}" class="text-decoration-none"> {{ $pessoa->nome }} </a>
            </li>
        @endforeach
    </ul>
@endsection
