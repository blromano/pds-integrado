var idEst =0;
var chart;
var gerado = false;
$(document).ready(function(){
  $("#ranking2").hide();
  $("#campo").hide();
  $("#ranking3").hide();
  $("#ranking4").hide();
  $("#tabela1").hide();
  $("#tabela2").hide();
  $("#tabela3").hide();
  $("#comp1").hide();
  $("#ft1").hide();
  $("#lt1").hide();


  $("#r1").click(function(){
    $("#campo").hide();
    $("#ranking1").show();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#r2").click(function(){
    $("#campo").show();
    $("#ranking2").show();
    $("#ranking1").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#r3").click(function(){
    $("#campo").show();
    $("#ranking3").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#r4").click(function(){
    $("#campo").hide();
    $("#ranking4").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#t1").click(function(){
    $("#campo").hide();
    $("#tabela1").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#t2").click(function(){
    $("#campo").hide();
    $("#tabela2").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#t3").click(function(){
    $("#campo").hide();
    $("#tabela3").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#c1").click(function(){
    $("#campo").hide();
    $("#comp1").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });
  $("#f1").click(function(){
    $("#campo").hide();
    $("#ft1").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#lt1").hide();
  });
  $("#l1").click(function(){
    $("#campo").hide();
    $("#lt1").show();
    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
  });
  $(".hideAll").click(function(){
    $("#campo").hide();

    $("#ranking1").hide();
    $("#ranking2").hide();
    $("#ranking3").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
  });


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

var seriesOptionsN = [],
seriesCounterN = 0,
namesN = ['TOTAIS'];

function createChartN() {

  Highcharts.setOptions({ 
    global: {
      useUTC: false
    },
    lang: {
      contextButtonTitle: "Chart context menu",
      decimalPoint: ",",
      downloadJPEG: "Baixar imagem JPEG",
      downloadPDF: "Baixar documento PDF",
      downloadPNG: "Baixar imagem PNG",
      downloadSVG: "Baixar vetor SVG",
      loading: "Carregando...",
      months: [ "Janeiro" , "Fevereiro" , "Março" , "Abril" , "Maio" , "Junho" , "Julho" , "Agosto" , "Setembro" , "Outubro" , "Novembro" , "Dezembo"],
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

  Highcharts.stockChart('ranking3', {

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


    series: seriesOptionsN
  });
}

function chamarEachN(id) {

  $.each(namesN, function (i, name) {

    $.getJSON('/php/mod04/json-' + name.toLowerCase() + '.php?id='+id,    function (data) {

      seriesOptionsN[i] = {
        name: name,
        data: data
      };

      seriesCounterN += 1;

      if (seriesCounterN === namesN.length) {
        createChartN();
        seriesCounterN=0;
      }
    });
  });
}

});







document.getElementById("c1").onclick = function(){
  document.getElementById("graficoResponsivo").innerHTML = "<form action=\"/action_page.php\">  <select name=\"cars\"><option value=\"Empresa 1\">Empresa 1</option>   <option value=\"Empresa 2\">Empresa 2</option><option value=\"Empresa 3\">Empresa 3</option>    <option value=\"Empresa 4\">Empresa 4</option></select><br><br>  </form><form action=\"/action_page.php\">  <select name=\"cars\"><option value=\"Empresa 1\">Empresa 1</option>   <option value=\"Empresa 2\">Empresa 2</option><option value=\"Empresa 3\">Empresa 3</option>    <option value=\"Empresa 4\">Empresa 4</option></select><br><br>  <input type=\"submit\"></form><h2>Comparação entre estabelecimentos de mesma categoria</h2><canvas  id=\"myChart\" width=\"400\" height=\"400\"></canvas>";

  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
      {
        label: "Empresa 01",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "rgba(75,192,192,0.4)",
        borderColor: "rgba(75,192,192,1)",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "rgba(75,192,192,1)",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75,192,192,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: [44, 12, 55, 77, 11, 12, 89],
        spanGaps: false,
      },
      {
        label: "Empresa 02",
        fill: true,
        lineTension: 0.1,
        backgroundColor: "rgba(26, 226, 76, 0.2)",
        borderColor: "rgba(27, 233, 47, 1)",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "rgba(75, 193, 126, 1)",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75, 193, 80, 1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: [65, 59, 80, 81, 56, 55, 40],
        spanGaps: false,
      }
      ]
    }
  });


};

var empresa = false;
document.getElementById("l1").onclick = function(){
  document.getElementById('empresaLogada').style.display = 'block';
};

document.getElementById("f1").onclick = function(){
  document.getElementById('formulario').style.display = 'block';
  document.getElementById('ocultar').style.display = 'none';
};




