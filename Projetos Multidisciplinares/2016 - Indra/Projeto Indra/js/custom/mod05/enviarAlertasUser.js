$(document).ready(function() {
	var MAX_FILES_CADASTRO = 5,
	MAX_FILES_EDITAR,
	t = $("#tableUser" ).DataTable({
		lengthChange: false,
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
			}
		},
		"columnDefs": [ {
			"targets": [ 5, 6, 7],
			"orderable": false
		} ],
		dom: "Bfrtip",
		buttons: [
		{
			text: "Novo",
			action: function() {
				$("#modalCadastrar").modal();
				$('#modalCadastrar').trigger('next.m.1');
			}
		}
		]

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


	$('#formEditar').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			desc: {
				validators: {
					notEmpty: {
						message: 'Digite uma breve descrição'
					},
				}
			},
			cidade: {
				validators: {
					notEmpty: {
						message: 'Digite o nome da cidade'
					},
				}
			},
			tipoAlerta: {
				validators: {
					notEmpty: {
						message: 'Escolha um item da lista'
					},
				}
			},
			bairro: {
				validators: {
					notEmpty: {
						message: 'Digite o nome do bairro'
					},
				}
			},
			rua: {
				validators: {
					notEmpty: {
						message: 'Digite o nome da rua'
					},
				}
			}
		}
	});


	$('#formCriar').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			desc: {
				validators: {
					notEmpty: {
						message: 'Digite uma breve descrição do alerta'
					},
				}
			},
			'image[]': {
				validators: {
					notEmpty: {
						message: 'Selecione um ou mais arquivos'
					},
					file: {

						extension: 'jpeg,jpg,png,gif',
						type: 'image/jpeg,image/png,image/gif',
						language: "pt-BR",
						maxFiles: 5,
						minFiles: 1,
						message: 'Selecione apenas 5 imagens'

					}
				}
			},
			cidade: {
				validators: {
					notEmpty: {
						message: 'Digite o nome da cidade'
					},
				}
			},
			tipoAlerta: {
				validators: {
					notEmpty: {
						message: 'Escolha um item da lista'
					},
				}
			},
			bairro: {
				validators: {
					notEmpty: {
						message: 'Digite o nome do bairro'
					},
				}
			},
			rua: {
				validators: {
					notEmpty: {
						message: 'Digite o nome da rua'
					},
				}
			}
		}
	});





	$("#fileCadastrar").fileinput({
		language: "pt-BR",
		layoutTemplates: {
			main1: "{preview}\n" +
			"<div class=\'input-group {class}\'>\n" +
			"   <div class=\'input-group-btn\'>\n" +
			"       {browse}\n" +
			"       {upload}\n" +
			"       {remove}\n" +
			"   </div>\n" +
			"   {caption}\n" +
			"</div>"
		}
	});


	var idUser = $('#idUser').val();

	function listarAlertas() {

		$.ajax({
			url: "../../class/mod05/alertas/user/listarAlertasUser.php",
			dataType: "json",
			type: 'post',
			data: {
				id: idUser
			},
			success: function(data) {
				var qntAlertas = data[0].qntAlertas;
				var html = '<option value=\"\">Tipo de alerta</option>';
				for(var i = 1; i <= data[0].qntAlertas; i++)
					html += "<option value=\"" + data[i].id + "\">" + data[i].alerta + "</option>";
				$('.tipoAlerta').html(html);

				t.clear().draw();
				var qntResultados = data.length,
				btnEditar,
				btnExcluir;
				if (qntResultados > qntAlertas) {
					for (var i = +qntAlertas + +1; i < qntResultados; i++) {
						t.row.add([
							data[i].status,
							data[i].data,
							data[i].hora,
							data[i].cidade,
							data[i].alerta,
							//Botao de imagens, com os endereços das 5 imagens do alerta armazenados em seu id.
							"<button value=\"{&quot;id&quot;:&quot;" + data[i].id + "&quot;,&quot;img1&quot;:&quot;" + data[i].img1 + "&quot;,&quot;img2&quot;:&quot;" + data[i].img2 + "&quot;,&quot;img3&quot;:&quot;" + data[i].img3 + "&quot;,&quot;img4&quot;:&quot;" + data[i].img4 + "&quot;,&quot;img5&quot;:&quot;" + data[i].img5 + "&quot;}\"class=\"btn btn-primary btn-table btn-image\" data-toggle=\"modal\" data-target=\"#modalImagens\">Imagens</button>",
							//Botao Atualizar, com todas as informações do alerta em seu value;
							btnEditar = (data[i].status == "Aprovado" || data[i].status == "Reprovado") ? "<button class='btn btn-primary btn-table disabled'>Atualizar</button>" : "<button value=\"{&quot;id&quot;:&quot;" + data[i].id + "&quot;,&quot;descricao&quot;:&quot;" + data[i].desc +	"&quot;,&quot;rua&quot;:&quot;" + data[i].rua + "&quot;,&quot;bairro&quot;:&quot;" + data[i].bairro +	"&quot;,&quot;cidade&quot;:&quot;" + data[i].cidade + "&quot;,&quot;idUsuario&quot;:&quot;" + data[i].idUsuario + "&quot;,&quot;idAlerta&quot;:&quot;" + data[i].idAlerta + "&quot;,&quot;status&quot;:&quot;" + data[i].status +	"&quot;}\" class=\"btn btn-primary btn-table btn-editar\" data-toggle=\"modal\" data-target=\"#modalEditar\">Atualizar</button>",
							//Botao Excluir com o id e a pasta dos alertas do alerta armazenado em seu value;
							btnExcluir = (data[i].status== "Aprovado" || data[i].status == "Reprovado") ? "<button class='btn btn-primary btn-table disabled'>Excluir</button>" : "<button value=\"{&quot;id&quot;:&quot;" + data[i].id + "&quot;,&quot;caminho&quot;:&quot;" + data[i].caminhoPasta + " &quot;}\" class=\"btn btn-primary btn-table btn-deletar\" data-dismiss=\"modal\" data-toggle=\"modal\" data-target=\"#modalDeletar\">Excluir</button>"
							]).draw();
					}
				}
			},
			error: function(data){
				console.log(data);
			}
		});
	}

	listarAlertas();



	function criarCarrosel(imgs){
		var date = new Date(),
		html = "<div id=\"carouselImgs\" class=\"carousel slide\" data-ride=\"carousel\">" +
		"<ol class=\"carousel-indicators\">";
		if(!jQuery.isEmptyObject(imgs.img1)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"0\" class=\"active\"></li>";
		if(!jQuery.isEmptyObject(imgs.img2)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"1\"></li>";
		if(!jQuery.isEmptyObject(imgs.img3)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"2\"></li>";
		if(!jQuery.isEmptyObject(imgs.img4)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"3\"></li>";
		if(!jQuery.isEmptyObject(imgs.img5)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"4\"></li>";
		html += "</ol>"+
		"<div class=\"carousel-inner\">";

		if(!jQuery.isEmptyObject(imgs.img1)) {
			html+= "<div class=\"item active\">" +
			"<img idImg=\"" + imgs.id + "\" src=\"../../" + imgs.img1 +"?" + date + "\" alt=\"Imagem 01\">" +
			"</div>";
		}
		if(!jQuery.isEmptyObject(imgs.img2)) {
			html+= "<div class=\"item\">" +
			"<img idImg=\"" + imgs.id + "\" src=\"../../" + imgs.img2 +"?" + date + "\" alt=\"Imagem 02\">" +
			"</div>";
		}
		if(!jQuery.isEmptyObject(imgs.img3)) {
			html+= "<div class=\"item\">" +
			"<img idImg=\"" + imgs.id + "\" src=\"../../" + imgs.img3 +"?" + date + "\" alt=\"Imagem 03\">" +
			"</div>";
		}
		if(!jQuery.isEmptyObject(imgs.img4)) {
			html+= "<div class=\"item\">" +
			"<img idImg=\"" + imgs.id + "\" src=\"../../" + imgs.img4 +"?" + date + "\" alt=\"Imagem 04\">" +
			"</div>";
		}
		if(!jQuery.isEmptyObject(imgs.img5)) {
			html+= "<div class=\"item\">" +
			"<img idImg=\"" + imgs.id + "\" src=\"../../" + imgs.img5 +"?" + date + "\" alt=\"Imagem 05\">" +
			"</div>";
		}
		html += "</div>" +
		"<a class=\"left carousel-control\" href=\"#carouselImgs\" data-slide=\"prev\">" +
		"<span class=\"glyphicon glyphicon-chevron-left\"></span>" +
		"</a>" +
		"<a class=\"right carousel-control\" href=\"#carouselImgs\" data-slide=\"next\">" +
		"<span class=\"glyphicon glyphicon-chevron-right\"></span>" +
		"</a>" +
		"</div>" +
		"</div>";
		$('#corpoImagens').html(html);
		$('.carousel-indicators').html('');
		$('#idAlertaImg').val(imgs.id);

		var caminho = imgs.img1.split('/');
		caminho = caminho[0] + '/' + caminho[1] + '/' + caminho[2] + '/' + caminho[3] + '/' + caminho[4] + '/';
		$('#caminhoPasta').val(caminho);
		var numImgs = $('.item img').length;
		$('#numImgs').val(numImgs);

		MAX_FILES_EDITAR = 5 - numImgs;

		$("#inputImagens").fileinput({
			language: "pt-BR",
			layoutTemplates: {
				main1: "{preview}\n" +
				"<div class=\'input-group {class}\'>\n" +
				"   <div class=\'input-group-btn\'>\n" +
				"       {browse}\n" +
				"       {upload}\n" +
				"       {remove}\n" +
				"   </div>\n" +
				"   {caption}\n" +
				"</div>"
			}
		});



		if(numImgs != 5){
			$('#numImgLivres').text(5 - numImgs + ' de 5 imagens livres');
			$('#footerImagens div.file-input').show();
			$('#botaoEnviar').show();
			$('#delImg').show();
			$('.left').show();
			$('.right').show();
		}
		else{
			$('#footerImagens div.file-input').hide();
			$('#botaoEnviar').hide();
			$('#numImgLivres').text('');
			$('#delImg').show();
			$('.left').show();
			$('.right').show();
		}

		if(numImgs == 1){
			$('.left').hide();
			$('.right').hide();
			$('#delImg').hide();
		}


	}


	$('#delImg').on('click', function() {
		var caminhoImg = $('.active img').attr('src'),
		idImg = $('.active img').attr('idImg');
		caminhoImg = caminhoImg.split('?');
		caminhoImg = caminhoImg[0];
		$.ajax({
			type: 'POST',
			url: '../../class/mod05/alertas/user/deletarImagem.php',
			data: {
				caminho: caminhoImg,
				id: idImg
			},
			success: function(data) {
				if (data == true) {
					$('#modalImagens').trigger('next.m.2');
					listarAlertas();
				} else $('#modalImagens').trigger('next.m.4');
				$('#footerImagens div.file-input').hide();
			},
			error: function(data){
				console.log(data);
			}
		});

	});

	$('#tableUser tbody').on('click', 'button.btn-image', function() {
		$('#modalImagens').trigger('next.m.1');
		var imgs = jQuery.parseJSON(this.value);
		criarCarrosel(imgs);
		$('#formImg').formValidation({
			framework: 'bootstrap',
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            'image[]': {
	                validators: {
	                    notEmpty: {
	                        message: 'Selecione uma imagem'
	                    },
	                    file: {
	                        extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							language: "pt-BR",
							maxFiles: MAX_FILES_EDITAR,
							minFiles: 1,
							message: 'Selecione no máximo ' + MAX_FILES_EDITAR + ' imagens'
	                    }
	                }
	            }
	        }
		});
	});


	$('#botaoEnviar').on('click', function() {
		$('#formImg').data('formValidation').validate();
		if($('#formImg').data('formValidation').isValid()){
			var data = new FormData(jQuery('#formImg')[0]);
			$.ajax({
				type: 'POST',
				url: '../../class/mod05/alertas/user/addImageAlertaUser.php',
				data: data,
				contentType: false,
				processData: false,
				success: function(data) {
					$('#formImg').data('formValidation').resetForm();
					if (data == true) {
						$('#modalImagens').trigger('next.m.3');
						listarAlertas();
					} else $('#modalImagens').trigger('next.m.4');
				},
				error: function(data){
					console.log(data);
				}
			});
		}
	});

	$('#modalImagens').on('hide.bs.modal', function() {
		document.getElementById("formImg").reset();
		$('#formImg').data('formValidation').resetForm();
	});


	$('#simCadastrar').on('click', function() {
		$('#formCriar').data('formValidation').validate();
		if($('#formCriar').data('formValidation').isValid()) {
			var data = new FormData(jQuery('#formCriar')[0]);
			$.ajax({
				type: 'POST',
				url: '../../class/mod05/alertas/user/createAlertasUser.php',
				data: data,
				contentType: false,
				processData: false,
				success: function(data) {
					$('#formCriar').data('formValidation').resetForm();
					if (data == true) {
						$('#modalCadastrar').trigger('next.m.2');
						listarAlertas();
					} else $('#modalCadastrar').trigger('next.m.3');
				},
				error: function(data){
					console.log(data);
				}
			});
		}
	});

	$('#modalCadastrar').on('hide.bs.modal', function() {
		document.getElementById("formCriar").reset();
		$('#formCriar').data('formValidation').resetForm();
	});

	$('#tableUser tbody').on('click', 'button.btn-editar', function(){
		var au = jQuery.parseJSON($(this).val());
		var x = true;

		$('#modalEditar').trigger('next.m.1');
		$('#descTextEditar').val(au.descricao);
		$('#cidadeEditar').val(au.cidade);
		$('#tipoAlertaEditar').val(au.idAlerta);
		$('#bairroEditar').val(au.bairro);
		$('#ruaEditar').val(au.rua);
		$('#id').val(au.id);



		$('#simEditar').click(function() {
			if(x){
				var alertaUser = $('#formEditar').serializeFormJSON();
				$('#formEditar').data('formValidation').validate();
				if($('#formEditar').data('formValidation').isValid()) {
					$.ajax({
						method: 'POST',
						url: '../../class/mod05/alertas/user/editarAlertasUser.php',
						data: alertaUser,
						success: function(data) {
							$('#formEditar').data('formValidation').resetForm();
							if (data == true)
								$('#modalEditar').trigger('next.m.2');
							 else
								$('#modaleditar').trigger('next.m.3');
							x = false;
							listarAlertas();
						}
					});
				}
			}
		});
	});

	$('#modalEditar').on('hide.bs.modal', function() {
		$('#formEditar').data('formValidation').resetForm();
	});

	$('#corpoTabela').on('click', 'button.btn-deletar', function() {
		$('#modalDeletar').trigger('next.m.1');
		var x = true,
		info = jQuery.parseJSON(this.value);
		$('#deletar-sim').on('click', function() {
			if (x) {
				$.ajax({
					type: 'POST',
					url: '../../class/mod05/alertas/user/deletarAlertaUser.php',
					data: info,
					success: function(data) {
						if (data == true) {
							$('#modalDeletar').trigger('next.m.2');
							listarAlertas();
						} else $('#modalDeletar').trigger('next.m.3');
						x = false;
					},
					error: function(error){
						console.log(error);
					}
				});
			}
		});
	});
});
