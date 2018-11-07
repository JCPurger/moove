@extends('layout.main')
@section('title','Principal')

@section('sidebar')
    <ul id="sidebar" class="nav navbar-nav side-nav active">
        <li class="sidebar-brand">
            <a id="menu-toggle" href="#">Categorias<span id="main_icon"
                                                         class="glyphicon glyphicon-align-justify"></span></a>
        </li>
        <li>
            <a href="#" class="category-filter" data-id="0">Remover filtro</a>
        </li>
        @foreach($categories as $category)
            <li>
                <a href="#" class="category-filter" data-id="{{ $category->id }}"><span class="badge">{{ $category->places()->count() }}
                    </span> {{ $category->nome }}</a>
            </li>
        @endforeach
    </ul>
@endsection

@section('content')
    <div id="map"></div>

    @if(session('registered'))
        <!-- Modal -->
        <div class="modal fade text-center py-5" style="top:30px" id="thanksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ asset('img/logo_p.png') }}" style="width: 200px;" class="modal-img">
                        {!! session('registered') !!}
                        {{--<h3 class="pt-5 mb-0 text-secondary">Bem vindo!</h3>--}}
                        {{--<p class="pb-3 text-muted">Agora você pode usufruir de todos os recursos =D</p>--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Vamos lá!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-VqnebGrmB1-1Fft60pG-_yYvvQ4kcLE&callback=initMap"></script>
    <script src="/js/mapa.js"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#thanksModal').modal('show');
        });
    </script>
@endsection