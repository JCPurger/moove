@extends('layout.main')
@section('title','Detalhes do lugar')

@section('content')

    <div id="wrap" style="margin-left: 30%;">
        <div class="col-md-4 no-padding lib-item" data-category="view" style="width: 40.33333333%;">
            <div class="lib-panel">
                <div class="row box-shadow">
                    <div class="lib-img-show" id="description" style="background-image: url('{{ Storage::url(@$place->imagem) }}');">
                        {{--<img class="lib-img-show" src="{{ Storage::url(@$place->imagem) }}" style="width: 230px">--}}
                    </div>
                    <div class="col-md-12">
                        <div class="lib-row lib-header desc centered">
                            {{ @$place->nome }}
                            {{--<div class="lib-header-seperator-desc" id="description"></div>--}}
                        </div>
                        <div class="lib-row lib-desc">
                            <p class="card-text-desc centered">{{ @$place->descricao }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Comentários -->
    <div class="container">
        <div class="row">
            <div class='col-md-offset-2 col-md-8 text-center'>
                <h1>Veja o que as outras pessoas estão dizendo!</h1>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-offset-2 col-md-8'>
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        @foreach($comments as $key => $comment)
                            @if($key == 0)
                                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#quote-carousel" data-slide-to="{{ $key }}"></li>
                            @endif
                        @endforeach
                    </ol>

                    <!-- Carousel Slides / Comments -->
                    <div class="carousel-inner">
                        @foreach($comments as $key => $comment)
                        @if($key == 0)
                            <div class="item active">
                        @else
                            <div class="item">
                        @endif
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="/img/perfil.jpg" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p>{{ $comment->pivot->comentario }}</p>
                                        <small>Pessoa Dois</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        @endforeach
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::check() && !Auth::user()->isCompany())
        <a id="checkroute" href="{{ route('comments.create') }}" style="display: none;"></a>
        <form action="{{ route('comments.store') }}" class="form-horizontal" id="send-comment" role="form" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="placeId" value="{{ $place->id }}">
            <div class="form-group" id="coment">
                <label class="col-sm-2 control-label">
                    <img class="img-circle" src="{{ Storage::url($user->imagem_perfil) }}" style="width: 50px;height:50px;">
                </label>
                <div class="col-sm-10">
                    <textarea id="summernote" name="comentario" placeholder="Seu comentário..."></textarea>
                </div>
            </div>

            <hr class="line-dashed line-full"/>

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button type="reset" class="btn btn-lightred">Cancelar</button>
                    <button type="submit" class="btn btn-default">Salvar Comentário</button>
                </div>
            </div>
        </form>
    @endif

@endsection


@section('scripts')
    {{-- AO LOADAR PÁGINA VERIFICA SE JÁ EXISTE COMENTÁRIO--}}
    <script type="text/javascript">
        $( window ).on('load',function(){
            $('#quote-carousel').carousel({
                pause: true,
                interval: 4000
            });
        });

        $(function() {
            $.ajax({
                type: "GET",
                url: $('#checkroute').attr('href'),
                data: {
                    placeId: $("input[name='placeId']").val()
                },
                dataType: "json", // xml, html, script, json, jsonp, text
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data) {
                        $('#send-comment').remove();
                    } else {
                        $('#send-comment').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });

        $('body').on("submit", "#send-comment", function (e) {
            e.preventDefault();
            var el = $(this);
            $.ajax({
                type: "POST",
                url: el.attr('action'),
                data: {
                    comentario: $("#summernote").code() ,
                    placeId: $("input[name='placeId']").val()
                },
                dataType: "json", // xml, html, script, json, jsonp, text
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data) {
                        $('#send-comment').remove();
                    } else {
                        $('#send-comment').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });
    </script>
@endsection