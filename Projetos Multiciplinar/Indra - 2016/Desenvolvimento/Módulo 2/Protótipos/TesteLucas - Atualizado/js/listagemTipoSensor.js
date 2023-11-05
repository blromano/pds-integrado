$(document).ready(function() {
		$('#formCriar').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			tipoSensor: {
	                validators: {
	                    notEmpty: {
	                        message: 'O tipo de sensor é requerido'
	                    },
	                    stringLength: {
	                        max: 100,
	                        min: 1,
	                        message: 'O tipo de sensor precisa ter entre 1 e 100 caracteres'
	                    }
	                }
	            },
			tipo: {
					validators: {
							notEmpty: {
									message: 'O tipo de medição é requerido'
								},
							}
						},
      unidade: {
				validators: {
						notEmpty: {
								message: 'A unidade de medida é requerida'
						},
						stringLength: {
								max: 50,
								min: 1,
								message: 'A unidade de medida precisa ter entre 1 e 50 caracteres'
						}
				}
            },
			descricao: {
                validators: {
                    notEmpty: {
                        message: 'A descrição é requerida'
                    },
										stringLength: {
												max: 100,
												min: 1,
												message: 'A descricao precisa ter entre 1 e 100 caracteres'
										}
                }
            },
        }
    });

		$('#formEditar').formValidation({
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
			tipoSensoreditar: {
									validators: {
											notEmpty: {
													message: 'O tipo de sensor é requerido'
											},
											stringLength: {
													max: 100,
													min: 1,
													message: 'O tipo de sensor precisa ter entre 1 e 100 caracteres'
											}
									}
							},
			tipoeditar: {
					validators: {
							notEmpty: {
									message: 'O tipo de medição é requerido'
								},
							}
						},
			unidadeeditar: {
				validators: {
						notEmpty: {
								message: 'A unidade de medida é requerida'
						},
						stringLength: {
								max: 50,
								min: 1,
								message: 'A unidade de medida precisa ter entre 1 e 50 caracteres'
						}
				}
						},
			descricaoeditar: {
								validators: {
										notEmpty: {
												message: 'A descrição é requerida'
										},
										stringLength: {
												max: 100,
												min: 1,
												message: 'A descricao precisa ter entre 1 e 100 caracteres'
										}
								}
						},
				}
		});

 var tabela = $('#lista-tiposensor').DataTable({
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
 		},
		{
			"targets": [0],
			"className": "idtiposensor"
		},
		{
			"targets": [1],
			"className": "valortiposensor"
	},
	{
		"targets": [2],
		"className": "tipomed"
	},
	{
		"targets": [3],
		"className": "unimed"
	},
	{
		"targets": [4],
		"className": "desc"
	}],
 		dom: 'Bfrtip',
 			buttons: [
 			{
                 text: 'Novo',
                 action: function ( e, dt, node, config ) {
                	$("#cadastra-tiposensor-modal").modal();
	                $('#cadastra-tiposensor-modal').trigger('next.m.1');
                 }
             }
         ]
 });

	$('#btnCriar').on('click', function(){
		$('#formCriar').data('formValidation').validate();
		var info = $('#formCriar').serialize();
		if ($('#formCriar').data('formValidation').isValid()) {
		$.ajax({
			url: 'class/cadastrarTipoSensor.php',
			data: info,
			dataType: "JSON",
			method: 'POST',
			success: function(data){
				tabela.clear().draw();
				for(var i = 0; i < data.length; i++){
					tabela.row.add([
						data[i]['TSE_ID'],
						data[i]['TSE_TIPO_SENSOR'],
						data[i]['TSE_TIMID'],
						data[i]['UNIDADE_MEDIDA'],
						data[i]['DESCRICAO'],
						"<button class=\"btn btn-primary btn-table btn-editarsensor\" data-toggle=\"modal\" data-target=\"#editar-tiposensor-modal\">Editar</button>",
						"<button class=\"btn btn-primary btn-table btn-excluirsensor\" >Excluir</button>"
					]).draw();
				}
					$('#formCriar').data('formValidation').resetForm();
					$('#cadastra-tiposensor-modal').trigger('next.m.2');
					$('#tiposensor').val("");
					$('#unidade').val("");
					$('#descricao').val("");
					$('.timed-cadastro option[value=""]').attr('selected','selected');
				}
			});
		}
	});

$('#cancelar').on('click', function(){
	$('#certezacancelar').trigger('next.m.1');
	$('#certezacancelar').css('zIndex','9999');
	$('#certezacancelar').modal();
});

$('#simcerteza-cadastro').on('click', function(){
	$('#tiposensor').val("");
	$('#unidade').val("");
	$('#descricao').val("");
 	$('.timed-cadastro option[value=""]').attr('selected','selected');
	$('#formCriar').data('formValidation').resetForm();
	$('#cadastra-tiposensor-modal').modal("toggle");
});

$('#nao').on('click', function(){
	$('#cadastra-tiposensor-modal').trigger('next.m.1');
});

