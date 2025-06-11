<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Documentos</title>
    <script>
        function limitarCheckbox() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="modalidade[]"]');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkedCount = Array.from(checkboxes).filter(chk => chk.checked).length;

                    if (checkedCount > 2) {
                        this.checked = false; // Desmarcar o checkbox atual
                        alert("Você pode selecionar no máximo duas modalidades.");
                    }

                    // Atualiza a visibilidade do campo de comprovante
                    toggleComprovanteField();
                });
            });
        }

        function toggleComprovanteField() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="modalidade[]"]');
            const comprovanteField = document.getElementById('comprovante-field');
            const isJudoSelected = Array.from(checkboxes).some(chk => chk.checked && chk.dataset.judo === "true");

            comprovanteField.style.display = isJudoSelected ? 'table-row' : 'none';
        }

        function validarFormulario(event) {
            const modalidades = document.querySelectorAll('input[type="checkbox"][name="modalidade[]"]');
            const comprovante = document.getElementById('AIM_COMPROVANTE_FAIXA');

            const modalidadesSelecionadas = Array.from(modalidades).some(checkbox => checkbox.checked);
            const judôSelecionado = document.getElementById('modalidade3').checked; // ID da checkbox do Judô

            if (!modalidadesSelecionadas) {
                alert("Por favor, selecione pelo menos uma modalidade.");
                event.preventDefault(); // Previne o envio do formulário
            }

            // Verifica se "Judô" está selecionado e se o comprovante foi enviado
            if (judôSelecionado && !comprovante.files.length) {
                alert("Por favor, envie o comprovante de faixa para a modalidade Judô.");
                event.preventDefault(); // Previne o envio do formulário
            }
        }

        window.onload = function() {
            limitarCheckbox();
            toggleComprovanteField(); // Verifica a visibilidade ao carregar
        };
    </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .titulo {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .conteudo {
            width: 70%; /* Aumenta a largura da div */
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .instrucao {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
            color: #555;
        }

        .modalidades-table {
            width: 100%; /* Aumenta a largura da tabela para 100% */
            margin: 0 auto;
            border-collapse: collapse;
            text-align: left;
        }

        .modalidades-table th, .modalidades-table td {
            border: 1px solid #ddd;
            padding: 12px; /* Aumenta o padding para dar mais espaço */
            text-align: left;
        }

        .subtitulo {
            text-align: left;
            margin-left: auto;
            margin-right: auto;
            color: #555;
            font-weight: bold;
            font-size:15px;
        }

        .botoes {
            text-align: center;
            margin-top: 30px;
        }

        .enviar, .cancelar {
            width: 150px;
            height: 50px;
            background-color: #3BBFC3;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 25px;
            margin: 0 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .enviar:hover {
            background-color: #34a5a9;
        }

        .cancelar {
            background-color: #ff6b6b;
        }

        .cancelar:hover {
            background-color: #e65a5a;
        }

        input[type="checkbox"] {
            margin: 0 10px;
        }

        input[type="file"] {
            display: block;
            margin: 10px auto;
            width: 95%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        input[type="file"] {
            display: none; /* Oculta o campo de upload */
        }

        .file-input-label {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #3BBFC3;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .file-input-label:hover {
            background-color: #34a5a9; /* Efeito de hover */
        }

        .file-input-label:active {
            background-color: #298f8d; /* Cor mais escura ao clicar */
        }

        .file-input-label.small {
            padding: 6px 15px; /* Reduz o padding */
            font-size: 14px; /* Tamanho de fonte ajustado */
            border-radius: 15px; /* Ajusta o arredondamento do botão */
        }

        input[type="file"]:focus + .file-input-label {
            outline: none;
            border: 2px solid #3BBFC3; /* Destaque no foco */
        }

        /* Ajuste do campo de comprovante para ter o mesmo estilo das outras linhas */
        #comprovante-field {
            display: none;
            width: 100%; /* Garante que a tabela ocupe 100% da largura */
        }

        #comprovante-field td {
            padding: 12px; /* Mesma altura das outras linhas */
        }

        #comprovante-field input[type="file"] {
            width: 100%; /* Ajusta o campo de input */
            margin: 0; /* Remove margens extras */
        }
    </style>
</head>
<body>
    <header>
        <h1 class="titulo">Inscrição em Modalidades</h1>
    </header>
    <main>
        <div class="conteudo">
            <form id="uploadForm" enctype="multipart/form-data" action="/dashboard/listarmeuseventos/inscricao_modalidades/inserir" method="POST" onsubmit="validarFormulario(event)">
                <h4 class="instrucao">Você pode selecionar até duas modalidades esportivas do evento "<?php echo $this->getView()->nomeEvento?>"</h4>
                
                <table class="modalidades-table">
                    <tr>
                        <th>Modalidade</th>
                        <th>Selecionar</th>
                    </tr>

                    <?php 
                        $modalidades= $this->getView()->modalidades;
                        if (!empty($modalidades)): ?>
                        <?php foreach ($modalidades as $modalidade): ?>
                            <tr>
                                <td><?= htmlspecialchars($modalidade->__get('MDE_NOME')) ?></td>
                                <td>
                                <input 
                                    type="checkbox" 
                                    id="modalidadeID_<?php echo $modalidade->__get('EVM_ID'); ?>" 
                                    name="modalidadeID[]" 
                                    value="<?php echo $modalidade->__get('EVM_ID'); ?>" 
                                    <?php echo $modalidade->__get('MDE_NOME') === 'Judô' ? 'data-judo="true"' : ''; ?> 
                                >
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Nenhuma modalidade encontrada para este evento.</td>
                        </tr>
                    <?php endif; ?>
                </table>                
                <div class="botoes">
                    <button type="submit" class="enviar">Enviar</button>
                    <button type="button" class="cancelar" onclick="window.location.href='/dashboard/listarmeuseventos';">Cancelar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
