$(document).ready(function() {
	
//Configurações do DataTables da página controle de funcionalidade de pcds
var tabela =$('#lista-status').DataTable({
        lengthChange: false,
        "language": {
        	"lengthMenu": "Mostrando _MENU_ itens por página",
        	"zeroRecords": "Nenhum item encontrado.",
        	"info": "Monstrando página _PAGE_ de _PAGES_",
        	"infoFiltered":   "(filtrado de _MAX_ total entries)",
        	"infoEmpty": "Nenhum item disponível ",
        	"infoFiltered": "(filtrado de _MAX_ itens)",
        	"search": "Procurar:",
        	"paginate": {
        		"first":      "Primeiro",
        		"last":       "Último",
        		"next":       "Próximo",
        		"previous":   "Anterior"
           },
       },
       "columnDefs": [ {
        "targets": [1],
        "orderable": false
    }],
});

$('#cancelar-controlefunc').on('click', function(){
  $('#valida_alteracao').attr('checked',false);
  $('#justificativa').val("");
});

$('#datahora').mask("99/99/9999 - 99:99:99");

	//Funções de passagem de valores da pagina de controle de funcionalidades -Lucas
$('#lista-status tbody').on('click', 'button', function(){
		$('#input-id-pcd').val($(this).val());
		$('#input-status-pcd').val($(this).html());
	});

$('#salvaralteracao').on('click', function(){
  var info = $('#formControleFunc').serialize();
  
    $.ajax({
      url: '../../class/mod02/alterar-status-pcd.php',
      data: info,
      dataType: "JSON",
      method: 'POST',
      success: function(data){
  				tabela.clear().draw();
          var btn="";
          for(var i = 0; i < data.length; i++){
  					tabela.row.add([
  						data[i]['PCD_ID'],
              btn = (data[i]['PCD_STATUS_FUNCIONAMENTO']>0) ? '<button class="btn btn-primary btn-table" value="' + data[i]['PCD_ID'] + '" data-toggle="modal" data-target="#controle-defuncionalidade-modal" >Desativar</button>' : '<button class="btn btn-primary btn-table" value="' + data[i]['PCD_ID'] + '" data-toggle="modal" data-target="#controle-defuncionalidade-modal" >Ativar</button>'
  					]).draw();
  				}
      }
    });
  $('#valida_alteracao').attr('checked',false);
  $('#justificativa').val("");
});

});
