@extends('layout.main')
@section('title','Login')

@section('content')


<script>
    function pessoa(tipo){
      if(tipo=="fisica"){
        document.getElementById("fisica").style.display = "inline";
        document.getElementById("juridica").style.display = "none";
      }else if(tipo=="juridica"){
        document.getElementById("fisica").style.display = "none";
        document.getElementById("juridica").style.display = "inline";
      }
    }
</script>

<h1>Venha se mover!</h1>

  <div class="row">
    <div class="col-md-6 col-md-offset-5">
      
      <h3>Cadastre-se!</h3>
      <p>
        <input class="people" type="radio" name="optradio" value="juridica" onclick="pessoa(this.value);">Pessoa Juridica
        <input class="people active" type="radio" name="optradio" value="fisica" onclick="pessoa(this.value);">Pessoa Fisica
      </p>

      <form action="/login" method="POST" id="juridica" style="display:none;">
        {{ csrf_field() }}
        <fieldset>
          <label>Nome Fantasia: </label><input type="text" name="nomeFan"></br></br>
          <label>CNPJ: </label><input type="text" name="cnpj"></br></br>
          <label>Endereço: </label><input type="text" name="endereço"></br></br>
          <label>Email: </label><input type="text" name="email"></br></br>
          <label>Senha: </label><input type="text" name="senha"></br></br>
          <input class="btn_submit" type="submit" name="Cadastrar">
        </fieldset>
      </form>

      <form action="/login" method="POST" id="fisica">
        {{ csrf_field() }}
        <fieldset>
          <label>Email: </label><input type="text" class="email" name="email"></br></br>
          <label>CPF: </label><input type="text" class="cpf" name="cpf"></br></br>
          <input class="btn_submit" type="submit" value="Cadastrar">
        </fieldset>
      </form>
      
    </div>
  </div>

<hr>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-5"> 
      <h3>Login!</h3>
      <form action="/login" method="POST">
        {{ csrf_field() }}
        <fieldset>
          <label>Email: </label><input type="text" class="email" name="email"></br></br>
          <label>Senha: </label><input type="text" class="senha" name="senha"></br></br>
          <input class="btn_submit" type="submit" value="Entrar">
        </fieldset>
      </form>
    </div>
  </div>
</div>

@endsection