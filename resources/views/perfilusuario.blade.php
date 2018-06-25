@extends('layout.main')
@section('title','Editar Perfil')

@section('content')

    <div class="container" style="padding-top: 10px;">
        <h1 class="page-header">{{ $user->nome }}</h1>
        <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="text-center">
                    <img src="{{ Storage::url($user->imagem_perfil) }}" style="width: 90px;height:90px;" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Trocar foto</h6>
                    <input type="file" class="text-center center-block well well-sm">
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i>
                    This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div>
                <h3>Informações Pessoais</h3>
                <form method="POST" action="{{ route('updateProfile') }}" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Primeiro Nome:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $user->nome }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Último Nome:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="Bishop" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $user->email }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" name="password" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control" name="password_confirmation" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input class="btn btn-danger" value="Salvar Mudanças" type="submit">
                            <span></span>
                            <input class="btn btn-default" value="Cancelar" type="reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection