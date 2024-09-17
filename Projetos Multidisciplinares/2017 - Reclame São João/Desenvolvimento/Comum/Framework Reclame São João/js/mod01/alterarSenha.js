// Função Para Alterar o Campo Senha

			$(document).ready(function() 
				{
					$("#senha_nova").keyup(checkPasswordMatch);
					$("#senha_confirmar").keyup(checkPasswordMatch);
				});
		
			function trocaSenha() 
			{
				var senha_antiga = document.getElementById('senha_antiga').value;
				var senha_antiga_confirmar = document.getElementById('senha_antiga_confirmar').value;
				var senha_nova = document.getElementById('senha_nova').value;
				var senha_confirmar = document.getElementById('senha_confirmar').value;
				
				if (senha_antiga_confirmar == '')
				{
					document.getElementById('resultado_confirmar_senha').style.color = "#FF6347";
					document.getElementById('resultado_confirmar_senha').innerHTML = "Confirme sua Senha Atual!";
					document.getElementById('enviarsenha').disabled = true;
				}
				else if(senha_antiga == senha_antiga_confirmar)
				{
					document.getElementById('resultado_confirmar_senha').style.color = "#008B45";
					document.getElementById('resultado_confirmar_senha').innerHTML = "Senha Confirmada com Sucesso!";
					document.getElementById('senha_nova').disabled = this.checked;
					document.getElementById('senha_confirmar').disabled = this.checked;
					document.getElementById('enviarsenha').disabled = false;


						if (senha_nova == '' || senha_confirmar == '')
						{
							document.getElementById('resultado').style.color = "#FF6347";
							document.getElementById('resultado').innerHTML = "Campo de Senha está vazio";
							document.getElementById('enviarsenha').disabled = true;
						}	
						else if(senha_nova != senha_confirmar)
						{
							document.getElementById('resultado').style.color = "#FF6347";
							document.getElementById('resultado').innerHTML = "As senhas não correspondem";
							document.getElementById('enviarsenha').disabled = true;
						}
						else if(senha_nova==senha_confirmar)
						{

							document.getElementById('resultado').style.color = "#008B45";
							document.getElementById('resultado').innerHTML = "As senhas são iguais";
							document.getElementById('enviarsenha').disabled = false;
							
						}
						else{
							document.getElementById('resultado').style.color = "#FF6347";
							document.getElementById('resultado').innerHTML = "As senhas não correspondem";
							document.getElementById('enviarsenha').disabled = true;
						}
					}
				else if(senha_antiga != senha_antiga_confirmar)
				{
					document.getElementById('resultado_confirmar_senha').style.color = "#FF6347";
					document.getElementById('resultado_confirmar_senha').innerHTML = "Senha Incorreta";
					document.getElementById('enviarsenha').disabled = true;
				}
				
				
				
			};