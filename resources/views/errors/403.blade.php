@extends('layout.main')
@section('title','Erro 403')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        403 Not Found</h2>
                    <div class="error-details">
                        Nos desculpe pelo ocorrido. Entre em contato conosco e informe o erro.
                    </div>
                    <div class="error-actions">
                        <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Voltar </a>
                        <a href="{{ route('contact') }}" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Falar com suporte </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
