@extends('layout')

@section('titulo')
    Cadastrar Sala de Evento
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success w-50">
            {{ $mensagem }}
        </div>
    @endif

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

    <form action="/salas/criar" method="post">
        @csrf

        <div class=" row">
            <div class="col col-2">
                <label for="nome"> Sala: </label>
                <input type="text" name="nome" id="nome" required placeholder="A1" class="form-control">
            </div>

            <div class="col col-2">
                <label for="lotacao"> Lotação: </label>
                <input type="number" min="1" class="form-control" required placeholder="15" name="lotacao" id="lotacao">

            </div>

        </div>
            <input type="submit" value="Salvar" class="btn btn-primary mt-2">
    </form>
@endsection
