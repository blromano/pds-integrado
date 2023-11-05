$(document).ready(function() { 
	//$id = null;
	$cidade_table = null;
	$estado_table = null;
	$descricao_table = null;
	$latitude_table = null;
	$longitude_table = null;
	

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
		
		$cidade_table = $(this).parent().siblings('.cidade').html();
		$estado_table = $(this).parent().siblings('.estado').html();
		$descricao_table = $(this).parent().siblings('.descricao').html();
		$latitude_table = array[0];
		$longitude_table = array[1];
		

	});
	
	$('#lista-pcd tbody').on('click', 'button.btn-excluir', function(){
		
		
		
		$('#excluir-pcd .valor-identificacao').val($(this).val());

        alert($(this).val());
		
		

	});
	

    
	
	
	
	$('#input-cancelar-cadastro-modal').click(function(){

        alert($("#input-descricao-cadastrar-modal").val());
        $('#confirmar-pcd').css('zIndex', '9999'); 
		
		if($("#select-cidade-cadastrar-modal").val()!="" || $("#select-estado-cadastrar-modal").val()!="" || $("#input-descricao-cadastrar-modal").val()!=""|| $("#input-latitude-cadastrar-modal").val()!="" ||  $("#input-longitude-cadastrar-modal").val() != ""){

        $('#confirmar-pcd').modal();

		}
		


    });
	
	

	$('#input-sim-confirmar-modal').click(function(){

        
		
		$("#select-cidade-cadastrar-modal").val("");
		$("#select-estado-cadastrar-modal").val("");
		$("#input-descricao-cadastrar-modal").val("");
		$("#input-latitude-cadastrar-modal").val("");
		$("#input-longitude-cadastrar-modal").val("");
		
		$('#form-cadastrar-pcd').data('formValidation').resetForm();
		
		//window.location="listarPCDs.php";
		$('#cadastra-pcd-modal').modal('toggle');


    });
	
	
	$('#input-cancelar-edicao-modal').click(function(){
		
        alert($("#select-cidade-editar-modal").val());
        $('#confirmar-edicao-pcd').css('zIndex', '9999'); 
		
		if($("#select-cidade-editar-modal").val()!= $cidade_table || $("#select-estado-editar-modal").val()!= $estado_table || $("#input-descricao-editar-modal").val()!= $descricao_table|| $("#input-latitude-editar-modal").val()!=$latitude_table ||  $("#input-longitude-editar-modal").val()!= $longitude_table){

        $('#confirmar-edicao-pcd').modal();

		}else{
			
			$('#editar-pcd-modal').modal('toggle');
			
		}
		


    });
	
	$('#input-sim-confirmar-edicao-modal').click(function(){

        
		
		$("#select-cidade-editar-modal").val("");
		$("#select-estado-editar-modal").val("");
		$("#input-descricao-editar-modal").val("");
		$("#input-latitude-editar-modal").val("");
		$("#input-longitude-editar-modal").val("");
		
		$('#form-editar-pcd').data('formValidation').resetForm();
		
		//window.location="listarPCDs.php";
		$('#editar-pcd-modal').modal('toggle');


    });
	
//$('#input-nao-confirmar-modal').click(function(){

        
		//$('#confirmar-pcd').modal({show:false});
		

   //});
	
	
	
	
	
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



    //Configurações do DataTables da página OrgaosColab-list.html
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

    //Configuração do DataTables da página Enviar Alertas - ListagemparaAdmin.html
    $('#Listagem_Admin').DataTable({
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
            "targets": [7,8],
            "orderable": false
        }]     
    });

    //Configuração do DataTables da página Enviar Alertas - ListagemparaUser.html
    $('#tableUser').DataTable({
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
            "targets": [6,7],
            "orderable": false
        }]     
    });

    $('#Parametros_de_Alerta').DataTable({
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
        }]     
    });


});