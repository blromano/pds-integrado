$(document).ready(function() { 
	//$id = null;

	$('#lista-pcd tbody').on('click', 'button.btn-editar', function(){
		
		
		var localizacao = $(this).parent().siblings('.localizacao').html();
		var array = localizacao.split('/');
		$('#editar-pcd-modal .valor-identificacao').val($(this).val());
		$('#editar-pcd-modal .valor-descricao').val($(this).parent().siblings('.descricao').html());
		$('#editar-pcd-modal .valor-latitude').val(array[0]);
		$('#editar-pcd-modal .valor-longitude').val(array[1]);
		$('#editar-pcd-modal .select-cidade').val($(this).parent().siblings('.cidade').html());
		$('#editar-pcd-modal .select-estado').val($(this).parent().siblings('.estado').html());
		//$id = $(this).val();

	});
	
	$('#lista-pcd tbody').on('click', 'button.btn-excluir', function(){
		
		
		
		$('#excluir-pcd .valor-identificacao').val($(this).val());

        alert($(this).val());
		
		

	});
	
	/*$('#editar-pcd-modal ').on('click', 'input.btn-salvar', function(){
		$.ajax({
		url: 'class/editarPCD.php',
		type: 'POST', // GET é o padrão
    dataType: 'json', // pode ser xml, json, script, ou html, o jQuery também detecta automáticamente, 
                      // mas é  bom sempre informar
    data: {'id':$id}, // Também pode usar serialize para enviar todo o formulário
    success: function(data){ // script executado, quando o ajax é enviado com sucesso
        console.log(data);
        alert(data.msg);
    },
    error : function(XMLHttpRequest, textStatus, errorThrown) { // Script executado quando houve erro
       console.log(XMLHttpRequest, textStatus);
       console.log('----------------------------------');
       console.log(XMLHttpRequest.responseText);
       console.log('----------------------------------');
       console.log(errorThrown);
       alert('Houve um erro ao enviar os dados');

    }
});
});*/



    //Configurações do DataTables da página
    $('#lista-pcd').DataTable({
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
        "targets": [5,6],
        "orderable": false
    }], 
	dom: 'Bfrtip',
		buttons: [
            {
                text: 'Novo',
                action: function ( e, dt, node, config ) {
                   $("#cadastra-pcd-modal").modal();
                }
            }
        ]    
});

});