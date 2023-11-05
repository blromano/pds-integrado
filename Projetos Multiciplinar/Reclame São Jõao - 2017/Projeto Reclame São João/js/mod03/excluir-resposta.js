// Função Para Excluir Resposta de uma Reclamação

			$('#EXCLUIR-RESPOSTA').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget)
				
				var recipientnum = button.data('whatever')
				var recipientvisualizarresposta = button.data('whatevervisualizarresposta')
				
				
				var modal = $(this)
				modal.find('#recipient-resposta-exclusao').val(recipientvisualizarresposta)
				modal.find('#recipient-numero-resposta').val(recipientnum)
			})