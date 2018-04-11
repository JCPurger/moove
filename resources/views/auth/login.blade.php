@extends('layout.main')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="loginmodal-container">
                <h1>Entre com sua conta</h1><br>
                @include('components.alert.composite')
                <form id="login-form" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <input type="text" data-parsley-type="email" data-parsley-errors-messages-disabled name="email" placeholder="E-mail" required>
                    <input type="password" data-parsley-errors-messages-disabled name="password" placeholder="Senha" required>
                    <input type="submit" name="login" class="login loginmodal-submit" value="Entrar" id="login-submit">
                </form>

                <div class="login-help">
                    <a href="{{ route('register') }}">Registrar-se</a> - <a href="{{ route('password.request') }}">Esqueci a senha</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function(){
            $('#login-form').parsley();
        });
    </script>
@endsection
