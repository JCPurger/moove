<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/mov(fundo transparente).png') }}" alt="LOGO"">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                @if (!Auth::check())
                    <a href="{{ route('login') }}">
                        <span class="glyphicon glyphicon-log-in"></span>
                        @lang('navigation.entrar')
                    </a>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nome }} <b
                                class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('editProfile',Auth::id()) }}"><i class="fa fa-fw fa-user"></i> Editar
                                perfil</a></li>
                        <li><a href="{{ route('listFavorites',Auth::id()) }}"><i class="fa fa-fw fa-heart"></i>
                                Favoritos</a></li>
                        {{--<li><a href="{{ route('listComments') }}"><i class="fa fa-fw fa-cog"></i> Comentários</a></li>--}}
                        {{--<li><a href="{{ route('changepassword') }}"><i class="fa fa-fw fa-cog"></i> Trocar senha</a></li>--}}
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @endif
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav" id="menu">
                <li><a href="/quem-somos">@lang('navigation.quem_somos')</a></li>
                <li><a href="/duvidas">@lang('navigation.duvidas')</a></li>
                <li><a href="/contato">@lang('navigation.contato')</a></li>
                <!-- dropdown nao abre-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu2" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        @lang('navigation.idioma')<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
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
                                <input type="text" class="  search-query form-control"
                                       placeholder="@lang('navigation.buscar')"/>
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
            <div class="row" id="main">
                @yield('content')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/parsley.min.js')}}"></script>
<script src="{{asset('/js/flow.js') }}"></script>

@yield("scripts")

</body>
</html>