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
                    <h6></h6>
                    <button class="btn" id="edit-photo">Trocar foto</button>
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                {{--<div class="alert alert-info alert-dismissable">--}}
                    {{--<a class="panel-close close" data-dismiss="alert">×</a>--}}
                    {{--<i class="fa fa-coffee"></i>--}}
                    {{--This is an <strong>.alert</strong>. Use this to show important messages to the user.--}}
                {{--</div>--}}
                <h3>Informações Pessoais</h3>
                <form method="POST" action="{{ route('updateProfile') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="imagem" class="text-center center-block well well-sm" style="display: none;">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nome:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="nome" value="{{ $user->nome }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">CNPJ:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="cnpj" value="{{ $user->cnpj }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="email" value="{{ $user->email }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Endereco:</label>
                        <div class="col-md-8">
                            <input class="form-control" name="endereco" value="{{ $user->endereco }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Senha:</label>
                        <div class="col-md-8">
                            <input class="form-control" name="password" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirmar Senha:</label>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#edit-photo').on('click',function(){
            $el = $(this);
            $file = $("input[type='file']");

            $file.trigger('click');
            $file.change(function(){
                $el.addClass('btn-success');
            });
        });
    </script>
@endsection