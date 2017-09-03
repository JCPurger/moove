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

<style type="text/css">
#form-cadas{
    font-family: 'Acme';
    position: relative;
    float: left;
    width: 300px;
    height: 270px;
    }
#form-log{
    font-family: 'Acme';
    position: relative;
    width: 300px;
    height: 270px;
}
legend
{
    font-style:bold;
    font-family: 'Acme';
    text-align: center;
}
#form label
{
   
}

h1{   
    color: orange;
   font-family: 'Acme';
   text-align:  center;
}

</style>

<h1>Venha se mover!</h1>


 <div id="form-cadas" class="form-group"  style="text-align:center; margin-left: 300px ;">
     
      <h3>Cadastre-se!</h3>
          <p><input type="radio" name="optradio" value="juridica" onclick="pessoa(this.value);">Pessoa Juridica
          <input class="active" type="radio" name="optradio" value="fisica" onclick="pessoa(this.value);">Pessoa Fisica
          </p>


        <form id="juridica" style="display:none;">
          <fieldset>
             
              <label>Nome Fantasia: </label><input type="text" name="nomeFan"></br></br>
              <label>CNPJ: </label><input type="text" name="cnpj"></br></br>
              <label>Endereço: </label><input type="text" name="endereço"></br></br>
              <label>Email: </label><input type="text" name="email"></br></br>
              <label>Senha: </label><input type="text" name="senha"></br></br>
            <input class="btn_submit" type="submit" name="Cadastrar">


        </fieldset>
          </form>

          <form id="fisica">
          <fieldset>
              
              <label>Email: </label><input type="text" class="email"></br></br>
              <label>CPF: </label><input type="text" class="cpf"></br></br>
            <input class="btn_submit" type="submit" value="Cadastrar">


        </fieldset>
          </form>

</div>

<hr>

   

    <div id="form-cadas" class="form-group"  style="text-align:center; margin: 0 auto;">
        <h3>Login!</h3>
            <form>
             <fieldset>
              
              <label>Email: </label><input type="text" class="email"></br></br>
              <label>Senha: </label><input type="text" class="senha"></br></br>
            <input class="btn_submit" type="submit" value="Entrar">


        </fieldset>
          </form>
    </div>

@endsection