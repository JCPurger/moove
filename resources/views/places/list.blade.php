@extends('layout.main')
@section('title','Lista de lugares')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>Seus lugares</h1>

                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sucesso!</strong> {{ session()->get('message') }}
                    </div>
                @endif

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
                                        <a class="btn btn-default" href="{{ route('places.edit',$place->id) }}"><em class="fa fa-pencil"></em></a>
                                        <a class="btn btn-danger l place-delete" href="{{ route('places.destroy',$place->id) }}"><em class="fa fa-trash"></em></a>
                                    </td>
                                    <td>{{ $place->nome }}</td>
                                    <td>{{ $place->category()->first()->nome }}</td>
                                    <td>{{ $place->descricao }}</td>
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

@section('scripts')
    <script>
        $('body').on("click",".place-delete", function (e) {
            e.preventDefault();
            var el = $(this);
            var link = el.attr('href');

            $.ajax({
                method: "DELETE",
                url: link,
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done(function(data) {
                el.parents('tr').remove();
                alert(data);
                // location.reload(true);
            })
            .fail(function(data) {
                // alert("error");
            });
        });
    </script>
@endsection
