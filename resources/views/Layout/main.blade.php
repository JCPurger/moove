<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
    {{-- <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	<script src="/js/app.js"></script>
	<script src="/js/parsley.min.js"></script>
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
					<form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" class="form-control busca" placeholder="Busca">
						</div>
						<button type="submit" class="btn btn-default busca">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>                        
					</form>
				</ul>  


				<ul class="nav navbar-nav navbar-right"> 
					@if (Auth::check())
						{{-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user"></span> 
								<strong>{{ Auth::user()->nome }}</strong>
								<span class="glyphicon glyphicon-chevron-down"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="navbar-login">
										<div class="row">
											<div class="col-lg-4">
												<p class="text-center">
													<img class="icon-size" src="/img/perfil.jpg">
												</p>
											</div>
											<div class="col-lg-8">
												<p class="text-left"><strong>{{ Auth::user()->nome }}</strong></p>
												<p class="text-left small">{{ Auth::user()->email }}</p>
												<p class="text-left">
													<a href="#" class="btn btn-primary btn-block btn-sm">Atualizar os dados</a>
												</p>
											</div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="navbar-login navbar-login-session">
										<div class="row">
											<div class="col-lg-12">
												<p>
													<a href="/logout" class="btn btn-danger btn-block">Sair da sessão</a>
												</p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li> --}}
						<li class="dropdown dropdown-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nome }}<span class="glyphicon glyphicon-user pull-right"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
								<li class="divider"></li>
								<li><a href="#">Favoritos <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
								<li class="divider"></li>
								<li><a href="#">Comentários<span class="badge pull-right"> 42 </span></a></li>
								<li class="divider"></li>
								<li><a href="#">Favoritos<span class="glyphicon glyphicon-heart pull-right"></span></a></li>
								<li class="divider"></li>
								<li><a href="/logout">Sair <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
							</ul>
						</li>
					@else	
						<li><a href="#" data-toggle="modal" data-target="#login-modal">@lang('navigation.entrar')</a></li> 
					@endif
				</ul> 

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	@yield('content');
		
 	<footer>
 		Trabalho de Conclusão de Curso - Faeter-Rio - 2018
 	</footer>

 	{{-- MODAL --}}
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

</body>

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

@yield("scripts")


</html>