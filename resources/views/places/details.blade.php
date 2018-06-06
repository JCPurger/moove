@extends('layout.main')
@section('title','Detalhes do lugar')

@section('content')

    <div id="wrap">
        <div class="card">
            <img src="{{ @$place->imagem }}" style="width: 200px; height: 220px;">
            <h3>{{ $place->nome }}</h3>
            <hr/>
            <p class="desc">{{ $place->descricao }}</p>
            <div class="add"><a href="#coment">Comentar</a></div>
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
        <form class="form-horizontal" role="form">
            <div class="form-group" id="coment">
                <label class="col-sm-2 control-label">
                    <img class="img-circle" src="{{ Storage::url($user->imagem_perfil) }}" style="width: 50px;height:50px;">
                </label>
                <div class="col-sm-10">
                    <div id="summernote" placeholder="Seu comentário..."></div>
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
    <script type="text/javascript">
        // When the DOM is ready, run this function
        $(document).ready(function () {
            //Set the carousel options
            $('#quote-carousel').carousel({
                pause: true,
                interval: 4000,
            });
        });
    </script>
@endsection