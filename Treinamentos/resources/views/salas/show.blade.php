@extends('layout')

@section('titulo')
{{$sala[0]->nome}}
@endsection

@section('conteudo')
    <div class="row justify-content-evenly">
        <div class="col-4">
            <h4>1ª Etapa</h4>
            <ul class="list-group">

                @foreach($etapa1 as $pessoa)
                    <li class="list-group-item align-items-center">
                        ID:{{$pessoa->id}}    {{$pessoa->nome}}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-4">
            <h4>2ª Etapa</h4>
            <ul class="list-group">

                @foreach($etapa2 as $pessoa)
                    <li class="list-group-item align-items-center">
                        ID:{{$pessoa->id}}    {{$pessoa->nome}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>











@endsection