$('#simcerteza-edicao').on('click', function(){
	$('#tiposensor-editar').val("");
	$('#unidade-editar').val("");
 	$('.timed option[value=""]').attr('selected','selected');
	$('#descricao-editar').val("");
	$('#formEditar').data('formValidation').resetForm();
	$('#editar-tiposensor-modal').modal("toggle");
});

$('#lista-tiposensor tbody').on('click','button.btn-editarsensor', function(){
var value = $(this).parent().siblings('.tipomed').html();
var info = {tipomed:value};
$.ajax({
	url: 'class/idTipoMedicaoPorDescricao.php',
	data: info,
	method: 'POST',
	success: function(data){
		$('.timed option[value="'+data+'"]').attr('selected','selected');
	}
});
$('#editar-tiposensor-modal .tipo-sensor').val($(this).parent().siblings('.valortiposensor').html());
$('#editar-tiposensor-modal .decricaotpsensor').val($(this).parent().siblings('.desc').html());
$('#editar-tiposensor-modal .unimed2').val($(this).parent().siblings('.unimed').html());
$('#editar-tiposensor-modal .idtiposensor-modal').val($(this).parent().siblings('.idtiposensor').html());
});

$('#btnEditar').on('click', function(){
	$('#formEditar').data('formValidation').validate();
	var info = $('#formEditar').serialize();
	if ($('#formEditar').data('formValidation').isValid()) {
	$.ajax({
		url: 'class/editarTipoSensor.php',
		data: info,
		dataType: "JSON",
		method: 'POST',
		success: function(data){
		tabela.clear().draw();
			for(var i = 0; i < data.length; i++){
		 			tabela.row.add([
					data[i]['TSE_ID'],
					data[i]['TSE_TIPO_SENSOR'],
					data[i]['TSE_TIMID'],
					data[i]['UNIDADE_MEDIDA'],
					data[i]['DESCRICAO'],
					"<button class=\"btn btn-primary btn-table btn-editarsensor\" data-toggle=\"modal\" data-target=\"#editar-tiposensor-modal\">Editar</button>",
					"<button class=\"btn btn-primary btn-table btn-excluirsensor\" >Excluir</button>"
				]).draw();
			}
				$('#formEditar').data('formValidation').resetForm();
				$('#editar-tiposensor-modal').trigger('next.m.2');
				$('#tiposensor-editar').val("");
				$('#unidade-editar').val("");
				$('#descricao-editar').val("");
			}
		});
	}
});

$('#lista-tiposensor tbody').on('click','button.btn-excluirsensor', function(){
$('#excluir-tiposensor-modal .idtiposensor-modal-excluir').val($(this).parent().siblings('.idtiposensor').html());
$('#excluir-tiposensor-modal').modal();
});

$('#btnExcluir').on('click', function(){
		var valores = $('#excluir-tiposensor-modal .idtiposensor-modal-excluir').val();
		var info = {idtiposensor:valores};
		 $.ajax({
		  url: 'class/excluirTipoSensor.php',
		  data: info,
			dataType: "JSON",
			method: 'POST',
			success: function(data){
				if(data[0]['valor'] != 0){
				tabela.clear().draw();
					for(var i = 0; i < data.length; i++){
							tabela.row.add([
						data[i]['TSE_ID'],
						data[i]['TSE_TIPO_SENSOR'],
						data[i]['TSE_TIMID'],
						data[i]['UNIDADE_MEDIDA'],
						data[i]['DESCRICAO'],
						"<button class=\"btn btn-primary btn-table btn-editarsensor\" data-toggle=\"modal\" data-target=\"#editar-tiposensor-modal\">Editar</button>",
						"<button class=\"btn btn-primary btn-table btn-excluirsensor\" >Excluir</button>"
					]).draw();
				}
				$('#excluir-tiposensor-modal .idtiposensor-modal-excluir').val("");
				$('#excluir-tiposensor-modal').trigger('next.m.2');
			} else {
				$('#excluir-tiposensor-modal').trigger('next.m.3');
			}
		 }
		 });
});

$('#cadastra-tiposensor-modal').on('hide.bs.modal', function() {
$('#formCriar').data('formValidation').resetForm();
		document.getElementById("formCriar").reset();
});

$('#editar-tiposensor-modal').on('hide.bs.modal', function() {
	document.getElementById("formEditar").reset();
	$('#formEditar').data('formValidation').resetForm();
});

$('#editar-tiposensor-modal').on('hidden.bs.modal', function() {
		$('#editar-tiposensor-modal').trigger('next.m.1');
});

$('#cancelar-editar').on('click', function(){
		$('#certezacancelar').css('zIndex','9999');
			$('#certezacancelar').trigger('next.m.2');
		$('#certezacancelar').modal();
});

$('#nao-editar').on('click', function(){
		$('#editar-tiposensor-modal').trigger('next.m.1');
});

$('#excluir-tiposensor-modal').on('hidden.bs.modal', function() {
	$('#excluir-tiposensor-modal').trigger('next.m.1');
});

});
