<div class="row row-margin-bottom">
    <div class="col-md-8 no-padding lib-item" data-category="view">
        <div class="lib-panel">
            <div class="row box-shadow">
                <div class="col-md-6">
                    <img class="img-responsive" src="{{ asset('/img/perfil.jpg') }}" width="250px" height="250px"/>
                </div>
                <div class="col-md-6">
                    <div class="lib-row lib-header">
                        <h2>{{ $place->nome }}</h2>
                        <div class="lib-header-seperator"></div>
                    </div>
                    <div class="lib-row">
                        <p class="card-text"><!--{{ $place->descricao }}-->A sessão Descrição da Empresa do plano de negócios deve apresentar um breve resumo da organização da sua empresa ou negócio,
                            sua história, etc.</p>

                        <a href="{{ route('places.details',$place->id) }}" class="btn btn-primary btn-sm" title="Ver Detalhes"><i class="fa fa-plus"></i></a>


                        @if(Auth::check() && !Auth::user()->isCompany())

                            <i class="fa fa-thumbs-down fa-2x pull-right icones add-vote" style="color: {{ $negative }};" aria-hidden="true" data-id="{{ $place->id }}" data-value="0"></i>
                            <i class="fa fa-thumbs-up fa-2x pull-right icones add-vote" style="color: {{ $positive }};" aria-hidden="true" data-id="{{ $place->id }}" data-value="1"></i>

                            @if($favorite)<!-- Se o cara estiver logado e ja tiver curtido...-->
                                <i class="fa fa-heart fa-2x pull-right icones add-favorite" style="color: #FF0000;" aria-hidden="true" data-id="{{ $place->id }}"></i>
                            @else<!-- Se nao tiver curtido... -->
                                <i class="fa fa-heart fa-2x pull-right icones add-favorite" style="color: #7a7a7a;" aria-hidden="true" data-id="{{ $place->id }}"></i>
                            @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
