@extends("layout.main")
@section("content")
<!-- Conteúdo -->

<!-- Login -->

<h1 class="titulo">Venha se mover!</h1>

<div id="form-log" class="form-group"  style="text-align:center; margin: 0 auto;">
  <h3>Login!</h3>
<form>
   <fieldset>
    <label class="form">Email: </label><input type="text" class="email" size="30"></br></br>
    <label class="form">Senha: </label><input type="text" class="senha" size="30"></br></br>
    <input class="btn_submit_entrar" type="submit" value="Entrar">
  </fieldset>
</form>

<!-- Cadastro -->
<h3> Ainda não tem cadastro? Junte-se a nós!</h3>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar!</button>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Cadastre-se!</h3>
      </div>
      <div class="modal-body">
       <div id="form-cadas" class="form-group" >

        <!-- Cadastro --> 


        <h4> Comece nos dizendo se você é uma pessoa <br>física ou jurídica, por favor :</h4>
        <p><input type="radio" name="optradio" value="juridica" onclick="pessoa(this.value);">
         <label for="juridica">Pessoa Juridica</label>
         <input class="active" type="radio" name="optradio" value="fisica" onclick="pessoa(this.value);">
         <label for="fisica">Pessoa Fisica</label>
       </p>

       <!-- Pessoa Jurídica --> 
       <form id="juridica" style="display:none;">

        <label class="form">Nome Fantasia </label><input type="text" name="nomeFan" size="30"></br>
        <label class="form">CNPJ </label><input type="text" name="cnpj" size="30"></br>
        <label class="form">Endereço </label><input type="text" name="endereço" size="30"></br>
        <label class="form">Número </label><input type="text" name="numero" size="30"></br>
        <label class="form">Email </label><input type="text" name="email" size="30"></br>
        <label class="form">Senha </label><input type="text" name="senha" size="30"></br>

        <input class="btn_submit" type="submit" name="cadastrar" value="Cadastrar">
        
      </form>

      <!-- Pessoa Física -->
      <form id="fisica" style="display:none;">

        <label class="form">Nome</label><input type="text" name="nomeCompl" size="30"></br>
        <label class="form">CPF</label><input type="text" name="cpf" size="30"></br>
        <label class="form">Email</label><input type="text" name="email" size="30"></br>
        <label class="form">Senha</label><input type="text" name="senha" size="30"></br>
        
        <input class="btn_submit" type="submit" name="cadastrar" value="Cadastrar">

      </form>

    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>
@endsection