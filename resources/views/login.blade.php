@extends("layout.main")
@section("content")
  <!--   Conteúdo    -->
  <!-- Login -->
  <h1 class="titulo">Venha se mover!</h1>

  <div id="form-log" class="container-fluid"  style="text-align:center; margin: 0 auto;">
    <h3>Login!</h3>
    <form action="/login" method="POST">
        {{ csrf_field()  }}
        <div class="form-group">
          <label class="form">Email: </label><input name="email" type="text" class="email" size="30"></br></br>
        </div>
        <div class="form-group">
          <label class="form">Senha: </label><input name="senha" type="password" class="senha" size="30"></br></br>
        </div>
        <div class="form-group">
          <span class="error">{{ $failure or "" }} </span>
        </div>
        <div class="form-group">
          <input class="btn_submit" type="submit" value="Entrar">
        </div>
    </form>
  </div>

  <hr>

  <!--Cadastro -->
  <div id="form-cadas" class="container-fluid"  style="text-align:center; margin: 0 auto;">

    <h3>Cadastre-se!</h3>
    <h4> Comece nos dizendo se você é uma pessoa física ou jurídica, por favor :</h4>
    <p class="tipo-pessoa">
      <input id="inptJuridica" type="radio" name="optradio" value="juridica" >
      <label for="inptJuridica"> Pessoa Juridica</label>
      
      <input id="inptFisica" type="radio" name="optradio" value="fisica" >
      <label for="inptFisica">Pessoa Fisica</label>
    </p>

    <!-- Pessoa Jurídica -->
    <form action="/register" method="POST" id="juridica" style="display:none;">
      {{ csrf_field()  }}
      <input type="hidden" name="tipo" value="1">
      <label class="form">Nome Fantasia </label><input type="text" name="nome" size="30"></br>
      <label class="form">CNPJ </label><input type="text" name="cnpj" size="30"></br>
      <label class="form">Endereço </label><input type="text" name="endereço" size="30"></br>
      <label class="form">Email </label><input type="text" name="email" size="30"></br>
      <label class="form">Senha </label><input type="text" name="password" size="30"></br>
      <input class="btn_submit" type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <!-- Pessoa Física -->
    <form  action="/register" method="POST" id="fisica" style="display:none;">
      {{ csrf_field()  }}
      <input type="hidden" name="tipo" value="2">
      <label class="form">Nome Completo</label><input type="text" name="nome" size="30"></br>
      <label class="form">CPF</label><input type="text" name="cpf" size="30"></br>
      <label class="form">Email</label><input type="text" name="email" size="30"></br>
      <label class="form">Senha</label><input type="text" name="password" size="30"></br>
      <input class="btn_submit" type="submit" name="cadastrar" value="Cadastrar">
    </form>

  </div>
@endsection

{{-- sessao para scripts  --}}
@section("scripts")
  <script>
    $('body').on('click', '.tipo-pessoa input', function(event) {
      if($(this).attr("id") == "inptFisica"){
        $("#juridica").css("display","none");
        $("#fisica").css("display","inline");
      }else if($(this).attr("id") == "inptJuridica"){
        $("#fisica").css("display","none");
        $("#juridica").css("display","inline");
      }
    });
  </script>
@endsection