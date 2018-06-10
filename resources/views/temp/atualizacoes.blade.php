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
                        <tr>
                            <td align="center">
                                <a class="btn btn-primary"><em class="fa fa-info-circle"></em></a>
                            </td>
                            <td>16/06/2018</td>
                            <td>Lugar 1</td>
                            <td>Restaurante</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-primary"><em class="fa fa-info-circle"></em></a>
                            </td>
                            <td>23/06/2018</td>
                            <td>Lugar 2</td>
                            <td>Bar</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-primary"><em class="fa fa-info-circle"></em></a>
                            </td>
                            <td>28/06/2018</td>
                            <td>Lugar 3</td>
                            <td>Hospital</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-primary"><em class="fa fa-info-circle"></em></a>
                            </td>
                            <td>29/06/2018</td>
                            <td>Lugar 4</td>
                            <td>Restaurante</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-primary"><em class="fa fa-info-circle"></em></a>
                            </td>
                            <td>01/07/2018</td>
                            <td>Lugar 5</td>
                            <td>Praça</td>
                            <td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-primary"><em class="fa fa-info-circle"></em></a>
                            </td>
                            <td>02/07/2018</td>
                            <td>Lugar 6</td>
                            <td>Supermercado</td>
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
		