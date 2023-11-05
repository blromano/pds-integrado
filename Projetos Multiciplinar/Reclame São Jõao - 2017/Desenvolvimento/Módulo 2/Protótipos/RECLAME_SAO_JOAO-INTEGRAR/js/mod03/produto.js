// Funções Relacionadas aos Produtos

		// Alterar Produto	
			$('#ALTERAR_PRODUTO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget)
				var recipient = button.data('whatever')
				var recipientnome = button.data('whatevernome')
				var recipientdetalhes = button.data('whateverdetalhes')
				var recipienttipo = button.data('whatevertipo')
				
				var modal = $(this)
				
				modal.find('#recipient-numero-produto').val(recipient)
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
			
		// Visualizar Produto	
			$('#VISUALIZAR_PRODUTO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget)
				
				var recipientnum = button.data('whatever')
				var recipientvisualizarproduto = button.data('whatevervisualizarproduto')
				var recipientvisualizardescricao = button.data('whatevervisualizardescricao')
				var recipientvisualizartipo = button.data('whatevervisualizartipo')
				
				
				var modal = $(this)
				modal.find('#recipient-nome-produto').val(recipientvisualizarproduto)
				modal.find('#recipient-descricao-produto').val(recipientvisualizardescricao)
				modal.find('#recipient-numero-produto').val(recipientnum)
				
				if(recipientvisualizartipo == 1)
				{ 
					modal.find('#recipient-tipo-produto').val('Alimentício');
				}
				else if(recipientvisualizartipo == 2)
				{ 
					modal.find('#recipient-tipo-produto').val('Cosmético');
				}
				else if(recipientvisualizartipo == 3)
				{ 
					modal.find('#recipient-tipo-produto').val('Vestimento');
				}
			});
		
		// Excluir Produto	
			$('#EXCLUIR_PRODUTO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget)
				
				var recipientnum = button.data('whatever')
				var recipientvisualizarproduto = button.data('whatevervisualizarproduto')
				
				
				var modal = $(this)
				modal.find('#recipient-nome-produto-exclusao').val(recipientvisualizarproduto)
				modal.find('#recipient-numero-produto').val(recipientnum)
			});
			