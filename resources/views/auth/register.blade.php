@extends('layout.main')

@section("content")
    <!-- Login -->
    <!--Cadastro -->
    <div id="form-cadas" class="container-fluid" style="text-align:center; margin: 0 auto;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="usuario-form-link">Usuário</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" id="empresa-form-link">Empresa</a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12 well" id="usuario-form">
                            <!-- Cadastro Usuario -->
                            <form action="{{ route('register') }}" enctype="multipart/form-data" method="POST" role="form">
                                {{ csrf_field() }}
                                <input type="hidden" name="tipo" value="0"> {{--campo oculto para enviar tipo ao request--}}
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Nome</label>
                                            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Enter First Name Here.." class="form-control">
                                        </div>
                                        {{--<div class="col-sm-6 form-group">--}}
                                            {{--<label>Último Nome</label>--}}
                                            {{--<input type="text" id="sobrenome" name="sobrenome" value="{{ old('sobrenome') }}" placeholder="Enter Last Name Here.." class="form-control">--}}
                                        {{--</div>--}}
                                        <div class="col-sm-6 form-group">
                                            <label>Data Nasc.</label>
                                            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Eamil Here.." class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Senha</label>
                                                <input type="password" id="senha" name="password" value="{{ old('password') }}" placeholder="Enter Password Here.." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Confirmação de Senha</label>
                                                <input type="password" id="confirmsenha" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Enter Password Here.."
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto de Perfil</label>
                                            <input type="file" id="perfil" name="imagem_perfil" value="{{ old('imagem_perfil') }}" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- Cadastro Empresa -->
                        <div class="col-lg-12 well" id="empresa-form" style="display: none;">
                            <div class="row">
                                <form action="{{ route('register') }}" enctype="multipart/form-data" method="POST" role="form" style="display: block;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tipo" value="1"> {{--campo oculto para enviar tipo ao request--}}
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Nome</label>
                                                <input type="text" id="nomeEmp" name="nome" value="{{ old('nome') }}" placeholder="Enter Name Here.." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>CNPJ</label>
                                                <input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" placeholder="Enter CNPJ Here.." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text " id="endereco" name="endereco" value="{{ old('endereco') }}" placeholder="Enter Endereco Here.." class="form-control">
                                        </div>
                                        {{--<div class="col-sm-6 form-group">--}}
                                        {{--<label>Número</label>--}}
                                        {{--<input type="text" id="numero" placeholder="Enter Number Here.." class="form-control">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-6 form-group">--}}
                                        {{--<label>Complemento</label>--}}
                                        {{--<input type="text" id="complemento" placeholder="Enter Complement Here.." class="form-control">--}}
                                        {{--</div>--}}
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Telefone</label>
                                                <input type="text" id="tel" placeholder="Enter Telefone .." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Email</label>
                                                <input type="text" id="emailEmp" name="email" value="{{ old('email') }}" placeholder="Enter Company Name Here.." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Senha</label>
                                                <input type="password" id="senha" name="password" value="{{ old('password') }}" placeholder="Enter Password Here.." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Confirmação de Senha</label>
                                                <input type="password" id="confirmsenha" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Enter Password Here.."
                                                       class="form-control">
                                            </div>
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label>Website</label>--}}
                                            {{--<input type="text" id="site" placeholder="Enter Website Name Here.." class="form-control">--}}
                                        {{--</div>--}}
                                        <div class="col-sm-12 form-group">
                                            <label>Fotos</label>
                                            <input type="file" id="fotos" name="imagem_perfil" value="{{ old('imagem_perfil') }}" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(function () {
            $('#usuario-form-link').click(function (e) {
                e.preventDefault();
                $("#usuario-form").delay(100).fadeIn(100);
                $("#empresa-form").fadeOut(100);
                $('#empresa-form-link').removeClass('active');
                $(this).addClass('active');
            });
            $('#empresa-form-link').click(function (e) {
                e.preventDefault();
                $("#empresa-form").delay(100).fadeIn(100);
                $("#usuario-form").fadeOut(100);
                $('#usuario-form-link').removeClass('active');
                $(this).addClass('active');
            })
        });
    </script>
@endsection