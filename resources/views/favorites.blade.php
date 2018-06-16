@extends('layout.main')
@section('title','Favoritos')

@section('content')

    <div class="container" id="favorites-list">
        <div class="section">
            <h1>Seus lugares favoritos estão aqui!</h1>

            <div class="row row-margin-bottom">
                <div style="display: none;" id="msg-vazia">
                    <h3>Poxa! Você ainda não tem favoritos <img src="img/triste.jpg" style="height:35px"></h3>
                </div>

                <div class="container">
                    @foreach($favorites as $key => $favorite)
                        <div class="col-md-5 no-padding lib-item favorite-card" data-category="view">
                            <div class="lib-panel">
                                <div class="row box-shadow">
                                    <div class="col-md-6">
                                        <img class="lib-img-show" src="/img/perfil.jpg" style="width: 230px">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="lib-row lib-header">
                                            {{ $favorite->nome }}
                                            <div class="lib-header-seperator"></div>
                                        </div>
                                        <div class="lib-row lib-desc">
                                            <p class="card-text">{{ $favorite->descricao }}</p>
                                            <a class="btn btn-primary btn-sm" href="{{ route('places.details',$favorite->id) }}">Ver mais</a>
                                            <a  class="btn btn-danger l btn-sm destroyFavorite" href="{{ route('favorites.destroy',$favorite->id) }}">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    @endforeach
                </div>

                {{ $favorites->links() }}

            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script>
    $(function(){
        showMsg();

        $('body').on('click','.destroyFavorite',function(e){
            e.preventDefault();
            $card = $(this).parents('.favorite-card').remove();
            var link = $(this).attr('href');

            $.ajax({
                url: link,
                method: "DELETE",
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done(function(data) {
                console.log( "success: " + data);
                showMsg();
            })
            .fail(function(data) {
                alert( "error" );
            });
        });

        function showMsg() {
            if($('.favorite-card').length == 0)
                $('#msg-vazia').fadeIn('fast');
        }
    });
</script>
@endsection