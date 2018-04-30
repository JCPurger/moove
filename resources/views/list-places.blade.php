@extends('layout.main')
@section('title','Lista de lugares')

@section('content')

    <a href="{{ route('createPlace') }}" class="btn btn-primary btn-block" role="button">Adicionar</a>

    <div class="list-group">
        @foreach($places as $place)
        <a href="#" class="list-group-item">
            <img class="pull-left" src="{{ asset('img/'.$place->imagem) }}" alt="">
            <div class="container right">
                <h4 class="list-group-item-heading">{{ $place->nome }}</h4>
                <p class="list-group-item-text">{{ $place->descricao }}</p>
            </div>
            <button type="button" class="btn btn-info">editar</button>
            <button type="button" class="btn btn-danger">excluir</button>
        </a>
        @endforeach
    </div>

@endsection
