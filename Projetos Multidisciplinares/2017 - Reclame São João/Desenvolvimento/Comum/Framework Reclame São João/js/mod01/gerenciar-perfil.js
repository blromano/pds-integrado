// Função Para Mostrar ou Ocultar, de acordo com o que for selecionado para editar pelo usuário


			var verificar_informacoes_pessoais = 00;
			var verificar_endereco = 0;
			
			function informacoes_pessoais() 
			{
				
				if(verificar_informacoes_pessoais == 0)
				{
					document.getElementById('USU_NOME').disabled = this.checked;
					document.getElementById('USU_TELEFONE').disabled = this.checked;
					//document.getElementById('CON_CPF').disabled = this.checked;
					document.getElementById('CON_TELEFONE2').disabled = this.checked;
					document.getElementById('CON_DATA_NASCIMENTO').disabled = this.checked;
					//document.getElementById('USU_EMAIL').disabled = this.checked;
					document.getElementById('CON_ID').disabled = this.checked;
					
					$("#botao_atualizar_informacoes_pessoais").show();
					
					verificar_informacoes_pessoais = 1;
				}
				else if(verificar_informacoes_pessoais == 1)
				{
					document.getElementById('USU_NOME').disabled = true;
					document.getElementById('USU_TELEFONE').disabled = true;
					//document.getElementById('CON_CPF').disabled = true;
					document.getElementById('CON_TELEFONE2').disabled = true;
					document.getElementById('CON_DATA_NASCIMENTO').disabled = true;
					//document.getElementById('USU_EMAIL').disabled = true;
					document.getElementById('CON_ID').disabled = true;
					
					$("#botao_atualizar_informacoes_pessoais").hide();
					
					verificar_informacoes_pessoais = 0;
				}

			};
			
			function endereco() 
			{
				
				if(verificar_endereco == 0)
				{
					document.getElementById('LOC_RUA').disabled = this.checked;
					document.getElementById('LOC_BAIRRO').disabled = this.checked;
					document.getElementById('CON_NUMERO').disabled = this.checked;
					document.getElementById('CON_COMPLEMENTO').disabled = this.checked;
					document.getElementById('LOC_CIDADE').disabled = this.checked;
					document.getElementById('LOC_ESTADO').disabled = this.checked;
					document.getElementById('LOC_CEP').disabled = this.checked;
					
					$("#botao_atualizar_endereco").show();
					
					verificar_endereco = 1;
				}
				else if(verificar_endereco == 1)
				{
					document.getElementById('LOC_RUA').disabled = true;
					document.getElementById('LOC_BAIRRO').disabled = true;
					document.getElementById('CON_NUMERO').disabled = true;
					document.getElementById('CON_COMPLEMENTO').disabled = true;
					document.getElementById('LOC_CIDADE').disabled = true;
					document.getElementById('LOC_ESTADO').disabled = true;
					document.getElementById('LOC_CEP').disabled = true;
					
					$("#botao_atualizar_endereco").hide();
					
					verificar_endereco = 0;
				}

			};
			
			