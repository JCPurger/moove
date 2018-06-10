@extends('layout.main')
@section('title','Lista de lugares')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <h1>Seus lugares</h1>

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Lugares cadastrados</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <a type="button" class="btn btn-sm btn-primary btn-create" href="{{ route('places.create') }}">Novo Local</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Descrição</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($places as $place)
                            <tr>
                                <td align="center">
                                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a class="btn btn-danger l"><em class="fa fa-trash"></em></a>
                                </td>
                                <td>{{ $place->nome }}</td>
                                <td>{{ $place->category_id }}</td>
                                <td>{{ $place->descricao }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td align="center">
                                <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger l"><em class="fa fa-trash"></em></a>
                            </td>
                            <td>Lugar 1</td>
                            <td>Restaurante</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger l"><em class="fa fa-trash"></em></a>
                            </td>
                            <td>Lugar 2</td>
                            <td>Bar</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
