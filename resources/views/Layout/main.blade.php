<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">

	<script src="/js/app.js"></script>
	
</head>

<body>
	<!-- Menu -->
	<nav class="navbar">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><img class="brand" src="img/mov(fundo transparente).png" width="110px"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
				</ul>  

				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" class="form-control busca" placeholder="Busca">
					</div>
					<button type="submit" class="btn btn-default busca">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>                        
				</form>

				<ul class="nav navbar-nav navbar-right"> 
					@if (Auth::check())
						<li><a href="/logout">LOGADO</a></li> 
					@else	
						<li><a href="/login">@lang('navigation.entrar')</a></li> 
					@endif
				</ul> 

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	@yield('content');
		
 	<footer>Trabalho de Conclusão de Curso - Faeter-Rio - 2018</footer>

</body>

@yield("scripts")

</html>