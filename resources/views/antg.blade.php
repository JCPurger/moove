@extends('layout.main2')
@section('title','Principal')

@section('content')	
	<style>
		body,html{
			width: 100%;
			height: 100%;
		}
		
		#content{
			width: 100%;
			height: 100%;
		}

		#categorias{
			float: left;
			width: 15%;
			height: 100%;
			font-size: 16px;
		    background-color: blue;
		}
        
        #categorias .list-group .list-group-item{
        	border-radius: 10px !important;
        	margin: 1px;
        	background-color: rgba(0,0,0, .6);
        	color: white;
        	border: 0px !important;
        }

        #categorias .list-group .list-group-item:hover{
        	background-color: rgba(255,255,255, .6);
        }
		
		#map {
			height: 100%;
			width: 85%;
			float: left;
		}
        .tamanho {
            width: 30%;
            white-space: normal;
        }
        .btn-info {
            background-color: #4119BF;
        
        }
        h1 {
            font-family: 'Acme';
            color: orange;
         
        }
	</style>


	<div id="categorias">
		<ul class="list-group">
			<li class="list-group-item">Restaurantes<span class="badge">50</span></li> 
			<li class="list-group-item">Hospitais<span class="badge">100+</span></li> 
			<li class="list-group-item">Praças<span class="badge">5</span></li> 
			<li class="list-group-item">Restaurantes<span class="badge">50</span></li> 
			<li class="list-group-item">Hospitais<span class="badge">5</span></li> 
			<li class="list-group-item">Praças<span class="badge">50</span></li> 
			<li class="list-group-item">Restaurantes<span class="badge">3</span></li> 
			<li class="list-group-item">Hospitais<span class="badge">3</span></li> 
			<li class="list-group-item">Praças<span class="badge">3</span></li> 
		</ul>
	</div>

	<div id="map"></div>	

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-VqnebGrmB1-1Fft60pG-_yYvvQ4kcLE&callback=initMap">
	</script>
	<script src="/js/mapa.js"></script> 
	
@endsection