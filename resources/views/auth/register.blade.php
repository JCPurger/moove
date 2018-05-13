@extends('layout.main')


@section("content")

<!-- Conteúdo -->
<!-- Login -->
<!--Cadastro -->
<div id="form-cadas" class="container-fluid"  style="text-align:center; margin: 0 auto;">


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="usuario-form-link">Usuário</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="empresa-form-link">Empresa</a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-lg-12 well">
                        <!-- Cadastro Usuario -->
                        <form id="usuario-form" action="#" method="post" role="form" style="display: none;">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Primeiro Nome</label>
                                        <input type="text" id="nome" placeholder="Enter First Name Here.." class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Último Nome</label>
                                        <input type="text" id="sobrenome" placeholder="Enter Last Name Here.." class="form-control">
                                    </div>
                                </div>                    
                                <div class="row">                     
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" id="email" placeholder="Enter Eamil Here.." class="form-control">
                                    </div>      
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Senha</label>
                                            <input type="password" id="senha" placeholder="Enter Password Here.." class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Confirmação de Senha</label>
                                            <input type="password" id="confirmsenha" placeholder="Enter Password Here.." class="form-control">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label>Foto de Perfil</label>
                                        <input type="file" id="perfil" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-lg btn-info">Cadastrar</button> 
                                </div>                  
                            </div>
                        </form> 

                    </div>
                    <!-- Cadastro Empresa -->
                    <div class="col-lg-12 well">
                        <div class="row">
                            <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: block;">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Nome</label>
                                            <input type="text" id="nomeEmp" placeholder="Enter Name Here.." class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>CNPJ</label>
                                            <input type="text" id="cnpj" placeholder="Enter CNPJ Here.." class="form-control">
                                        </div>
                                    </div>                  
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text "id="endereco" placeholder="Enter Endereco Here.." class="form-control">
                                    </div>  
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Número</label>
                                            <input type="text" id="numero" placeholder="Enter Number Here.." class="form-control">
                                        </div>  
                                        <div class="col-sm-6 form-group">
                                            <label>Complemento</label>
                                            <input type="text" id="complemento" placeholder="Enter Complement Here.." class="form-control">
                                        </div>  
                                        <div class="col-sm-12 form-group">
                                            <label>Fotos</label>
                                            <input type="file" id="fotos" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Telefone</label>
                                                <input type="text" id="tel" placeholder="Enter Telefone .." class="form-control">
                                            </div>      
                                            <div class="col-sm-6 form-group">
                                                <label>Email</label>
                                                <input type="text" id="emailEmp" placeholder="Enter Company Name Here.." class="form-control">
                                            </div>  
                                        </div>                       
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Senha</label>
                                                <input type="password" id="senhaEmp" placeholder="Enter Password Here.." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Confirmação de Senha</label>
                                                <input type="password" id="confirmsenhaEmp" placeholder="Enter Password Here.." class="form-control">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" id="site" placeholder="Enter Website Name Here.." class="form-control">
                                        </div>
                                        <button type="button" class="btn btn-lg btn-info">Cadastrar</button>
                                    </div>                  
                                </div>
                            </form> 
                        </div>
                    </div>

                </div>

               

 @endsection

@section("scripts")
<script>
$(function() {

$('#usuario-form-link').click(function(e) {
$("#usuario-form").delay(100).fadeIn(100);
$("#empresa-form").fadeOut(100);
$('#empresa-form-link').removeClass('active');
$(this).addClass('active');
e.preventDefault();
});
$('#empresa-form-link').click(function(e) {
$("#empresa-form").delay(100).fadeIn(100);
$("#usuario-form").fadeOut(100);
$('#usuario-form-link').removeClass('active');
$(this).addClass('active');
e.preventDefault();
});
</script>
@endsection
});