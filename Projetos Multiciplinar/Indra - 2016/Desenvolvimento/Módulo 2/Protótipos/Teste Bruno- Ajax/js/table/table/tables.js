
$(document).ready(function() { 
	$id_table = null;
	$cidade_table = null;
	$estado_table = null;
	$descricao_table = null;
	$latitude_table = null;
	$longitude_table = null;
	

	$('#lista-pcd tbody').on('click', 'button.btn-editar', function(){
		
		
		var localizacao = $(this).parent().siblings('.localizacao').html();
		var array = localizacao.split('/');
		$('#editar-pcd-modal .valor-identificacao').val($(this).parent().siblings('.id').html());
		$('#editar-pcd-modal .valor-descricao').val($(this).parent().siblings('.descricao').html());
		$('#editar-pcd-modal .valor-latitude').val(array[0]);
		$('#editar-pcd-modal .valor-longitude').val(array[1]);
		$('#editar-pcd-modal .select-cidade').val($(this).parent().siblings('.cidade').html());
		$('#editar-pcd-modal .select-estado').val($(this).parent().siblings('.estado').html());
		$id_table = $(this).parent().siblings('.id').html();
		
		
		$cidade_table = $(this).parent().siblings('.cidade').html();
		$estado_table = $(this).parent().siblings('.estado').html();
		$descricao_table = $(this).parent().siblings('.descricao').html();
		$latitude_table = array[0];
		$longitude_table = array[1];
		

	});
	
	$('#lista-pcd tbody').on('click', 'button.btn-excluir', function(){
		
		
		
		$('#excluir-pcd .valor-identificacao').val($(this).parent().siblings('.id').html());

        
		
		

	});
	
	
	$('#input-cancelar-cadastro-modal').click(function(){

       
        $('#confirmar-pcd').css('zIndex', '9999'); 
		
		if($("#select-cidade-cadastro-modal").val()!="" || $("#select-estado-cadastro-modal").val()!="" || $("#input-descricao-cadastro-modal").val()!=""|| $("#input-latitude-cadastro-modal").val()!="" ||  $("#input-longitude-cadastro-modal").val() != ""){

        $('#confirmar-pcd').modal();

		}
		


    });
	
	$('#input-sim-confirmar-modal').click(function(){

        
		
		$("#select-cidade-cadastro-modal").val("");
		$("#select-estado-cadastro-modal").val("");
		$("#input-descricao-cadastro-modal").val("");
		$("#input-latitude-cadastro-modal").val("");
		$("#input-longitude-cadastro-modal").val("");
		
		$('#form-cadastrar-pcd').data('formValidation').resetForm();
		
		//window.location="listarPCDs.php";
		$('#cadastra-pcd-modal').modal('toggle');


    });
	
	$('#input-nao-confirmar-modal').click(function(){

        
		
		$('#form-cadastrar-pcd').data('formValidation').validate();


    });
	
	
	$('#input-cancelar-edicao-modal').click(function(){
		
     
        $('#confirmar-edicao-pcd').css('zIndex', '9999'); 
		
		if($("#select-cidade-editar-modal").val()!= $cidade_table || $("#select-estado-editar-modal").val()!= $estado_table || $("#input-descricao-editar-modal").val()!= $descricao_table|| $("#input-latitude-editar-modal").val()!=$latitude_table ||  $("#input-longitude-editar-modal").val()!= $longitude_table){

        $('#confirmar-edicao-pcd').modal();

		}else{
			
			$('#editar-pcd-modal').modal('toggle');
			
		}
		


    });
	
	
	
	$('#input-sim-confirmar-edicao-modal').click(function(){
		
      
		$('#editar-pcd-modal').modal('toggle');


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







    
    t = $('#lista-pcd').DataTable({
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




$("#input-salvar-cadastro-modal").click(function() {
	//$('#form-cadastrar-pcd').formValidation(options);
		$('#form-cadastrar-pcd').data('formValidation').validate();
		
			if($('#form-cadastrar-pcd').data('formValidation').isValid()){
				alert($("#input-latitude-cadastro-modal").val());
				var cidade = $("#select-cidade-cadastro-modal").val();
				var estado = $("#select-estado-cadastro-modal").val();
				var descricao = $("#input-descricao-cadastro-modal").val();
				var latitude = $("#input-latitude-cadastro-modal").val();
				var longitude = $("#input-longitude-cadastro-modal").val();
				
				$("#select-cidade-cadastro-modal").val("");
				$("#select-estado-cadastro-modal").val("");
				$("#input-descricao-cadastro-modal").val("");
				$("#input-latitude-cadastro-modal").val("");
				$("#input-longitude-cadastro-modal").val("");
		
				$('#form-cadastrar-pcd').data('formValidation').resetForm();
		
				//window.location="listarPCDs.php";
				$('#cadastra-pcd-modal').modal('toggle');
			
	 
				
				
				
				
				$.ajax({
					url: "class/cadastrarPCD.php",
					type: "POST",
					dataType: "JSON",
					data: 'cidade='+cidade+'&estado='+estado+'&descricao='+descricao+'&latitude='+latitude+'&longitude='+longitude,
					
					
					success: function (data) {
						
					var lat = null
					var lon = null
					var id_pcd = null
						
						t.clear().draw();
						for ( var i = 0 ; i < data.length; i++ ) {
							 lat = data[i]["latitude"];
							 lon = data[i]["longitude"];
							 id_pcd = data[i]["id"];
							t.row.add([
								id_pcd,
								data[i]["cidade"],
								data[i]["estado"],
								lat+" \/"+lon,
								data[i]["descricao"],
								//Botao Atualizar, com todas as informações do alerta em seu value;
								"<button class=\"btn btn-primary btn-table btn-editar\" data-toggle=\"modal\" data-target=\"#editar-pcd-modal\"  >Editar</button>",
								//Botao Excluir com o id e a pasta dos alertas do alerta armazenado em seu value;
								"<button  class=\"btn btn-primary btn-table btn-excluir\"  data-toggle=\"modal\" data-target=\"#excluir-pcd\" >Excluir</button>"
								]).draw();
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(0).addClass('id');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(1).addClass('cidade');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(2).addClass('estado');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(3).addClass('localizacao');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(4).addClass('descricao');
								
								
								
						}
					}
				});
			}
		});
		
		
		
		$("#input-salvar-edicao-modal").click(function() {
	
		$('#form-editar-pcd').data('formValidation').validate();
		
			if($('#form-editar-pcd').data('formValidation').isValid()){
				
				var cidade = $("#select-cidade-editar-modal").val();
				var estado = $("#select-estado-editar-modal").val();
				var descricao = $("#input-descricao-editar-modal").val();
				var latitude = $("#input-latitude-editar-modal").val();
				var longitude = $("#input-longitude-editar-modal").val();
				var id = $id_table;
			
	 
				
				
				
				
				$.ajax({
					url: "class/editarPCD.php",
					type: "POST",
					dataType: "JSON",
					data: 'id='+id+'&cidade='+cidade+'&estado='+estado+'&descricao='+descricao+'&latitude='+latitude+'&longitude='+ longitude,
					
					
					success: function (data) {
						
						
						
						
						
						t.clear().draw();
						for ( var i = 0 ; i < data.length; i++ ) {
							var lat = data[i]["latitude"];
							var lon = data[i]["longitude"];
							t.row.add([
								data[i]["id"],
								data[i]["cidade"],
								data[i]["estado"],
								""+lat+" \/ "+lon,
								data[i]["descricao"],
								//Botao Atualizar, com todas as informações do alerta em seu value;
								"<button  class=\"btn btn-primary btn-table btn-editar\" data-toggle=\"modal\" data-target=\"#editar-pcd-modal\">Editar</button>",
								//Botao Excluir com o id e a pasta dos alertas do alerta armazenado em seu value;
								"<button  class=\"btn btn-primary btn-table btn-excluir\"  data-toggle=\"modal\" data-target=\"#excluir-pcd\">Excluir</button>"
								]).draw();
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(0).addClass('id');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(1).addClass('cidade');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(2).addClass('estado');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(3).addClass('localizacao');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(4).addClass('descricao');
								
								
						}
						
						$("#sucesso-edicao-modal").modal();
					}
				});
			}
		});
		
		
		
		
		
		
		$("#input-sim-excluir-modal").click(function() {
			
				alert($("#input-id-excluir-modal").val());
				var id = $("#input-id-excluir-modal").val();
				
			
	 
				
				
				
				
				$.ajax({
					url: "class/excluirPCD.php",
					type: "POST",
					dataType: "JSON",
					data: 'id='+id,
					
					
					success: function (data) {
						
					
						
						t.clear().draw();
						for ( var i = 0 ; i < data.length; i++ ) {
							var lat = data[i]["latitude"];
							var lon = data[i]["longitude"];
							var id_pcd = data[i]["id"];
							t.row.add([
								id_pcd,
								data[i]["cidade"],
								data[i]["estado"],
								lat+" \/"+lon,
								data[i]["descricao"],
								//Botao Atualizar, com todas as informações do alerta em seu value;
								"<button value = \"aaaa\" class=\"btn btn-primary btn-table btn-editar\" data-toggle=\"modal\" data-target=\"#editar-pcd-modal\"  >Editar</button>",
								//Botao Excluir com o id e a pasta dos alertas do alerta armazenado em seu value;
								"<button  class=\"btn btn-primary btn-table btn-excluir\"  data-toggle=\"modal\" data-target=\"#excluir-pcd\" >Excluir</button>"
								]).draw();
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(0).addClass('id');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(1).addClass('cidade');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(2).addClass('estado');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(3).addClass('localizacao');
								$('#lista-pcd').find('tr').eq(i+1).find('td').eq(4).addClass('descricao');
								
								
								
						}
					}
				});
			
		});
		
		
		
		
		
		
		$("#input-cancelar-cadastro-modal").click(function() {
			$('#form-cadastrar-pcd').data('formValidation').resetForm();
			document.getElementById('#form-cadastrar-pcd').reset();
			
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