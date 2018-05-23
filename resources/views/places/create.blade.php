@extends('layout.main')
@section('title','Detalhes do lugar')

@section('content')
    <form action="{{ route('places.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome">
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
        </div>
        <div class="form-group">
            <label for="imagem">Imagem do lugar</label>
            <input type="file" name="imagem" id="imagem">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="form-group">
            <select name="categoria" id="">
                <option value=""></option>
                <option value="Restaurante">Restaurante</option>
                <option value="Hospital">Hospital</option>
                <option value="Cinema">Cinema</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="form-group">
            <textarea name="descricao" id="" cols="30" rows="10">
            </textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
