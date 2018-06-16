@extends('layout.main')
@section('title','Detalhes do lugar')

@section('content')

    <div id="wrap">
        <div class="col-md-4 no-padding lib-item" data-category="view">
            <div class="lib-panel">
                <div class="row box-shadow">
                    <div class="col-md-12">
                        <img class="lib-img-show" src="{{ Storage::url(@$place->imagem) }}" style="width: 230px">
                    </div>
                    <div class="col-md-10">
                        <div class="lib-row lib-header desc">
                            {{ @$place->nome }}
                            <div class="lib-header-seperator-desc"></div>
                        </div>
                        <div class="lib-row lib-desc">
                            <p class="card-text-desc">{{ @$place->descricao }}</p>
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
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#quote-carousel" data-slide-to="1"></li>
                        <li data-target="#quote-carousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Carousel Slides / Comments -->
                    <div class="carousel-inner">
                        <!-- Comment 1 -->
                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="/img/perfil.jpg" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                        <small>Pessoa Um</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Comment 2 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="/img/perfil.jpg" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                        <small>Pessoa Dois</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Comment 3 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="/img/perfil.jpg" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan.</p>
                                        <small>Pessoa Três</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
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

        $('#quote-carousel').carousel({
            pause: true,
            interval: 4000
        });

    </script>
@endsection