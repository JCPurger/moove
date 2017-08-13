@extends('layout.main')
@section('title','Principal')

@section('content')

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-VqnebGrmB1-1Fft60pG-_yYvvQ4kcLE&callback=initMap">
	</script>
	<script src="/js/mapa.js"></script> 
	
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
			float: right;
			width: 15%;
			height: 100%;
		    color: #4119BF;
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
          <div class="btn-group-vertical" role="group">
                <h1>Categorias:</h1>
                <button type="button" class="btn btn-info tamanho">Restaurantes</button>
                <button type="button" class="btn btn-info tamanho">Hospitais</button>
                <button type="button" class="btn btn-info tamanho">Praças</button>
                <button type="button" class="btn btn-info tamanho">Restaurantes</button>
                <button type="button" class="btn btn-info tamanho">Hospitais</button>
                <button type="button" class="btn btn-info tamanho">Praças</button>
                <button type="button" class="btn btn-info tamanho">Restaurantes</button>
                <button type="button" class="btn btn-info tamanho">Hospitais</button>
                <button type="button" class="btn btn-info tamanho">Praças</button>
            </div>
    
        </div>


	<div id="map"></div>	

@endsection