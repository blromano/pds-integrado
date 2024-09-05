// Função Para Validar o Email - Verificando se já existe

			var EST_CNPJ = $("#EST_CNPJ");

			var status_CNPJ;
			
			EST_CNPJ.keyup(function() 
			{ 
					$.ajax({ 
						url: 'php/mod03/verificarCNPJ.php', 
						type: 'POST', 
						data:{"EST_CNPJ" : EST_CNPJ.val()}, 
						success: function(data) { 
						console.log(data); 
						data = $.parseJSON(data);
						if(data.EST_CNPJ == '1')
						{
							document.getElementById('situacao_cnpj_valido').style.color = "#FF6347";
							document.getElementById('situacao_cnpj_valido').innerHTML = "CNPJ já existente!";
							document.getElementById('enviarcadastro').disabled = true;
							
							status_CNPJ = 1;
						}
						else if(data.EST_CNPJ == '2')
						{
							document.getElementById('situacao_cnpj_invalido').style.color = "#FF6347";
							document.getElementById('situacao_cnpj_invalido').innerHTML = "CNPJ Inválido!";
							document.getElementById('enviarcadastro').disabled = true;
							status_CNPJ = 0;
							$("#mostrar_cnpj_invalido").show();
							$("#mostrar_cnpj_invalido").hide();
						}
						else if(data.EST_CNPJ == '3')
						{
							document.getElementById('situacao_cnpj_valido').style.color = "#008B45";
							document.getElementById('situacao_cnpj_valido').innerHTML = "CNPJ Válido!";
							document.getElementById('enviarcadastro').disabled = false;
							$("#mostrar_cnpj_valido").show();
							$("#mostrar_cnpj_valido").hide();
							status_CNPJ = 0;
						}
						
						
					} 
				}); 
			}); 
			
			// Exibir Modal com uma mensagem o CNPJ já existe
				var typingTimer;
				var intervalo_tempo = 500;

				$('#EST_CNPJ').keyup(function() 
				{
				  clearTimeout(typingTimer);
				  if ($('#EST_CNPJ').val) {
					typingTimer = setTimeout(doneTyping, intervalo_tempo);
					
				  }
				});

				function doneTyping() 
				{
				  console.log('parei de digitar');
					
				  if(status_CNPJ == 1)
					{
						$("#ALERTA_CNPJ_EM_USO").modal("show");
					}
				};