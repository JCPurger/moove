@extends('layout.main')
@section('title','Principal')

@section('sidebar')
    <ul id="sidebar" class="nav navbar-nav side-nav active">
        <li class="sidebar-brand">
            <a id="menu-toggle" href="#">Categorias<span id="main_icon"
                                                         class="glyphicon glyphicon-align-justify"></span></a>
        </li>
        <li>
            <a href="investigaciones/favoritas"><span class="badge">50</span> CATEGORIA 3</a>
        </li>
        <li>
            <a href="sugerencias"><span class="badge">10</span> CATEGORIA 4</a>
        </li>
        <li>
            <a href="faq"><span class="badge">25</span> CATEGORIA 5</a>
        </li>
        {{-- <li>
             <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  MENU 2 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
             <ul id="submenu-2" class="collapse">
                 <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.1</a></li>
                 <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.2</a></li>
                 <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.3</a></li>
             </ul>
         </li> --}}
    </ul>
@endsection

@section('content')

    <div id="map"></div>

@endsection

@section('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-VqnebGrmB1-1Fft60pG-_yYvvQ4kcLE&callback=initMap"></script>
    <script src="/js/mapa.js"></script>
@endsection