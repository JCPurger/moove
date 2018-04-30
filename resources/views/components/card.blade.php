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
                            <a href="{{ route('detailsPlace',$place->id) }}" class="btn btn-primary  btn-lg btn-block">Ver
                                Detalhes</a>
                        </div>
                        @if(Auth::check())
                            @if($favorite)
                                <i class="fa fa-heart fa-2x pull-right" style="color: #FF0000;" aria-hidden="true" id="add-favorite" data-id="{{ $place->id }}"></i>
                            @else
                                <i class="fa fa-heart fa-2x pull-right" style="color: #7a7a7a;" aria-hidden="true" id="add-favorite" data-id="{{ $place->id }}"></i>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>