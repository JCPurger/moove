var map;

function initMap() {
    var latlng = new google.maps.LatLng(-22.9012387, -43.2542323);
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

    map.addListener('bounds_changed', function (e) {
        carregarPontos();
    });

}

function carregarPontos() {
    //setMapOnAll(null);
    $.ajax({
        url: '/places',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
        .done(function (pontos) {
            $.each(pontos, function (index, ponto) {
                console.log(ponto.template);
                var icon = {
                    url: "img/icon.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
                    origin: new google.maps.Point(0, 0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(ponto.place.latitude, ponto.place.longitude),
                    title: "Ponto " + ponto.place.id,
                    map: map
                });

                var infowindow = new google.maps.InfoWindow(), marker;

                google.maps.event.addListener(infowindow, 'domready', function () {

                    var iwOuter = $('.gm-style-iw');
                    var iwBackground = iwOuter.prev();
                    // Remover o div da sombra do fundo
                    iwBackground.children(':nth-child(2)').css({'display': 'none'});
                    // Remover o div de fundo branco
                    iwBackground.children(':nth-child(4)').css({'display': 'none'});
                    iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                        return s + 'overflow = hidden'
                    });
                    // Desloca a sombra da seta a 76px da margem esquerda
                    iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                        return s + 'left: 76px !important;'
                    });
                    // Desloca a seta a 76px da margem esquerda
                    iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                        return s + 'left: 76px !important;'
                    });

                    // Altera a cor desejada para o contorno da cauda.
                    // O contorno da cauda é composto por dois descendentes do div que contem a cauda.
                    // O método .find('div').children() faz referência a todos os div que sejam os descendentes directos do div anterior.
                    iwBackground.children(':nth-child(3)').find('div').children().css({
                        'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px',
                        'z-index': '1'
                    });
                    iwOuter.children().children().css({'overflow': 'hidden'});
                    iwOuter.next().css({'right': '126px', 'top': '43px'});

                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(ponto.template);
                        infowindow.open(map, marker);
                    }
                })(marker))

            });
        })
        .fail(function () {
            console.log("error get points-places");
        })
        .always(function () {

        });

}

// Sets the map on all markers in the array.
// function setMapOnAll(map) {
// 	for (var i = 0; i < markers.length; i++) {
// 	  markers[i].setMap(map);
// 	}
// }