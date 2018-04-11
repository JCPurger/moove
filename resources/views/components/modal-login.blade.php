{{-- MODAL LOGIN --}}
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Entre com sua conta</h1><br>
            <form id="login-form">
                {{ csrf_field() }}
                <input type="text" data-parsley-type="email" data-parsley-errors-messages-disabled name="email" placeholder="E-mail" required>
                <input type="password" data-parsley-errors-messages-disabled name="password" placeholder="Senha" required>
                <input type="submit" name="login" class="login loginmodal-submit" value="Entrar" id="login-submit">
            </form>

            <div class="login-help">
                <a href="/login">Registrar-se</a> - <a href="#">Esqueci a senha</a>
            </div>
        </div>
    </div>
</div>
{{-- MODAL LOGIN --}}

<script type="text/javascript">
    $(document).ready(function(){
        $('#login-form').parsley();


        $('#login-form').submit(function(event) {
            event.preventDefault();

            // PEGA AS INFORMAÇÕES DO FORMULÁRIO
            var formData = {
                'email' : $('input[name=email]').val(),
                'password' : $('input[name=password]').val()
            };

            $.ajax({
                url: '{{ route('login') }}',
                type: 'POST',
                dataType: 'json',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done(function(data) {
                if(data.acess){
                    $('#login-modal').modal('hide');
                    location.reload();
                }else{
                    if( !($('#login-form input[name=password]').next().get(0) == $('#login-form span').get(0)) ){
                        $('#login-form input[name=password]').after('<span>'+ data.failure +'</span>');
                    }
                }
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function(data) {
                console.log("complete");
            });
            
        });
    });
</script>