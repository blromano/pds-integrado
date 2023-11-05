// Função Para Validar o Email - Verificando se já existe

			var USU_EMAIL = $("#USU_EMAIL"); 
			USU_EMAIL.keyup(function() 
			{ 
					$.ajax({ 
						url: 'php/mod01/verificarEmail.php', 
						type: 'POST', 
						data:{"USU_EMAIL" : USU_EMAIL.val()}, 
						success: function(data) { 
						console.log(data); 
						data = $.parseJSON(data);

						if(data.USU_EMAIL == '1')
						{
							document.getElementById('situacao_email').style.color = "#FF6347";
							document.getElementById('situacao_email').innerHTML = "Email Inválido, já existe um usuário cadastrado com este email!";
							document.getElementById('enviarcadastro').disabled = true;
						}
						else if(data.USU_EMAIL == '2')
						{
							document.getElementById('situacao_email').style.color = "#008B45";
							document.getElementById('situacao_email').innerHTML = "Email Válido!";
							document.getElementById('enviarcadastro').disabled = false;
						}
					}			
				}); 
			}); 