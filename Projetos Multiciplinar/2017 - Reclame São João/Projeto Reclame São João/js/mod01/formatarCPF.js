
		function formatar(mascara, documento){
			var i = documento.value.length;
			var saida = mascara.substring(0,1);
			var texto = mascara.substring(i)
  
			if (texto.substring(0,1) != saida){
				documento.value += texto.substring(0,1);
			}  
		}
		var CON_CPF = $("#CON_CPF");

			var status_CPF;
			
			CON_CPF.keyup(function() 
			{ 
					$.ajax({ 
						url: 'php/mod01/verificarCPF.php', 
						type: 'POST', 
						data:{"CON_CPF" : CON_CPF.val()}, 
						success: function(data) { 
						console.log(data); 
						data = $.parseJSON(data);
						if(data.CON_CPF == '1')
						{
							document.getElementById('situacao_cpf').style.color = "#FF6347";
							document.getElementById('situacao_cpf').innerHTML = "CPF já existente!";
							document.getElementById('enviarcadastro').disabled = true;
							status_CPF = 1;
						}
						
						else if(data.CON_CPF == '2')
						{
							document.getElementById('situacao_cpf').style.color = "#008B45";
							document.getElementById('situacao_cpf').innerHTML = "CPF Válido!";
							document.getElementById('enviarcadastro').disabled = false;
							status_CPF = 0;
						}
						
						
					} 
				}); 
			}); 