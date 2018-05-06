@extends('layout.main')
@section('title','Detalhes')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">

<div id="wrap">
  <div class="card">
  	<img src="/img/perfil.jpg" style="width: 200px">
    <h3>Nome da Empresa</h3>
    <hr/>
    <p class="desc">Chhajed Garden’s Sunrise 14.5 Cm Gardening Plant Container, White Nursery Ceramic Pot 6"</p>
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


<form class="form-horizontal" role="form">
  <div class="form-group" id="coment">
    <label class="col-sm-2 control-label"><img class="img-circle" src="/img/perfil.jpg" style="width: 50px;height:50px;"></label>
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

<script type="text/javascript">
	// When the DOM is ready, run this function
  $(document).ready(function() {
  //Set the carousel options
  $('#quote-carousel').carousel({
    pause: true,
    interval: 4000,
  });
});
</script>



@endsection
