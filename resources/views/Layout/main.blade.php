<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		.navbar{margin-bottom: 0px;border-radius: 0px;}
		#conteiner{width: 100%;height:100%;}
	</style>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img class="brand" src="/img/mov(fundo transparente).png" width="110px"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
             <ul class="nav navbar-nav">
					<li><a href="#">Quem Somos</a></li>
					<li><a href="#">Dúvidas</a></li>
                    <li><a href="#">Contato</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Idioma <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Inglês</a></li>
							<li><a href="#">Espanhol</a></li>
							<li><a href="#">Francês</a></li>
						</ul>
					</li>
				</ul>
				
				 
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control busca" placeholder="Busca">
                        </div>
                        <button type="submit" class="btn btn-default busca">Buscar</button>
                    </form>

                   <ul class="nav navbar-nav navbar-right"> 
                        <li><a href="#">Entrar</a></li>
                    </ul> 
                
		
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div id="conteiner" class="conteiner">
		@yield('content')
	<div>
</body>
</html>