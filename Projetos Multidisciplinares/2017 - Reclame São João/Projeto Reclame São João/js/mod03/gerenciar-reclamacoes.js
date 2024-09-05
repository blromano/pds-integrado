// Função Para Mostrar ou Ocultar, de acordo com o tipo de reclamação selecionado

			$("#reclamacoesatendidas").hide();
			$("#reclamacoes").hide();
			$("#reclamacoes_nao_atendidas").hide();
		// Aparece todas as reclamações
			$("#reclamacoes").click(function()
			{
				$("#reclamacoes").show();
			});
		
		// Aparece apenas as reclamações não atendidas
			$("#reclamacoesatendidas").click(function()
			{
				$("#reclamacoesatendidas").show();
			});
		
		// Aparece apenas as reclamações atendidas
			$("#reclamacoes_nao_atendidas").click(function()
			{
				$("#reclamacoes_nao_atendidas").show()
			});