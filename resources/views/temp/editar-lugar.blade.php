@extends('layout.main')
@section('title','Lugar')

@section('content')

 <link rel="stylesheet" type="text/css" href="/css/app.css"> 
 <link rel="stylesheet" type="text/css" href="/css/style.css"> 

<div class="col-lg-10 well lugar-cadas" >
	<form action="#" method="post" role="form" class="form-cadas">
		<div class="col-sm-10">
			<div class="row">
				<div class="form-group">
					<label>Nome</label>
					<input type="text" id="nome" placeholder="Nome do lugar" class="form-control">
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>Latitude</label>
						<input type="text" id="latitude" placeholder="Latitude do lugar" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label>Longitude</label>
						<input type="text" id="longitude" placeholder="Longitude do lugar" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>Foto do Lugar</label>
						<input type="file" id="foto" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label>Categoria</label>
						<div class="input-group-btn">
							<select class="form-control" name="categoria">
								<option>Selecione</option>
								<option>Restaurante</option>
								<option>Bar</option>
								<option>Hospital</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="form-group">
					<label style="margin-left: 2%;">Descrição</label>
					<textarea id="wmd-input" class="wmd-input processed" name="post-text" style="width: 94%; opacity: 1; height: 120px; margin-left: 3%;"></textarea>
				</div>
				</div>
				<button type="button" class="btn btn-lg btn-danger">Salvar</button>
			</div>
		</div>
	</form>
</div>



@endsection