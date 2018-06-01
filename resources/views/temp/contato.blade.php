@extends('layout.main')
@section('title','Contato')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css"> 
<link rel="stylesheet" type="text/css" href="/css/style.css"> 

<h1 style="margin-left: 30%;">Deixe-nos uma mensagem!</h1>
<div class="col-lg-10 well lugar-cadas" >
	<form action="#" method="post" role="form" class="form-cadas">
		<div class="col-sm-10">
			<div class="row">
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>Primeiro Nome</label>
						<input type="text" id="nome" placeholder="Nome" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label>Último Nome</label>
						<input type="text" id="sobrenome" placeholder="Sobrenome" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>Email</label>
						<input type="text" id="email" placeholder="Email@exemplo.com" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label>Assunto</label>
						<div class="input-group-btn">
							<select class="form-control" name="categoria">
								<option>Selecione</option>
								<option>Reclamação</option>
								<option>Sugestão</option>
								<option>Elogio</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label style="margin-left: 2%;">Conte-nos o que está pensando</label>
						<textarea id="wmd-input" class="wmd-input processed" name="post-text" style="width: 94%; opacity: 1; height: 120px; margin-left: 3%;"></textarea>
					</div>
				</div>
				<button type="button" class="btn btn-lg btn-danger">Enviar</button>
			</div>
		</div>
	</form>
</div>



@endsection
