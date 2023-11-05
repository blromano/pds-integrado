// Função Para Mostrar ou Ocultar, de acordo com o tipo de reclamação selecionado

		// Aparece todas as reclamações
			$("#selecionar-todas-reclamacoes").click(function()
			{
				$("#todas-reclamacoes").show();
				$("#reclamacoes-nao-atendidas").hide();
				$("#reclamacoes-atendidas").hide();
			});
		
		// Aparece apenas as reclamações não atendidas
			$("#selecionar-reclamacoes-nao-atendidas").click(function()
			{
				$("#todas-reclamacoes").hide();
				$("#reclamacoes-nao-atendidas").show();
				$("#reclamacoes-atendidas").hide();
			});
		
		// Aparece apenas as reclamações atendidas
			$("#selecionar-reclamacoes-atendidas").click(function()
			{
				$("#todas-reclamacoes").hide();
				$("#reclamacoes-nao-atendidas").hide();
				$("#reclamacoes-atendidas").show()
			});