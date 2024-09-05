// Função Para Validar o Campo Senha

			function validaSenha() 
			{
				var campo1 = document.getElementById('senha_nova').value;
				var campo2 = document.getElementById('senha_confirmar').value;
				
				if(campo1 == campo2)
				{
					document.getElementById('resultado').style.color = "#008B45";
					document.getElementById('resultado').innerHTML = "As senhas são iguais";
					document.getElementById('enviarsenha').disabled = false;
				}
				else if((campo1 != '' && campo2 != '') && campo1 != campo2)
				{
					document.getElementById('resultado').style.color = "#FF6347";
					document.getElementById('resultado').innerHTML = "As senhas não correspondem";
					document.getElementById('enviarsenha').disabled = true;
				}
				else 
				{
					document.getElementById('resultado').style.color = "#FF6347";
					document.getElementById('resultado').innerHTML = "As senhas não correspondem";
					document.getElementById('enviarsenha').disabled = true;
				}
				
			};
			
		/* Exibir Modal com uma mensagem que as senhas não correspondem
			var typingTimer;
			var intervalo_tempo = 500;

			$('#USU_SENHA_CONFIRMAR').keyup(function teste() 
			{
			  clearTimeout(typingTimer);
			  if ($('#USU_SENHA_CONFIRMAR').val) {
				typingTimer = setTimeout(doneTyping1, intervalo_tempo);
				
			  }
			});
			*/

			function doneTyping1() 
			{
			  console.log('parei de digitar');
			  
			  var campo1 = document.getElementById('senha_nova').value;
			  var campo2 = document.getElementById('senha_confirmar').value;
				
			  if((campo1 != '' && campo2 != '') && campo1 != campo2)
				{
					$("#ALERTA_SENHA_NAO_CORRESPONDENTE").modal("show");
				}
			};