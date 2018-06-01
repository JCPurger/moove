@extends('layout.main')
@section('title','Lugares Cadastrados')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">

<div class="container">
	<div class="row">
		

		<div class="col-md-10 col-md-offset-1">

			<h1>Seus lugares</h1>
			
			<div class="panel panel-default panel-table">
				<div class="panel-heading">
					<div class="row">
						<div class="col col-xs-6">
							<h3 class="panel-title">Lugares cadastrados</h3>
						</div>
						<div class="col col-xs-6 text-right">
							<button type="button" class="btn btn-sm btn-primary btn-create">Novo Local</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th><em class="fa fa-cog"></em></th>
								<th>Nome</th>
								<th>Categoria</th>
								<th>Descrição</th>
							</tr> 
						</thead>
						<tbody>
							<tr>
								<td align="center">
									<a class="btn btn-default"><em class="fa fa-pencil"></em></a>
									<a class="btn btn-danger l"><em class="fa fa-trash"></em></a>
								</td>
								<td>Lugar 1</td>
								<td>Restaurante</td>
								<td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
							</tr>

							<tr>
								<td align="center">
									<a class="btn btn-default"><em class="fa fa-pencil"></em></a>
									<a class="btn btn-danger l"><em class="fa fa-trash"></em></a>
								</td>
								<td>Lugar 2</td>
								<td>Bar</td>
								<td>daskjhdsa sdhakhds ashdhskhd sadhkashd</td>
							</tr>

						</tbody>
					</table>
					
				</div>
			</div>

		</div></div></div>


		@endsection
