@extends('layout.main')
@section('title','Favoritos')

@section('content')

    <div class="container">
      <div class="section">
<h1>Seus lugares favoritos estão aqui!</h1>

 <div class="row row-margin-bottom">
            <div class="col-md-5 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="/img/perfil.jpg" style="width: 230px">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                Nome Empresa
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                   <p class="card-text">A sessão Descrição da Empresa do plano de negócios deve apresentar um breve resumo da organização da sua empresa ou negócio, sua história, etc.</p>
                                    <a href="#" class="btn btn-primary btn-sm">Ver mais</a>
                                    <a href="#" class="btn btn-danger btn-sm">Excluir</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 no-padding lib-item" data-category="ui">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img" src="/img/perfil.jpg" style="width: 230px">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                Nome Empresa
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                   <p class="card-text">A sessão Descrição da Empresa do plano de negócios deve apresentar um breve resumo da organização da sua empresa ou negócio, sua história, etc.</p>
                                    <a href="#" class="btn btn-primary btn-sm">Ver mais</a>
                                    <a href="#" class="btn btn-danger btn-sm">Excluir</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div>
	<h3>Poxa! Você ainda não tem favoritos <img src="img/triste.jpg" style="height:35px"></h3>
</div>

     </div>
	</div>
 

@endsection
