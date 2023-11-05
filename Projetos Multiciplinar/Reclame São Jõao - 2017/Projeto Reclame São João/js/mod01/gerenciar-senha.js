// Função Para Mostrar ou Ocultar, de acordo com o que for selecionado para editar pelo usuário


			var verificar_senha = 00;
			
			function senha() 
			{
				
				if(verificar_senha == 0)
				{
					document.getElementById('senha_antiga_confirmar').disabled = this.checked;
					
					
					$("#enviarsenha").show();
					
					verificar_senha = 1;
				}
				else if(verificar_senha == 1)
				{
					document.getElementById('senha_antiga_confirmar').disabled = true;
					

					$("#enviarsenha").hide();
					
					verificar_senha = 0;
				}
				document.getElementById('senha_nova').disabled = true;
				document.getElementById('senha_confirmar').disabled = true;

			};
			
			
			
			