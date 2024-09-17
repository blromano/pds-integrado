// $(function() {

//     // Atribui evento e função para limpeza dos campos
//     $('#busca').on('input', limpaCampos);

//     var parametro;
//     // Dispara o Autocomplete a partir do segundo caracter
//     $( "#busca" ).autocomplete({
//     	minLength: 2,
//     	source: function( request, response ) {
//     		$.ajax({
//     			url: "consulta.php",
//     			dataType: "json",
//     			data: {
//     				acao: 'autocomplete',
//     				parametro: $('#busca').val()
//     			},
//     			success: function(data) {
//     				response(data);
//     			}
//     		});
//     	},
//     	focus: function( event, ui ) {
//     		$("#busca").val( ui.item.EST_NOME_FANTASIA );
//     		parametro = ui.item.EST_ID;
//     		carregarDados();
//     		return false;
//     	},
//     	select: function( event, ui ) {
//     		$("#busca").val( ui.item.EST_NOME_FANTASIA );
//     		parametro = ui.item.EST_ID;
//     		return false;
//     	}
//     })
//     .autocomplete( "instance" )._renderItem = function( ul, item ) {
//     	return $( "<li>" )
//     	.append( "<a>" + item.EST_NOME_FANTASIA + "</a><br>" )
//     	.appendTo( ul );
//     };

// var idEst =0;
//     // Função para carregar os dados da consulta nos respectivos campos
//     function carregarDados(){
//     	var busca = $('#busca').val();

//     	if(busca != "" && busca.length >= 2){
//     		$.ajax({
//     			url: "consulta.php",
//     			dataType: "json",	
//     			data: {
//     				acao: 'consulta',
//     				parametro: parametro
//     			},
//     			success: function( data ) {
//     				$('#idEstabelecimento').val(data[0].EST_ID);
//     				idEst = data[0].EST_ID
//     				// alert(idEst);
//     				// $('#codigo_barra').val(data[0].EST_ID);
//     				// $('#titulo_livro').val(data[0].EST_NOME_FANTASIA);
//     				// $('#categoria').val(data[0].EST_NOME_RESPONSAVEL);
//     			}
//     		});
//     	}
//     }

//     // Função para limpar os campos caso a busca esteja vazia
//     function limpaCampos(){
//     	var busca = $('#busca').val();

//     	if(busca == ""){
//     		$('#codigo_barra').val('');
//     		$('#titulo_livro').val('')
//     		$('#categoria').val('');
//     		$('#valor_compra').val('');
//     		$('#valor_venda').val('');
//     		$('#data_cadastro').val('');
//     		$('#status').val('')
//     	}
//     }
// });