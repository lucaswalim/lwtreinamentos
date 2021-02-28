@extends('layout')

@section('titulo')
    Cadastrar Sala de Café
@endsection

@section('conteudo')

    @if(!empty($mensagemLimite))
        <div class="alert alert-danger w-50">
            {{ $mensagemLimite }}
        </div>
    @endif

    @if(!empty($mensagemCampo))
        <div class="alert alert-danger w-50">
            {{ $mensagemCampo }}
        </div>
    @endif



    <form action="/cafe/criar" method="post">
        @csrf
        <label for="nome"> Sala de Café: </label>
        <input type="text" name="nome" id="nome" required class="form-control-sm align-bottom">

        <input type="submit" value="Salvar" class="btn-sm btn-primary mt-2">
    </form>
@endsection
