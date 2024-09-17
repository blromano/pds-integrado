var idEst =0;
var chart;
var gerado = false;

var idEst1=0;
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
  $("#ra5").hide();
  $("#ra6").hide();
  $("#comp").hide();


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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
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
    $("#ra5").hide();
    $("#ra6").hide();
    $("#comp").hide();
  });
  $("#r5").click(function(){
    $("#campo").show();
    $("#ranking2").hide();
    $("#ranking1").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
    $("#ra5").show();
    $("#ra6").hide();
    $("#comp").hide();
  });
  $("#r6").click(function(){
    $("#campo").show();
    $("#ranking2").hide();
    $("#ranking1").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").hide();
    $("#ft1").hide();
    $("#lt1").hide();
    $("#ra5").hide();
    $("#ra6").show();
    $("#comp").hide();
  });
  $("#c1").click(function(){
    $("#campo").show();
    $("#comp").show();
    $("#ranking2").hide();
    $("#ranking1").hide();
    $("#ranking3").hide();
    $("#ranking4").hide();
    $("#tabela1").hide();
    $("#tabela2").hide();
    $("#tabela3").hide();
    $("#comp1").show();
    $("#ft1").hide();
    $("#lt1").hide();
    $("#ra5").hide();
    $("#ra6").hide();
  });


  $(function() {

    $('#busca').on('input', limpaCampos);

    var parametro;
    $( "#busca" ).autocomplete({
      minLength: 2,
      source: function( request, response ) {
        $.ajax({
          url: "php/mod04/consulta.php",
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
        chamarEachPos(parametro);
        chamarEachPon(parametro);
        idEst1 = parametro;
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
          url: "php/mod04/consulta.php",
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

  $(function() {

    $('#comp').on('input', limpaCampos);

    var parametro;
    $( "#comp" ).autocomplete({
      minLength: 2,
      source: function( request, response ) {
        $.ajax({
          url: "php/mod04/consulta.php",
          dataType: "json",
          data: {
            acao: 'autocomplete',
            parametro: $('#comp').val()
          },
          success: function(data) {
            response(data);
          }
        });
      },
      select: function( event, ui ) {
        $("#comp").val( ui.item.EST_NOME_FANTASIA );
        parametro = ui.item.EST_ID;
        chamarEachComp(idEst1, parametro);
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
      .append( "<a>" + item.EST_NOME_FANTASIA + "</a><br>" )
      .appendTo( ul );
    };


    function carregarDados(){
      var busca = $('#comp').val();

      if(busca != "" && busca.length >= 2){
        $.ajax({
          url: "php/mod04/consulta.php",
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
      var busca = $('#comp').val();

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
    $.getJSON('php/mod04/json-' + name.toLowerCase() + '.php?id='+id,    function (data) {
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

    $.getJSON('php/mod04/json-' + name.toLowerCase() + '.php?id='+id,    function (data) {

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







// Histórico Posicao

var seriesOptionsPos= [],
seriesCounterPos= 0,
namesPos= ['PONTUACAO'];

function createChartPos() {

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

  Highcharts.stockChart('ra5', {

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
        // compare: 'value',
        threshold: null,
        showInNavigator: true,
        fillColor: null,
      }
    },


    series: seriesOptionsPos
  });
}

function chamarEachPos(id) {

  $.each(namesPos, function (i, name) {

    $.getJSON('php/mod04/json-posicao.php?id='+id,    function (data) {

      seriesOptionsPos[i] = {
        name: name,
        type: 'areaspline',
        data: data
      };

      seriesCounterPos += 1;

      if (seriesCounterPos === namesPos.length) {
        createChartPos();
        seriesCounterPos=0;
      }
    });
  });
}


// Histórico Pontuacao

var seriesOptionsPon= [],
seriesCounterPon= 0,
namesPon= ['PonICAO'];

function createChartPon() {

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
  Highcharts.stockChart('ra6', {

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
        // compare: 'value',
        threshold: null,
        showInNavigator: true,
        fillColor: null,
      }
    },


    series: seriesOptionsPon
  });
}

function chamarEachPon(id) {

  $.each(namesPon, function (i, name) {

    $.getJSON('php/mod04/json-pontuacao.php?id='+id,    function (data) {

      seriesOptionsPon[i] = {
        name: name,
        type: 'areaspline',
        data: data
      };

      seriesCounterPon += 1;

      if (seriesCounterPon === namesPon.length) {
        createChartPon();
        seriesCounterPon=0;
      }
    });
  });
}

// Comparacao

var seriesOptionsComp= [],
seriesCounterComp= 0,
namesComp= ['Estabelecimento 01', 'Estabelecimento 02'];

function createChartComp() {

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

  Highcharts.stockChart('comp1', {

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
        // compare: 'value',
        threshold: null,
        showInNavigator: true,
        fillColor: null,
      }
    },


    series: seriesOptionsComp
  });
}

function chamarEachComp(id, id2) {

  var ides = new Array(id,id2)



  $.each(namesComp, function (i, name) {

    $.getJSON('php/mod04/json-pontuacao.php?id='+ides[i],    function (data) {
      // alert(data);

      seriesOptionsComp[i] = {
        name: name,
        type: 'areaspline',
        data: data
      };

      seriesCounterComp += 1;

      if (seriesCounterComp === namesComp.length) {
        alert("GERANDO");
        createChartComp();
        seriesCounterComp=0;
      }
    });
  });
}

});











