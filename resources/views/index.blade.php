@extends('layout.main')
@section('title','Principal')

@section('content') 
    
    <div id="map"></div> 
    
@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-VqnebGrmB1-1Fft60pG-_yYvvQ4kcLE&callback=initMap">
</script>
<script src="/js/mapa.js"></script> 
@endsection