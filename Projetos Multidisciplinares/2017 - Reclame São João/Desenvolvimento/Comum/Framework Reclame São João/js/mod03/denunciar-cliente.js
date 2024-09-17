// Função Para Mostrar ou Ocultar, de acordo com o tipo de reclamação selecionado

		// Selecionar Outra Opção de Denúncia de Cliente
			$("#DEC_TIPO_DENUNCIA").click(function()
					{
						if (document.getElementById("DEC_TIPO_DENUNCIA").value == "5")
						{
							$("#OUTRO_TIPO_DENUNCIA").show();
							document.getElementById('DEC_TIPO_DENUNCIA_OUTRO').required = true;
						}
						else
						{
							$("#OUTRO_TIPO_DENUNCIA").hide();
							document.getElementById('DEC_TIPO_DENUNCIA_OUTRO').required = false;
						}
					});