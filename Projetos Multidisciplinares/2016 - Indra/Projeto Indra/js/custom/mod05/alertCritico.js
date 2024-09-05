 var myLatLng = {lat: -21.9695, lng: -46.7989};
 function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      scrollwheel: true,
      zoom: 16
  });

  var marker = new google.maps.Marker({
      map: map,
      position: myLatLng
  });
}
$ (document).ready(function() {

    var idUser = $('#idUser').val(),
    idAlerta;
    getIdAlerta();

    function atualizarId(data){
        idAlerta = data;
    }
    function getIdAlerta(){
        $.ajax({
            url: '../../class/mod05/alertas/critico/getLastId.php',
            success: function(data) {
             atualizarId(data);
             loopAlerta();
         }
     });
    }

    function loopAlerta(){
        verificarAlerta();
        window.setInterval(function(){
            verificarAlerta();
        }, 1 * 20 * 1000);
    }

    function verificarAlerta(){
        $.ajax({
            url: '../../class/mod05/alertas/critico/verificarAlerta.php',
            type: 'post',
            dataType: 'json',
            data: {
                idUser: idUser,
                lastId: idAlerta
            },
            success: function(data){
                if(data != false){
                    var html = '';
                    if(data.fonte == "user"){
                        html = '<br>' +
                        '<a id="fecha-alerta"  style="float: right; margin: 2em 2em; text-decoration: none; color: white; cursor: pointer;" class="glyphicon glyphicon-remove"></a>' +
                        '<div class="container">' +
                        '<div class="row">' +
                        '<div class="col-lg-12 text-center"><br><br>' +
                        '<h2>Alerta de ' + data.tipoAlerta + '</h2>' +
                        '<img class="icon-alerta" src="' + data.caminhoIMG + '">' +
                        '<div>' +
                        '<div class="alerta-text">' +
                        '<p>' + data.rua + '</p>' +
                        '<p>' + data.bairro + '</p>' +
                        '<p>' + data.cidade + '</p>' +
                        '</div>' +
                        '<div class="alerta-text">' +
                        '<p>Relatado por um usuário</p>' +
                        '<p>Hora: ' + data.hora+ '</p>' +
                        '<p>Para mais informações <a style="font-weight: bold; color: white" href="http://localhost/integracao/indra/mod05/historicoTabular.html">CLIQUE AQUI!</a></p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                        $('.alerta').html(html);
                        $('.alerta').show();
                        atualizarId(data.idAlerta);
                    }else{
                        html = '<br>' +
                        '<a id="fecha-alerta"  style="float: right; margin: 2em 2em; text-decoration: none; color: white; cursor: pointer;" class="glyphicon glyphicon-remove"></a>' +
                        '<div class="container">' +
                        '<div class="row">' +
                        '<div class="col-lg-12 text-center"><br><br>' +
                        '<h2>Alerta de ' + data.tipoAlerta + '</h2>' +
                        '<img class="icon-alerta" src="' + data.caminhoIMG + '">' +
                        '<div>' +
                        '<div class="alerta-text">' +
                        '<p>PCD #' + data.idPCD + '</p>' +
                        '<p>Cidade: ' + data.cidade + '</p>' +
                        '<p>Latitude: ' + data.latitude + '</p>' +
                        '<p>Longitude: ' + data.longitude + '</p>' +
                        '</div>' +
                        '<div class="alerta-text">' +
                        '<p>Hora: ' + data.hora + '</p>' +
                        '<p>' + data.tipoMedicao + ' normal: ' + data.valorMin + data.simboloMedicao +' - ' + data.valorMax + data.simboloMedicao +'</p>' +
                        '<p>' + data.tipoMedicao + ' atual: ' + data.valorMedicao + data.simboloMedicao +'</p>' +
                        '<p>Para mais informações <a style="font-weight: bold; color: white" href="http://localhost/integracao/indra/mod05/historicoTabular.html">CLIQUE AQUI!</a></p>' +
                        '</div>' +
                        '</div>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<div id="map"></div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                        $('.alerta').html(html);
                        $('.alerta').show();
                        myLatLng = {lat: +data.latitude, lng: +data.longitude};
                        initMap();
                        atualizarId(data.idAlerta);
                    }
                }
            },
            error: function(data){
                console.log(data);
            }

        });
    }

    $(".alerta").on('click', 'a#fecha-alerta', function() {
        $(".alerta").hide();
    });


});
