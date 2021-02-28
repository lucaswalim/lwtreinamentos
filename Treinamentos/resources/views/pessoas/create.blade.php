@extends('layout')

@section('titulo')
    Cadastrar Pessoas
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-danger w-50">
            {{ $mensagem }}
        </div>
    @endif

    <form action="/pessoas/criar" method="post">
        @csrf
        <div class="row">
            <div class="col col-6">
                <label for="nome"> Nome: </label>
                <input type="text" id="nome" name="nome" required placeholder="Joao da Silva" class="form-control">
                <input type="submit" value="Salvar" required class="mt-2 mb-2 float btn btn-primary">
            </div>
        </div>
    </form>



@endsection
