@extends('layout.main')
@section('title','Lugar')

@section('content')

    <div class="col-lg-10 well lugar-cadas">
        <form class="form-cadas" action="{{ $action == 'store' ? route('places.'.$action) : route('places.'.$action,$place->id) }}" enctype="multipart/form-data" method="POST" role="form"  autocomplete="off">
            {{ $action == 'update' ? method_field('PUT') : '' }}
            {{ csrf_field() }}
            <div class="col-sm-10">
                <div class="row">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do lugar" value="{{ old('nome',@$place->nome) }}" autocomplete='name'>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Foto do Lugar</label>
                            <input type="file" id="foto" name="imagem" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Categoria</label>
                            <div class="input-group-btn">
                                <select class="form-control" name="category_id">
                                    <option>Selecione</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old("category_id",@$place->category->id) == $category->id ? "selected":"") }}>{{ $category->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label style="margin-left: 2%;">Descrição</label>
                            <textarea id="wmd-input" class="form-control wmd-input processed" name="descricao"
                                      style="width: 94%; opacity: 1; height: 120px; margin-left: 3%;">{{ old('descricao',@$place->descricao) }}</textarea>
                        </div>
                    </div>

                    <fieldset>
                        <legend>
                            Coordenadas
                        </legend>
                        <div class="form-group">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" id="geo-busca-valor" class="search-query form-control" placeholder="Busque para autocompletar os campos abaixo"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="geo-busca">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"><label for="">Endereco completo</label>
                                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereco completo" value="{{ old('endereco') }}" autocomplete='street-address' disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude do lugar" value="{{ old('latitude',@$place->latitude) }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude do lugar" value="{{ old('longitude',@$place->longitude) }}">
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-lg btn-danger">Salvar</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        /*
        *  BUSCA VIA AJAX PARA AUTOCOMPLETAR A LATITUDE E LONGITUDE
        */
        function searchGeolocation(){
            var busca = $('#geo-busca-valor').val().replace(new RegExp(' ', 'g'), '+');

            $.ajax({
                type: 'GET',
                url: 'https://maps.googleapis.com/maps/api/geocode/json',
                data: {
                    key: "AIzaSyA-VqnebGrmB1-1Fft60pG-_yYvvQ4kcLE",
                    address: busca
                },
                dataType: "json", // xml, html, script, json, jsonp, text
                success: function (data) {
                    console.log(data);
                    var result = data['results'][0];
                    isRio = false;
                    result['address_components'].forEach(function (value) {
                        if (value['types'][0] == "administrative_area_level_2") {
                            if (value['long_name'] == "Rio de Janeiro") {
                                isRio = true;
                            }
                        }
                    });
                    if (!isRio) {
                        alert('O local buscado deve estar dentro da área da cidade do Rio de Janeiro');
                    } else {
                        $('input[name="latitude"]').val(result['geometry']['location']['lat']);
                        $('input[name="longitude"]').val(result['geometry']['location']['lng']);
                        $('input[name="endereco"]').val(result['formatted_address']);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Os campos não puderam ser preenchidos, tente novamente mais tarde.');
                },
                // called when the request finishes (after success and error callbacks are executed)
                complete: function (jqXHR, textStatus) {

                }
            });
        }

        /*
         * AO CLICAR NO ICONE DE BUSCA DISPARA A FUNCAO DO GEOLOCATION
         */
        $('#geo-busca').on('click', function () {
            searchGeolocation();
        });
    </script>
@endsection