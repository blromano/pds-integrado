$(document).ready(function(){


	(function($) {
		FormValidation.Validator.verificarValor= {
			validate: function(validator, $field, options) {
				var valorMin = $field.val();
				var valorMax = $field.parents().find('.valorMax').get(1).value;
				$result = +valorMax >= +valorMin;
				if(valorMax.length == 0) return true;
				return $result;
			}
		};
	}(window.jQuery));

	(function($) {
		FormValidation.Validator.min= {
			validate: function(validator, $field, options) {
				var domForm =  ($field.closest('.formParam'));
				var valorMax = $field.parents().find('.valorMax').get(1).value;
				var minMaiorZero = ($field.val().length != 0);
				if (minMaiorZero){
					if(valorMax.length != 0)
						return true;
					else{
						$(domForm).formValidation('enableFieldValidators', 'valorMax', false);	
						$(domForm).formValidation('enableFieldValidators', 'corMax', false);
					}
				}
				return minMaiorZero;
			}
		};
	}(window.jQuery));

	(function($) {
		FormValidation.Validator.max= {
			validate: function(validator, $field, options) {
				var domForm =  ($field.closest('.formParam'));
				var valorMin = $field.parents().find('.valorMin').val();
				var maxMaiorZero = ($field.val().length != 0);
				if(maxMaiorZero){
					if(valorMin.length != 0)
						return true;
					else{
						$(domForm).formValidation('enableFieldValidators', 'valorMin', false);
						$(domForm).formValidation('enableFieldValidators', 'corMin', false);
					}
				}
				return maxMaiorZero;
			}
		};
	}(window.jQuery));

	$('.formParam').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		excluded: ':disabled',
		fields: {
			valorMax: {
				validators: {
					numeric: {
						message: 'Digite um valor númerico'
					},
					max: {
						message: "Preecha o valor máximo ou o valor minímo"
					}
				}
			},
			corMax: {
				validators: {
					notEmpty: {
						message: 'Selecione um item da lista'
					},
				}
			},
			valorMin: {
				validators: {
					numeric: {
						message: 'Digite um valor númerico'
					},
					verificarValor: {
						message: 'O valor minimo deve ser menor ou igual do que o maxímo'
					},
					min: {
						message: "Preecha o valor máximo ou o valor minímo"
					}
				}
			},
			corMin: {
				validators: {
					notEmpty: {
						message: 'Selecione um item da lista'
					},
				}
			}
		}
	}).on('keyup', '[name="valorMax"]', function() {
		var domForm = $(this).closest('.formParam');
		var domValorMin = domForm.find('[name="valorMin"]');
		if($(this).val().length != 0 && domValorMin.val().length != 0){
			$(domForm).data('formValidation').updateStatus(domValorMin, 'NOT_VALIDATED').validateField(domValorMin);
		}
	});

	$('.formParam [name="valorMin"]').on('keyup', function(){
		var domForm = $(this).closest('.formParam');
		var domValorMin = domForm.find('[name="valorMin"]');
		var domValorMax = domForm.find('[name="valorMax"]');
		var domCorMin = domForm.find('.corMin');
		if($(this).val().length != 0){
			domCorMin.show();
			$(domForm).formValidation('enableFieldValidators', 'valorMin', true);
			$(domForm).data('formValidation').updateStatus(domValorMin, 'NOT_VALIDATED').validateField(domValorMin);
			$(domForm).formValidation('enableFieldValidators', 'corMin', true);
		}else{			
			domCorMin.hide();
			domCorMin.find('.select').val("");
			$(domForm).formValidation('resetField', 'corMin');
			if($(domValorMax).val().length > 0){
				$(domForm).formValidation('enableFieldValidators', 'valorMin', false);
				$(domForm).formValidation('enableFieldValidators', 'corMin', false);
			}
		}
	});

	$('.formParam [name="valorMax"]').on('keyup', function(){
		var domForm = $(this).closest('.formParam');
		var domValorMin = domForm.find('[name="valorMin"]');
		var domValorMax = domForm.find('[name="valorMax"]');
		var domCorMax = domForm.find('.corMax');
		if($(this).val().length > 0){
			$(domCorMax).show();
			$(domForm).formValidation('enableFieldValidators', 'valorMax', true);
			$(domForm).data('formValidation').updateStatus($(domValorMax), 'NOT_VALIDATED').validateField(domValorMax);
			$(domForm).formValidation('enableFieldValidators', 'corMax', true);			
		}else if($(this).val().length == 0){
			$(domCorMax).find('.select').val("");
			$(domCorMax).hide();
			$(domForm).formValidation('resetField', 'corMax');
			if($(domValorMin).val().length > 0){
				$(domForm).formValidation('enableFieldValidators', 'valorMax', false);
				$(domForm).formValidation('enableFieldValidators', 'corMax', false);
			}
		}
	});


	var t = $('#paramTable').DataTable({
		lengthChange: false,
		"order": [[1, "asc"]],
		"language": {
			"lengthMenu": "Mostrando _MENU_ itens por página",
			"zeroRecords": "Nenhum item encontrado.",
			"info": "Monstrando página _PAGE_ de _PAGES_",
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
			"targets": 0,
			"orderable": false
		}]
	});

	$.fn.serializeFormJSON = function() {
		var o = {};
		var a = this.serializeArray();
		$.each(a, function() {
			if(o[this.name]) {
				if(!o[this.name].push){
					o[this.name] [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};

	var child;
	var idPCD;

	$('#paramTable tbody').on('click', 'button', function () { //Aciona quando clica na coluna com o simbolo '+'.
	idPCD = $(this).val(); //Recebe o ID da PCD da coluna selecionada.
	child = t.row($(this).parent()).child;
	//recebe a linha da PCD
	if (child.isShown()) {//Verifica se a tabela interna está aberta.
		$(this).toggleClass('glyphicon-minus glyphicon-plus');//Muda o simbolo de '-' para '+'.
		child.hide();//Fecha a tabela interna
	} else {//Verifica se a tabela interna está fechada.
		$(this).toggleClass('glyphicon-minus glyphicon-plus');//Muda o simbolo de '+' para '-'.
		listarParam();
	}
});

function listarParam() {
	//var
	$.ajax({//Ajax para pegar as informaçõs dos parametros dos sensores da PCD requirida pelo usuário.
		url: 'class/paramAlertas/listarParam.php',
		dataType: 'json',
		method: 'POST',
		data: {
			id: idPCD
		},
		success: function(data){
			var html = "<table width=\"100%\" class=\"tableInterna\"><thead><tr><th>Sensor</th><th>Valor máximo</th><th>Cor máxima</th>"
			+"<th>Valor mínimo</th><th>Cor mínima</th><th width=\"5%\"></th><th></th></tr></thead><tbody>";//Cabeçalho da tabela interna.
			if(data.length > 0){
				for(var i = 0; i < data.length; i++){
					if(data[i].temParametro)	{//Pega os dados do parametro caso ele esteja cadastrado.
						html = html + "<tr><td>" + data[i].sensor + "</td><td>" + data[i].valorMax + "</td><td>" + data[i].corMax + "</td><td>" +
						data[i].valorMin + "</td><td>" + data[i].corMin + "<td><a id=\"{&quot;id&quot;:&quot;" + data[i].id + "&quot;,&quot;valorMax&quot;:&quot;" + data[i].valorMax +
						"&quot;,&quot;valorMin&quot;:&quot;" + data[i].valorMin + "&quot;,&quot;sensor&quot;:&quot;"+ data[i].sensor +"&quot;,&quot;corMax&quot;:&quot;" +data[i].corMax + "&quot;,&quot;corMin&quot;:&quot;" + data[i].corMin +
						"&quot;}\" class=\"btn btn-primary btn-table btn-editar\" data-dismiss=\"modal\"" + "data-toggle=\"modal\" data-target=\"#modalEditar\">Editar</a></td><td><a id=\"" + data[i].id + "\" class=\"btn btn-primary btn-table btn-deletar\"" +
						"data-dismiss =\"modal\" data-toggle=\"modal\" data-target=\"#modalDeletar\">Excluir</a></td></tr>";
					}
					else {//Caso o parametro não esteja cadastrado, cria uma opção de cadastro.
						html = html + "<tr><td>" + data[i].sensor + "</td><td></td><td></td><td></td><td></td><td><a id=\"" + data[i].idSensor + "\" class=\"btn btn-primary btn-table btn-cadastrar\"" +
						"data-dismiss=\"modal\" data-toggle=\"modal\" data-target=\"#modalCadastrar\">Cadastrar</a></td><td></td></tr>";
					}
				}
			}
			html = html + "</tbody></table>";//Fecha a tabela interna.
			child($(html)).show();//Adiciona a tabela interna à tabela princípal.
		},
		error: function(data){
			alert(data);
		}
	});
}

$('#corpoTabela').on( 'click', '.tableInterna a.btn-editar', function () {
	idPCD = $(this).closest('.tableInterna').closest('tr').prev().children().children().val();
	child = t.row($(this).closest('.tableInterna').closest('tr').prev().children()).child;
	$('#modalEditar').trigger('next.m.1');
	var paramAlerta = jQuery.parseJSON(this.id);
	$('#modalEditarTitle').text("Atualizar Parâmetros do Sensor de " + paramAlerta.sensor);
	$('#valorMinEditar').val(paramAlerta.valorMin);
	$('#valorMaxEditar').val(paramAlerta.valorMax);
	if(paramAlerta.corMin != ""){
		$('#corMinEditar').val(paramAlerta.corMin).change();
		$('#divCorMin').show();
	}
	else
		$('#divCorMin').hide();
	if(paramAlerta.corMax != ""){
		$('#corMaxEditar').val(paramAlerta.corMax).change();
		$('#divCorMax').show();
	}
	else
		$('#divCorMax').hide();
	var x = true;
	$('.formParam').data('formValidation').resetForm();
	$('#simEditar').click(function (){
		$('#formEditar').data('formValidation').validate();
		if(x){
			$('#idParam').val(paramAlerta.id);
			var para = $('#formEditar').serializeFormJSON();
			if ($('#formEditar').data('formValidation').isValid() || $('#formEditar').data('formValidation').isValid() == null) {
				$.ajax({
					method: 'POST',
					url: 'class/paramAlertas/editarParam.php',
					data: para,
					dataType: 'json',
					success: function(data){
						$('.formParam').data('formValidation').resetForm();
						if(data.valido) {
							$('#modalEditar').trigger('next.m.2');
							listarParam();
						}
						else $('#modalEditar').trigger('next.m.3');
						x = false;
					}
				});
			}
		}
	});
});

$('#corpoTabela').on( 'click', '.tableInterna a.btn-cadastrar', function () {
	idPCD = $(this).closest('.tableInterna').closest('tr').prev().children().children().val();
	child = t.row($(this).closest('.tableInterna').closest('tr').prev().children()).child;
	$('#modalCadastrar').trigger('next.m.1');
	var idSensor = this.id;
	var x = true;
	$('#idSensor').val(idSensor);
	$('#cadastrarSim').click(function (){
		$('#formCriar').data('formValidation').validate();
		if(x){
			var param = $('#formCriar').serializeFormJSON();
			if ($('#formCriar').data('formValidation').isValid()) {
				$.ajax({
					method: 'POST',
					url: 'class/paramAlertas/createParam.php',
					data: param,
					success: function(data) {
						$('#formCriar').data('formValidation').resetForm();
						if (data) $('#modalCadastrar').trigger('next.m.2');
						else $('#modalCadastrar').trigger('next.m.3');
						listarParam();
						x=false;
					}
				});
			}
		}

	});
});


$('#modalCadastrar').on('hide.bs.modal', function() {
	$('#formCriar').data('formValidation').resetForm();
	document.getElementById("formCriar").reset();
})

$('#modalEditar').on('hide.bs.modal', function() {
	$('.formParam').data('formValidation').resetForm();
})

$('#corpoTabela').on( 'click', '.tableInterna a.btn-deletar', function () {
	idPCD = $(this).closest('.tableInterna').closest('tr').prev().children().children().val();
	child = t.row($(this).closest('.tableInterna').closest('tr').prev().children()).child;
	$('#modalDeletar').trigger('next.m.1');
	var id = this.id;
	var x = true;
	$('#simDeletar').click(function (){
		if(x){
			$.ajax({
				type: 'POST',
				url: 'class/paramAlertas/deletarParam.php',
				data: {
					id: id
				},
				success: function(data){
					if(data){
						$('#modalDeletar').trigger('next.m.2');
						listarParam();
					} else $('#modalCadastrar').trigger('next.m.3');
					x = false;
				}
			});
		}
	});
});

function listarPCD() {
	$.ajax({
		url: 'class/paramAlertas/listarPCD.php',
		dataType: 'json',
		success: function(data){
			if(data.length > 0){
				t.clear().draw();
				for(var i = 0; i < data.length; i++){
					$html = "";
					if(data[i].qnt > 0) $html = "<button class=\"glyphicon glyphicon-plus botao-semfundo\" value=\"" + data[i].id + "\"></button>";
					t.row.add([
						$html,
						data[i].nome,
						data[i].qnt
					]).draw();
				}
			}
		}
	});
}

listarPCD();

});
