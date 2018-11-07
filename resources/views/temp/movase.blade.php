@extends('layout.main')
@section('title','Mova-se')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css"> 
<link rel="stylesheet" type="text/css" href="/css/style.css"> 

<div class="container">
	<div class="row">
       <div class="jumbotron">
        <h1 class="blue" style="color:#2196F3; font-size: 50px; margin-left: 15%;">Junte-se a nós nesse movimento! </h1>

    </div>
</div>
<!--small cards-->
<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-content">
           <div class="card-header-blue">
             <h1 class="card-heading">Favoritos</h1>
         </div>
         <div class="card-body">
            <p class="card-p">
                Foi em algum lugar e gostou? Que tal colocá-lo na sua lista de favoritos e ajudar a divulgá-lo? Deixe todos saberem o quanto esse lugar é legal! Seus favoritos podem ser os de outras pessoas também.

            </p>
        </div>

</div>
</div>
</div>
<div class="col-md-4">
   <div class="card">
    <div class="card-content">
       <div class="card-header-orange">
         <h1 class="card-heading">Comentários</h1>
     </div>
     <div class="card-body">
        <p class="card-p">
            Que tal deixar comentários nos lugares que visitou e ajudar as empresas a melhorarem?
            Compartilhe sua opinião com os outros usuários. Conte ao mundo suas experiências!

        </p>
    </div>


</div>
</div>
</div>
<div class="col-md-4">
   <div class="card">
    <div class="card-content">
       <div class="card-header-grey">
         <h1 class="card-heading">Atualizações</h1>
     </div>
     <div class="card-body">
        <p class="card-p">
            Acesse os novos locais antes de todo mundo! Descubra, desbrave, conheça! Os melhores lugares estão aqui e você será o primeiro a vê-los. Legal, né? Então, mova-se!

        </p>
    </div>

</div>
</div>
</div>
</div>

@endsection