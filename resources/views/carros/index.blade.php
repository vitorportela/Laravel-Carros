@extends('layout')

@section('cabecalho')
Carros
@endsection

@section('conteudo')
@if(!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
@endif
<button href="{{route('form_criar_carro')}}" class="btn btn-dark mb-2">Buscar</button>

<ul class="list-group">
    @foreach($carros as $carro)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $carro->nome }}
        <form method="post" action="/carros/remover/{{$carro->id}}"
            onsubmit="return confirm('Deseja remover {{addslashes($carro->nome)}}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 4px;">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                </svg> </button>
        </form>
    </li>
    @endforeach
</ul>
<a href="{{route('form_criar_carro')}}" class="btn btn-dark mb-2">Adicionar</a>
@endsection
