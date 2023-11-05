// Funções para alterar as informações da empresa

			$('#ALTERAR_PRODUTO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientdetalhes = button.data('whateverdetalhes')
				var recipienttipo = button.data('whatevertipo')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				//modal.find('.modal-title').text('ID do Produto: ' + recipient)
				modal.find('#id_curso').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#detalhes-text').val(recipientdetalhes)
				
				if(recipienttipo == 1)
				{
					radiobtn = document.getElementById("tipo1-text");
					radiobtn.checked = true;
				}
				else if(recipienttipo == 2)
				{
					radiobtn = document.getElementById("tipo2-text");
					radiobtn.checked = true;
				}
				else if(recipienttipo == 3)
				{
					radiobtn = document.getElementById("tipo3-text");
					radiobtn.checked = true;
				}
			});
			
			$('#INFORMACOES_EMPRESA').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipientid = button.data('whateverid') // Extract info from data-* attributes
				var recipientpublico_alvo = button.data('whateverpublico')
				var recipientvisao_geral = button.data('whatevervisao')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('#outro').val(recipientid)
				modal.find('#publico-alvo-text').val(recipientpublico_alvo)
				modal.find('#visao-geral-text').val(recipientvisao_geral)
			});
			
			$('#ENDERECO_EMPRESA').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var recipientidendereco = button.data('whateveridendereco')
				var recipientcep = button.data('whatevercep')
				var recipientcidade = button.data('whatevercidade')
				var recipientrua = button.data('whateverrua')
				var recipientbairro = button.data('whateverbairro')
				var recipientnumero = button.data('whatevernumero')
				var recipientcomplemento = button.data('whatevercomplemento')
				
				var modal = $(this)
				modal.find('#id_endereco').val(recipientidendereco)
				modal.find('#cep-text').val(recipientcep)
				modal.find('#cidade-text').val(recipientcidade)
				modal.find('#rua-text').val(recipientrua)
				modal.find('#bairro-text').val(recipientbairro)
				modal.find('#numero-text').val(recipientnumero)
				modal.find('#complemento-text').val(recipientcomplemento)
				
				
			});
			
			$('#INFORMACOES_PESSOAIS_EMPRESA').on('show.bs.modal', function (event) 
			{
				
				var button = $(event.relatedTarget)
				var recipientid = button.data('whateverid')
				var recipientnome_empresa = button.data('whatevernome_empresa')
				var recipientnome_fantasia = button.data('whatevernome_fantasia')
				var recipientnome_responsavel = button.data('whatevernome_responsavel')
				var recipientcnpj = button.data('whatevercnpj')
				var recipientsite_empresa = button.data('whateversite_empresa')
				var recipientemail = button.data('whateveremail')
				var recipienttipo_estabelecimento = button.data('whatevertipo_estabelecimento')
				
				
				var modal = $(this)
				modal.find('#id_empresa').val(recipientid)
				modal.find('#nome_empresa-text').val(recipientnome_empresa)
				modal.find('#nome_fantasia-text').val(recipientnome_fantasia)
				modal.find('#nome_responsavel-text').val(recipientnome_responsavel)
				modal.find('#CNPJ-text').val(recipientcnpj)
				modal.find('#site_empresa-text').val(recipientsite_empresa)
				modal.find('#email-text').val(recipientemail)
				modal.find('#tipo_estabelecimento-text').val(recipienttipo_estabelecimento)
			
				
			});
			
			$('#INFORMACOES_EMPRESA').on('show.bs.modal', function (event) 
			{
				
				var button = $(event.relatedTarget)
				var recipientid = button.data('whateverid')
				var recipientpublicoalvo = button.data('whateverpublico')
				
				var modal = $(this)
				modal.find('#id_empresa').val(recipientid)
				modal.find('#publico-alvo-text').val(recipientpublicoalvo)
			
				
			});