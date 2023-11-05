// Função Para Mostrar ou Ocultar, de acordo com o que for selecionado para editar pelo usuário


			var USU_FOTO_PERFIL = 00;
			
			function foto_perfil() 
			{
				
				if(USU_FOTO_PERFIL == 0)
				{
					document.getElementById('USU_FOTO_PERFIL').disabled = this.checked;					
					
					$("#enviarperfil").show();
					
					USU_FOTO_PERFIL = 1;
				}
				else if(USU_FOTO_PERFIL == 1)
				{		
					document.getElementById('USU_FOTO_PERFIL').disabled = true;
					
					$("#enviarperfil").hide();
					
					USU_FOTO_PERFIL = 0;
				}

			};
			var USU_FOTO_PERFIL = 00;
