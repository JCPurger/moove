@extends('layout.main')
@section('title','Detalhes do lugar')

@section('content')

    <img src="{{ @$place->imagem }}" alt="imagem do paranuê">
    
    <h1>{{ $place->nome }}</h1>

    <div>{{ $place->descricao }}</div>

@endsection
