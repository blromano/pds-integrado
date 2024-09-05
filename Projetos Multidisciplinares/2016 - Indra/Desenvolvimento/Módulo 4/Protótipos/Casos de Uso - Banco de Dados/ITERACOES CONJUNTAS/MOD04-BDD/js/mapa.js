$(function () {
    var map;

    var idInfoBoxAberto;
    var infoBox = [];
    var markers = [];
    var latitude;
    var longitude;

    var geocoder;
    var marker;

    function initialize()
    {
        var latlng = new google.maps.LatLng(-8.631288, -46.309812);
        var mapProp = {
            center: latlng,
            zoom: 4,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("mapa"), mapProp);
        var marcador = new google.maps.Marker({
            position: new google.maps.LatLng(-21.948295, -46.718936),
            title: "PCD0",
            icon: 'img/marcador_pcd.png',
            map: map,
        });

        //marcador.setMap(map);

        var conteudo = '<div style="color:#12587C">' +
                '<div style="color:#0000FF;">PCD de Águas da Prata</div>' +
                '<div style="color:#000000; left: 0px;">Dados</div>' +
                '<div style="color:#000000;">Temperatura média: ...ºC</div>' +
                '<div style="color:#000000;">Umidade: ...%</div>' +
                '<div style="color:#000000;">Pressão: ...hPa</div>' +
                '<div style="color:#000000;">Precipitação: ...mm</div>' +
                '<div style="color:#000000;">Latitude: -21.948295°</div>' +
                '<div style="color:#000000;">Longitude: -46.718936°</div>' +
                '<div style="color:#000000;"><a href="ferramenta4.html" target="._blank.">Saiba mais...</a></div>' +
                '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: conteudo,
            // Atribuir um valor máximo para a largura da infowindow permite
            // maior controlo sobre os vários elementos do conteúdo
            maxWidth: 350
        });
        // Procedimento que mostra a Info Window através de um click no marcador
        google.maps.event.addListener(marcador, 'click', function () {
            infowindow.open(map, marcador); // map e marker são as variáveis definidas anteriormente
        });
        // Evento que fecha a infoWindow com click no mapa
        google.maps.event.addListener(map, 'click', function () {
            infowindow.close();
        });

        // Evento que detecta o click no mapa para criar o marcador
//        google.maps.event.addListener(map, "click", function (event) {
//
//            // O evento "click" retorna a posição do click no mapa,
//            // através dos métodos latLng.lat() e latLng.lng().
//
//            // Passamos as respectivas coordenadas para as variáveis lat e lng
//            // para posterior referência.
//            // Utilizamos o método toFixed(6) para limitar o número de casas decimais.
//            // A API ignora os valores além da 6ª casa decimal
//            var lat = event.latLng.lat().toFixed(6);
//            var lng = event.latLng.lng().toFixed(6);
//            latitude = lat;
//            longitude = lng;
//            // A criação do marcador é feita na função createMarker() e
//            // passamos os valores das coordenadas do click através
//            // dos parâmetros lat e lng.
//
//
//            // getCoords() actualiza os valores de Latitue e Longitude
//            // das caixas de texto existentes no topo da página
//            getCoords(lat, lng);
//        });
//    google.maps.event.addListener(marker, 'click', function () {
//        infowindow.open(map, marker);
//    });

        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            animation: google.maps.Animation.BOUNCE,
            map: map,
            draggable: true,
            title: "Está Aqui!",
            icon: 'img/marcador_pessoa.png'
        });
        //marker.setPosition(latlng);
    }

// Função que actualiza as caixas de texto das coordenadas
//    function getCoords(lat, lng) {
//
//// Referência ao elemento HTML (input) com o id 'lat'
//        var coords_lat = document.getElementById('txtLatitude');
//        // Actualiza o valor do input 'latitude'
//        coords_lat.value = lat;
//        // Referência ao elemento HTML (input) com o id 'lng'
//        var coords_lng = document.getElementById('txtLongitude');
//        // Actualiza o valor do input 'longitude'
//        coords_lng.value = lng;
//    }

//google.maps.event.addDomListener(window, 'load', initialize);

    $(document).ready(function () {
        initialize();
        function carregarNoMapa(endereco) {
            geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                        $('#txtEndereco').val(results[0].formatted_address);
                        $('#txtLatitude').val(latitude);
                        $('#txtLongitude').val(longitude);
                        var location = new google.maps.LatLng(latitude, longitude);
                        marker.setPosition(location);
                        map.setCenter(location);
                        map.setZoom(16);
                    }
                } else {

                    alert("Pesquisa Inválida!");
                }
            })
        }

        $("#btnEndereco").click(function () {
            if ($(this).val() != "")
                carregarNoMapa($("#txtEndereco").val());
        })

        $("#txtEndereco").blur(function () {
            if ($(this).val() != "")
                carregarNoMapa($(this).val());
        })

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#txtEndereco').val(results[0].formatted_address);
                        $('#txtLatitude').val(marker.getPosition().lat());
                        $('#txtLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
//        $("#txtEndereco").autocomplete({
//            source: function (request, response) {
//                geocoder.geocode({'address': request.term + ', Brasil', 'region': 'BR'}, function (results, status) {
//                    response($.map(results, function (item) {
//                        return {
//                            label: item.formatted_address,
//                            value: item.formatted_address,
//                            latitude: item.geometry.location.lat(),
//                            longitude: item.geometry.location.lng()
//                        }
//                    }));
//                })
//            },
//            select: function (event, ui) {
//                $("#txtLatitude").val(ui.item.latitude);
//                $("#txtLongitude").val(ui.item.longitude);
//                var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
//                marker.setPosition(location);
//                map.setCenter(location);
//                map.setZoom(16);
//            }
//        });
//        $("form").submit(function (event) {
//            event.preventDefault();
//            var endereco = $("#txtEndereco").val();
//            var latitude = $("#txtLatitude").val();
//            var longitude = $("#txtLongitude").val();
//            alert("Endereço: " + endereco + "\nLatitude: " + latitude + "\nLongitude: " + longitude);
//        });
    });
    function abrirInfoBox(id, marker) {
        if (typeof (idInfoBoxAberto) == 'number' && typeof (infoBox[idInfoBoxAberto]) == 'object') {
            infoBox[idInfoBoxAberto].close();
        }

        infoBox[id].open(map, marker);
        idInfoBoxAberto = id;
    }

    function carregarPontos() {

        $.getJSON('js/pontos.json', function (pontos) {

            var latlngbounds = new google.maps.LatLngBounds();
            $.each(pontos, function (index, ponto) {

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
                    title: ponto.Titulo,
                    icon: 'img/marcador_pcd.png'
                });
                var myOptions = {
                    content: "<p>" + ponto.Descricao + "</p>",
                    pixelOffset: new google.maps.Size(0, 0)
                };
                infoBox[ponto.Id] = new InfoBox(myOptions);
                infoBox[ponto.Id].marker = marker;
                infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
                    abrirInfoBox(ponto.Id, marker);
                });
                markers.push(marker);
                latlngbounds.extend(marker.position);
            });
            var markerCluster = new MarkerClusterer(map, markers);
            map.fitBounds(latlngbounds);
        });
    }

    google.maps.event.addDomListener(window, 'load', carregarPontos);
});