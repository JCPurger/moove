<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    
    <script src="/js/app.js"></script>
    <script src="/js/parsley.min.js"></script>
    <script src="/js/flow.js"></script>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="img/mov(fundo transparente).png" alt="LOGO"">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">           
                <li class="dropdown">
                    @if (!Auth::check())
                        <a href="#" data-toggle="modal" data-target="#login-modal">@lang('navigation.entrar')</a> 
                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nome }} <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/quem-somos">@lang('navigation.quem_somos')</a></li> 
                <li><a href="/duvidas">@lang('navigation.duvidas')</a></li> 
                <li><a href="/contato">@lang('navigation.contato')</a></li> 
                <!-- dropdown nao abre-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu2" role="button" aria-haspopup="true" aria-expanded="false">
                        @lang('navigation.idioma')<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu"  aria-labelledby="dropdownMenu2">
                        <li><a href="/lang/pt-br">@lang('navigation.portugues')</a></li> 
                        <li><a href="/lang/en">@lang('navigation.ingles')</a></li> 
                        <li><a href="/lang/es">@lang('navigation.espanhol')</a></li> 
                        <li><a href="/lang/fr">@lang('navigation.frances')</a></li> 
                    </ul>
                </li>

                <!--BUSCAR-->               
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <!--BUSCAR-->               

            </ul> 

            @yield('sidebar') 

        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                @yield('content');
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

{{-- MODAL LOGIN --}}
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Entre com sua conta</h1><br>
            <form id="login-form">
                {{ csrf_field() }}
                <input type="text" data-parsley-type="email" data-parsley-errors-messages-disabled name="email" placeholder="E-mail" required>
                <input type="password" data-parsley-errors-messages-disabled name="password" placeholder="Senha" required>
                <input type="submit" name="login" class="login loginmodal-submit" value="Entrar" id="login-submit">
            </form>

            <div class="login-help">
                <a href="/login">Registrar-se</a> - <a href="#">Esqueci a senha</a>
            </div>
        </div>
    </div>
</div>
{{-- MODAL LOGIN --}}

@yield("scripts")
<script type="text/javascript">
    $(document).ready(function(){
        $('#login-form').parsley();


        $('#login-form').submit(function(event) {
            event.preventDefault();

            // PEGA AS INFORMAÇÕES DO FORMULÁRIO
            var formData = {
                'email' : $('input[name=email]').val(),
                'password' : $('input[name=password]').val()
            };

            $.ajax({
                url: '/login',
                type: 'POST',
                dataType: 'json',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done(function(data) {
                if(data.acess){
                    $('#login-modal').modal('hide');
                    location.reload();
                }else{
                    if( !($('#login-form input[name=password]').next().get(0) == $('#login-form span').get(0)) ){
                        $('#login-form input[name=password]').after('<span>'+ data.failure +'</span>');
                    }
                }
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function(data) {
                console.log("complete");
            });
            
        });
    });
</script>

</body>
</html>