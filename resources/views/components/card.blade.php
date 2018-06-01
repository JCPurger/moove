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
                    <div class="lib-row lib-desc">
                     <p class="card-text"><!--{{ $place->descricao }}-->A sessão Descrição da Empresa do plano de negócios deve apresentar um breve resumo da organização da sua empresa ou negócio, sua história, etc.</p>

                     <a href="{{ route('detailsPlace',$place->id) }}" class="btn btn-primary btn-sm" title="Ver Detalhes"><i class="fa fa-plus"></i></a>  

                     <!-- Trocar o $favorite por algo de voto negativo-->
                     @if(Auth::check())
                     @if($favorite)<!-- Se o cara estiver logado e ja tiver curtido...-->
                     <i class="fa fa-thumbs-down fa-2x pull-right" style="color: #FF0000;" aria-hidden="true" id="add-vote" data-id="{{ $place->id }}"></i>
                     @else<!-- Se nao tiver curtido... -->
                     <i class="fa fa-thumbs-down fa-2x pull-right" style="color: #7a7a7a;" aria-hidden="true" id="add-vote" data-id="{{ $place->id }}"></i>
                     @endif
                     @endif

                     <!-- Trocar o $favorite por algo de voto positivo-->
                     @if(Auth::check())
                     @if($favorite)<!-- Se o cara estiver logado e ja tiver curtido...-->
                     <i class="fa fa-thumbs-up fa-2x pull-right" style="color: #1a29f2;" aria-hidden="true" id="add-vote" data-id="{{ $place->id }}" ></i>
                     @else<!-- Se nao tiver curtido... -->
                     <i class="fa fa-thumbs-up fa-2x pull-right" style="color: #7a7a7a;" aria-hidden="true" id="add-vote" data-id="{{ $place->id }}"></i>
                     @endif
                     @endif

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
