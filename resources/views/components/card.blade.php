<div class="col-md-11 no-padding lib-item card-map" data-category="view" >
    <div class="lib-panel">
        <div class="row box-shadow">
            <div class="col-md-6 img" style="background-image: url('{{ Storage::url(@$place->imagem) }}');">
                {{-- <img class="img-responsive" src="{{ Storage::url(@$place->imagem) }}" width="250px" height="250px"/> --}}
            </div>
            <div class="col-md-6" style="min-height: 275px;">
                <div class="lib-row lib-header">
                    <h2>{{ $place->nome }}</h2>
                    <div class="lib-header-seperator"></div>
                </div>
                <div class="lib-row" style="width: 600px;">
                    <p class="card-text">{{ $place->descricao }}</p>

                    <div class="user-controls">
                        <a href="{{ route('places.details',$place->id) }}" class="btn btn-primary btn-sm" title="Ver Detalhes" style="padding: 2px 6px;font-size: 14px;">
                            <i class="fa fa-plus"> Detalhes</i>
                        </a>

                        @if(Auth::check() && !Auth::user()->isCompany())
                            <i class="fa fa-thumbs-down pull-right fa-2x icones add-vote" style="color: {{ $negative }};" aria-hidden="true" data-id="{{ $place->id }}" data-value="0"></i>
                            <i class="fa fa-thumbs-up pull-right fa-2x icones add-vote" style="color: {{ $positive }};" aria-hidden="true" data-id="{{ $place->id }}" data-value="1"></i>

                            @if($favorite)<!-- Se o cara estiver logado e ja tiver curtido...-->
                            <i class="fa fa-heart pull-right fa-2x icones add-favorite" style="color: #FF0000;" aria-hidden="true" data-id="{{ $place->id }}"></i>
                            @else<!-- Se nao tiver curtido... -->
                            <i class="fa fa-heart pull-right fa-2x icones add-favorite" style="color: #7a7a7a;" aria-hidden="true" data-id="{{ $place->id }}"></i>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>