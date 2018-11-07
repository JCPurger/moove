var map;
var markers = [];

function initMap()
{
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(-22.9012387, -43.2542323),
        gestureHandling: 'greedy',
        zoomControl: true,
        scaleControl: true,
        streetViewControl: true,
        rotateControl: true,
        fullscreenControl: true,
        mapTypeControl: true
    });

    carregarPontos();
    addFavorito();
    avaliar();
    filtro();
    // Carrega todos os pontos toda vez que o mapa for mexido
    // map.addListener('bounds_changed', function (e) {
    //     carregarPontos();
    // });

}


/************************************
 *** INI FUNCOES DO PROJETO EM SI ***
 ************************************/
function carregarPontos(filtro)
{
    $.ajax({
        type: 'POST',
        url: '/places/api/getAll',
        dataType: 'json',
        data: {filtro: filtro},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
        .done(function (pontos) {
            $.each(pontos, function (index, ponto) {
                // var icon = {
                //     url: "img/icon.png", // url
                //     scaledSize: new google.maps.Size(15, 15), // scaled size
                //     origin: new google.maps.Point(0, 0), // origin
                //     anchor: new google.maps.Point(0, 0) // anchor
                // };

                var infowindow = new google.maps.InfoWindow();

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(ponto.place.latitude, ponto.place.longitude),
                    title: "Ponto " + ponto.place.id,
                    // map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(ponto.template);
                        infowindow.open(map, marker);
                    }
                })(marker));

                markers.push(marker);

                //ESTILO DO MARKER NO ESCOPO DO MAPS
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

            });
            setMapOnAll(map);
        })
        .fail(function () {
            alert('Um erro inesperado ocorreu e os lugares não poderam ser carregados. Entre em contato conosco para reportar o erro.');
            console.log("error get points-places");
        })
        .always(function () {

        });
}

function avaliar()
{
    $('body').on('click', '.add-vote', function () {
        console.log('ENVIANDO AVALIACAO !');
        var $el = $(this);
        var $id = $el.data('id');

        $.ajax({
            url: '/evaluate',
            type: "POST",
            dataType: "json",
            data: {
                id:     $id,
                tipo:  $el.data('value')
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status) {
                    if ($el.data('value')) {
                        $el.css('color', '#1a29f2');
                    }else {
                        $el.css('color', '#FF0000');
                    }

                    $el.siblings('.add-vote').css('color', '#7a7a7a');
                }else {
                    $el.css('color', '#7a7a7a');

                    alert(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            },
            // called when the request finishes (after success and error callbacks are executed)
            complete: function (jqXHR, textStatus) {

            }
        });
    });
}

function addFavorito()
{
    $('body').on('click', '.add-favorite', function () {
        var $favoriteB = $(this);
        var $id = $favoriteB.data('id');

        $.ajax({
            url: '/favorites/toggle',
            type: 'POST',
            dataType: 'json',
            data: {id: $id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function (data) {
                if (data.status)
                    $favoriteB.css('color', '#FF0000');
                else
                    $favoriteB.css('color', '#7A7A7A');

                alert(data.msg);
            })
            .fail(function () {
                console.log("Error add favorites");
            })
            .always(function () {

            });
    });
}

function filtro()
{
    $('body').on('click', '.category-filter', function (e) {
        e.preventDefault();
        deleteMarkers();
        carregarPontos($(this).data('id'));
    });
}

/************************************
 *** FIM FUNCOES DO PROJETO EM SI ***
 ************************************/


/*********************************************
 *** INI FUNCOES DE MANIPULACAO DE MARKERS ***
 *********************************************/

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}

/*********************************************
 *** FIM FUNCOES DE MANIPULACAO DE MARKERS ***
 *********************************************/