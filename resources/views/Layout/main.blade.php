<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">

	<script src="/js/app.js"></script>
    {{-- <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script> --}}
    
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><img class="brand" src="/img/mov(fundo transparente).png" width="110px"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<ul class="nav navbar-nav">
					<li><a href="/quem-somos">@lang('navigation.quem_somos')</a></li>
					<li><a href="/duvidas">@lang('navigation.duvidas')</a></li>
                    <li><a href="/contato">@lang('navigation.contato')</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('navigation.idioma')<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/lang/pt-br">@lang('navigation.portugues')</a></li>
							<li><a href="/lang/en">@lang('navigation.ingles')</a></li>
							<li><a href="/lang/es">@lang('navigation.espanhol')</a></li>
							<li><a href="/lang/fr">@lang('navigation.frances')</a></li>
						</ul>
					</li>
				</ul>
				
				 
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control busca" placeholder="Busca">
                    </div>
                    <button type="submit" class="btn btn-default busca">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>                        
                </form>

                <ul class="nav navbar-nav navbar-right"> 
                    <li><a href="/login">@lang('navigation.entrar')</a></li>
                </ul> 

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div id="conteiner" class="conteiner">
		@yield('content')
	<div>
</body>
</html>