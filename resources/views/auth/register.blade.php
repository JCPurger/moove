@extends('layout.main')


@section("content")

    <!-- Conteúdo -->
    <!-- Login -->
    <!--Cadastro -->
    <div id="form-cadas" class="container-fluid"  style="text-align:center; margin: 0 auto;">

        <h1 class="titulo">Venha se mover!</h1>
        <h5>Preencha todos os campos</h5>

        <p class="tipo-pessoa">
            <input id="inptJuridica" type="radio" name="optradio" value="juridica">
            <label for="inptJuridica"> Pessoa Juridica</label>

            <input id="inptFisica" type="radio" name="optradio" value="fisica" checked="">
            <label for="inptFisica">Pessoa Fisica</label>
        </p>

        <!-- Pessoa Jurídica -->
        <form class="form-horizontal" id="juridica" role="form" method="POST" action="{{ route('register') }}" style="display:none;">
            {{ csrf_field()  }}
            <input type="hidden" name="tipo" value="1" />

            <label class="form">Nome Fantasia</label>
            <input type="text" name="nome" required="" size="30">
            </br>

            <label class="form">CNPJ </label>
            <input type="text" name="cnpj" required="" size="30">
            </br>

            <label class="form">Endereço </label>
            <input type="text" name="endereço" required="" size="30">
            </br>

            <label class="form">Email </label>
            <input type="email" name="email" required="" size="30">
            </br>

            <label class="form">Senha </label>
            <input type="password" name="password" size="30">
            </br>

            <label class="form">Link </label>
            <input type="text" name="link" size="30">
            </br>

            <label class="form">Categoria </label>
            <select id="appearance-select">
                <option selected="" disabled="">Caterogias</option>
                <option>Categoria 1</option>
                <option>Categoria 2</option>
                <option>Categoria 3</option>
            </select> </br></br>

            <label class="form">Descrição </label>
            <textarea id="msg"rows="3" cols="30" maxlength="50" name="descriçao" size="80"></textarea>
            </br></br>

            <label class="form">Foto de Capa </label>
            <input type="file" name="imagem" size="30">
            </br>

            <input class="btn-submit" type="submit" name="cadastrar" value="Cadastrar">
        </form>

        <!-- Pessoa Física -->
        <form  action="{{ route('register') }}" method="POST" id="fisica" style="display:fixed;" enctype="multipart/form-data">
            {{ csrf_field()  }}
            @include('components.alert.composite')
            <input type="hidden" name="tipo" value="2">

            <label class="form">Nome</label>
            <input type="text" name="nome" size="30" value="{{ old('nome') }}">
            </br>

            <label class="form">CPF</label>
            <input type="text" name="cpf" size="30" value="{{ old('cpf') }}">
            </br>

            <label class="form">Email </label>
            <input type="email" name="email" size="30" value="{{ old('email') }}">
            </br>

            <label class="form">Senha </label>
            <input type="password" name="password" size="30">
            </br></br>

            <label class="form">Foto do Perfil - File </label>
            <input type="file" name="imagem">
            </br>

            <input class="btn-submit" type="submit" name="cadastrar" value="Cadastrar">
        </form>

    </div>
@endsection

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