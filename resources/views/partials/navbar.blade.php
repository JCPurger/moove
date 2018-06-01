

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo_p.png') }}" alt="LOGO">
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="registro">
            @if (!Auth::check())
            <a href="{{ route('register') }}">
                <span class="glyphicon glyphicon-edit"></span>
                @lang('Registrar-se')
            </a>
            @endif
        </li>
    <li class="dropdown">
        @if (!Auth::check())
        <a href="{{ route('login') }}">
            <span class="glyphicon glyphicon-log-in"></span>
            @lang('navigation.entrar')
        </a>
        @else
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nome }} <b class="fa fa-angle-down"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('editProfile') }}"><i class="fa fa-fw fa-user"></i> Editar perfil</a></li>
            @if(Auth::user()->isCompany())
            <li><a href="{{ route('places.index') }}"><i class="fa fa-fw fa-map-marker"></i> Lugares</a></li>
            @endif
            @if(!Auth::user()->isCompany())
            <li><a href="{{ route('favorites.index') }}"><i class="fa fa-fw fa-heart"></i> Favoritos</a></li>
            @endif
            <li class="divider"></li>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
    @endif
</li>
</ul>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav" id="menu">
        <li><a href="/movase">Mova-se</a></li>
        <li><a href="/ranking">Ranking</a></li>
        <li><a href="/contato">Contato</a></li>

        <!--BUSCAR-->
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="@lang('navigation.buscar')"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
        <!--BUSCAR-->

    </ul>

    @yield('sidebar')

</div>
<!-- /.navbar-collapse -->
</nav>


@if(Auth::check())
<!-- Modal -->
<div class="modal fade text-center py-5" style="top:30px" id="thanksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ asset('img/logo_p.png') }}" style="width: 200px;" class="modal-img">
                <h3 class="pt-5 mb-0 text-secondary">Bem vindo!</h3>
                <p class="pb-3 text-muted">Pronto para se mover?</p>
                 <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Vamos lá!</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endif 

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
$(window).on('load', function() {
    $('#thanksModal').modal('show');
});
</script>