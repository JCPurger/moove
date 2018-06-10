@extends('layout.main')
@section('title','Lugar')

@section('content')

    <div class="col-lg-10 well lugar-cadas">
        <form class="form-cadas" action="{{ route('places.store') }}" enctype="multipart/form-data" method="POST" role="form">
            {{ csrf_field() }}
            <div class="col-sm-10">
                <div class="row">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do lugar">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude do lugar">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude do lugar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Foto do Lugar</label>
                            <input type="file" id="foto" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Categoria</label>
                            <div class="input-group-btn">
                                <select class="form-control" name="category_id">
                                    <option>Selecione</option>
                                    <option value="1">Restaurante</option>
                                    <option value="2">Bar</option>
                                    <option value="3">Hospital</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label style="margin-left: 2%;">Descrição</label>
                            <textarea id="wmd-input" class="wmd-input processed" name="descricao" style="width: 94%; opacity: 1; height: 120px; margin-left: 3%;"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-lg btn-danger">Salvar</button>
                </div>
            </div>
        </form>
    </div>

@endsection