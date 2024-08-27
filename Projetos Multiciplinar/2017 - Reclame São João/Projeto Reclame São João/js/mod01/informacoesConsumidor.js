// Funções para alterar as informações da empresa

					
					
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
			
			$('#INFORMACOES_PESSOAIS_CONSUMIDOR').on('show.bs.modal', function (event) 
			{
				
				var button = $(event.relatedTarget)
				var recipientid = button.data('whateverid')
				var recipientnome = button.data('whatevernome')
				var recipientcpf = button.data('whatevercpf')
				var recipientdata_nascimento = button.data('whateversite_data')
				var recipientemail = button.data('whateveremail')
				
				
				var modal = $(this)
				modal.find('#id_consumidor').val(recipientid)
				modal.find('#nome').val(recipientnome)
				modal.find('#CPF').val(recipientcpf)
				modal.find('#data_nascimento').val(recipientdata)
				modal.find('#email-text').val(recipientemail)
			
				
			});
			
			