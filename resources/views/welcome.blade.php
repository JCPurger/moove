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
	
	}
	#map {
		height: 100%;
		width: 85%;
		float: left;
	}
</style>


<div id="categorias">
	<h1>Categorias</h1>
</div>
<div id="map"></div>	

@stop