var map;

function initMap() {
	var latlng = new google.maps.LatLng(-22.9012387,-43.2542323);
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 5,
		center: latlng,
		gestureHandling: 'greedy',
		zoomControl: true,
		scaleControl: true,
		streetViewControl: true,
		rotateControl: true,
		fullscreenControl: true,
		mapTypeControl: true
	});
	

	carregarPontos();
}

function carregarPontos() {  
	$.getJSON('/js/pontos.json', function(pontos) {
		$.each(pontos, function(index, ponto) {

			var icon = {
			    url: "img/icon.png", // url
			    scaledSize: new google.maps.Size(15, 15), // scaled size
			    origin: new google.maps.Point(0,0), // origin
			    anchor: new google.maps.Point(0, 0) // anchor
			};

			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
				title: "Meu ponto personalizado! :-D",
				map: map
			});

			var infowindow = new google.maps.InfoWindow(), marker;

			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent('');
					infowindow.open(map, marker);
				}
			})(marker))

		});

	});

}