<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar Inscrição</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        h4 {
            color: #555;
            font-size: 16px;
            margin: 15px 0;
        }
        .textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            resize: none;
            font-size: 14px;
            background-color: #fefefe;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }
        .textarea:focus {
            border-color: #3BBFC3;
            outline: none;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        .button {
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }
        .button.enviar {
            background-color: #3BBFC3;
        }
        .button.enviar:hover {
            background-color: #34a5a9;
            transform: scale(1.05);
        }
        .button.cancelar {
            background-color: #ff6b6b;
        }
        .button.cancelar:hover {
            background-color: #e65a5a;
            transform: scale(1.05);
        }
    </style>
    <script>
        // Função para validar a justificativa antes de enviar o formulário
        function validarFormulario(event) {
            const justificativa = document.querySelector('textarea[name="AIE_JUSTIFICATIVA"]');
            if (justificativa.value.length < 10 || justificativa.value.length > 300) {
                alert("A justificativa deve ter entre 10 e 300 caracteres.");
                event.preventDefault();  // Evita o envio do formulário caso a justificativa não esteja no formato correto
            }
        }
        
        // Função para redirecionar o usuário para a página de "Meus Eventos"
        function redirecionarMeusEventosAluno() {
            window.location.href = "/dashboard/listarmeuseventos";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Cancelar Minha Inscrição</h1>
        <!-- Mostra o nome do evento para o usuário -->
        <h4>Tem certeza de que deseja cancelar sua inscrição no evento "<?php echo $this->getView()->nomeEvento; ?>"?</h4>
        <form action="/meus_eventos_aluno/cancelar_inscricao/excluir" method="POST" onsubmit="validarFormulario(event)">
            <h4>Justificativa:</h4>
            <!-- Campo de texto para justificar o cancelamento -->
            <textarea name="AIE_JUSTIFICATIVA" id="AIE_JUSTIFICATIVA" class="textarea" required></textarea>
            <!-- Campo oculto para passar o AIE_ID -->
            <input type="hidden" name="AIE_ID" value="<?php echo $_POST['AIE_ID']?>">
            <div class="button-container">
                <!-- Botões de envio e cancelamento -->
                <button type="submit" class="button enviar">Enviar</button>
                <button type="button" class="button cancelar" onclick="redirecionarMeusEventosAluno()">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
