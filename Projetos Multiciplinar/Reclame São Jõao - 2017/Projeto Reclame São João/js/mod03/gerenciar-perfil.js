// Função Para Mostrar ou Ocultar, de acordo com o que for selecionado para editar pelo usuário


			var verificar_informacoes_pessoais = 0;
			var verificar_endereco = 0;
			var verificar_publico_alvo = 0;
			
			function informacoes_pessoais() 
			{
				
				if(verificar_informacoes_pessoais == 0)
				{
					document.getElementById('USU_NOME').disabled = this.checked;
					document.getElementById('USU_TELEFONE').disabled = this.checked;
					document.getElementById('EST_NOME_FANTASIA').disabled = this.checked;
					document.getElementById('EST_NOME_RESPONSAVEL').disabled = this.checked;
					//document.getElementById('EST_CNPJ').disabled = this.checked;
					document.getElementById('EST_FACEBOOK_EMPRESA').disabled = this.checked;
					document.getElementById('EST_SITE_EMPRESA').disabled = this.checked;
					//document.getElementById('USU_EMAIL').disabled = this.checked;
					document.getElementById('TES_ID').disabled = this.checked;
					
					$("#botao_atualizar_informacoes_pessoais").show();
					
					verificar_informacoes_pessoais = 1;
				}
				else if(verificar_informacoes_pessoais == 1)
				{
					document.getElementById('USU_NOME').disabled = true;
					document.getElementById('USU_TELEFONE').disabled = true;
					document.getElementById('EST_NOME_FANTASIA').disabled = true;
					document.getElementById('EST_NOME_RESPONSAVEL').disabled = true;
					//document.getElementById('EST_CNPJ').disabled = true;
					document.getElementById('EST_FACEBOOK_EMPRESA').disabled = true;
					document.getElementById('EST_SITE_EMPRESA').disabled = true;
					//document.getElementById('USU_EMAIL').disabled = true;
					document.getElementById('TES_ID').disabled = true;
					
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
					document.getElementById('EST_NUMERO_ENDERECO').disabled = this.checked;
					document.getElementById('EST_COMPLEMENTO').disabled = this.checked;
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
					document.getElementById('EST_NUMERO_ENDERECO').disabled = true;
					document.getElementById('EST_COMPLEMENTO').disabled = true;
					document.getElementById('LOC_CIDADE').disabled = true;
					document.getElementById('LOC_ESTADO').disabled = true;
					document.getElementById('LOC_CEP').disabled = true;
					
					$("#botao_atualizar_endereco").hide();
					
					verificar_endereco = 0;
				}

			};
			
			function publico_alvo() 
			{
				
				if(verificar_publico_alvo == 0)
				{
					document.getElementById('EST_PUBLICO_ALVO').disabled = this.checked;	
					
					$("#botao_atualizar_publico_alvo").show();
					
					verificar_publico_alvo = 1;
				}
				else if(verificar_publico_alvo == 1)
				{
					document.getElementById('EST_PUBLICO_ALVO').disabled = true;
					
					$("#botao_atualizar_publico_alvo").hide();
					
					verificar_publico_alvo = 0;
				}

			};
			