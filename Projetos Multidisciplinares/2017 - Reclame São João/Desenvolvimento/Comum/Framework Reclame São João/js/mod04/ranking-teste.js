var idEst =0;
var chart;
var gerado = false;


  $(function() {

    $('#busca').on('input', limpaCampos);

    var parametro;
    $( "#busca" ).autocomplete({
      minLength: 2,
      source: function( request, response ) {
        $.ajax({
          url: "consulta.php",
          dataType: "json",
          data: {
            acao: 'autocomplete',
            parametro: $('#busca').val()
          },
          success: function(data) {
            response(data);
          }
        });
      },
      select: function( event, ui ) {
        $("#busca").val( ui.item.EST_NOME_FANTASIA );
        parametro = ui.item.EST_ID;
        chamarEach(parametro);
        chamarEachN(parametro);
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
      .append( "<a>" + item.EST_NOME_FANTASIA + "</a><br>" )
      .appendTo( ul );
    };


    function carregarDados(){
      var busca = $('#busca').val();

      if(busca != "" && busca.length >= 2){
        $.ajax({
          url: "consulta.php",
          dataType: "json", 
          data: {
            acao: 'consulta',
            parametro: parametro
          },
          success: function( data ) {
            $('#idEstabelecimento').val(data[0].EST_ID);
            idEst = data[0].EST_ID;


          }
        });
      }
    }

    function limpaCampos(){
      var busca = $('#busca').val();

      if(busca == ""){
        $('#codigo_barra').val('');
        $('#titulo_livro').val('')
        $('#categoria').val('');
        $('#valor_compra').val('');
        $('#valor_venda').val('');
        $('#data_cadastro').val('');
        $('#status').val('')
      }
    }
  });





  var seriesOptions = [],
  seriesCounter = 0,
  names = ['TOTAIS', 'SOLUCIONADAS'];

/**
 * Create the chart when all data is loaded
 * @returns {undefined}
 */
 function createChart() {


  Highcharts.setOptions({ 
    global: {
      useUTC: true
    },
    lang: {
      contextButtonTitle: "Chart context menu",
      decimalPoint: ",",
      downloadJPEG: "Baixar imagem JPEG",
      downloadPDF: "Baixar documento PDF",
      downloadPNG: "Baixar imagem PNG",
      downloadSVG: "Baixar vetor SVG",
      loading: "Carregando...",
      months: [ "Janeiro" , "Fedvereiro" , "Março" , "Abril" , "Maio" , "Junho" , "Julho" , "Agosto" , "Setembro" , "Outubro" , "Novembro" , "Dezembo"],
      numericSymbolMagnitude: 1000,
      numericSymbols: [ "k" , "M" , "G" , "T" , "P" , "E"],
      printChart: "Imprimir gráfico",
      rangeSelectorFrom: "de",
      rangeSelectorTo: "até",
      rangeSelectorZoom: "Zoom",
      resetZoom: "Resetar zoom",
      resetZoomTitle: "Resetar nível do zoom para 1:1",
      shortMonths: [ "Jan" , "Fev" , "Mar" , "Abr" , "Mai" , "Jun" , "Jul" , "Ago" , "Set" , "Out" , "Nov" , "Dez"],
      thousandsSep: " ",
      weekdays: ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"]
    }
  });

  chart = new Highcharts.stockChart('ranking2', {



    rangeSelector: {
      selected: 5
    },

    yAxis: {
      labels: {
      },
      plotLines: [{
        value: 1,
        width: 2,
        color: 'silver'
      }],
      min: 0
    },

    plotOptions: {
      series: {
        compare: 'value',
        showInNavigator: true,
        fillColor: null,
      }
    },

    tooltip: {
      pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y:,.0f}</b><br/>',
      valueDecimals: 2
    },

    series: seriesOptions
  },

  );


}


function chamarEach(id) {

  $.each(names, function (i, name) {
    $.getJSON('/php/mod04/json-' + name.toLowerCase() + '.php?id='+id,    function (data) {
      seriesOptions[i] = {
        name: name,
        data: data
      };

      seriesCounter += 1;
      if (seriesCounter === names.length) {
        createChart();
        seriesCounter=0;
      }
    });
  });
}
