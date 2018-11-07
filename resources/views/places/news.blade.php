@extends('layout.main')
@section('title','Novos Lugares')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1 style="margin-left: 30%;">Conheça novos lugares!</h1>

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Últimas Atualizações</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th>Detalhes</th>
                                <th>Data de Iserção</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Descrição</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($places as $place)
                                <tr>
                                    <td align="center">
                                        <a class="btn btn-primary" href="{{ route('places.details',$place->id) }}"><em class="fa fa-info-circle"></em></a>
                                    </td>
                                    <td>{{ $place->created_at }}</td>
                                    <td>{{ $place->nome }}</td>
                                    <td>{{ $place->category()->first()->nome }}</td>
                                    <td>{{ str_limit($place->descricao,60) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
		