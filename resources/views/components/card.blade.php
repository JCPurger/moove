<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default  panel--styled">
				<div class="panel-body">
					<div class="col-md-12 panelTop">
						<div class="col-md-3">
							<img class="img-responsive" src="{{ asset('img/icon.png') }}" width="250px" height="250px"/>
						</div>
						<div class="col-md-8">
							<h2>{{ $place->nome }}</h2>
							<p>{{ $place->descricao }}</p>
						</div>
					</div>

					<div class="col-md-12 panelBottom">
						<div class="col-md-4 text-center">
							<a href="{{ route('detailsPlace',$place->id) }}" class="btn btn-primary  btn-lg btn-block">Ver Detalhes</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>