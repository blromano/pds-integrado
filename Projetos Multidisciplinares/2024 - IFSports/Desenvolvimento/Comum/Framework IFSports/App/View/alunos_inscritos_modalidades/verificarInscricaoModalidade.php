<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Inscrição do Aluno</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px 10px;
            text-align: center;
            font-size: 14px;
        }
        .table th {
            background-color: #f5f5f5;
            color: #555;
        }
        .table td:first-child {
            text-align: left;
            font-weight: bold;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .status-container {
            margin-top: 20px;
            text-align: center;
        }
        .status-container input {
            margin-right: 15px;
        }
        .justificativa-container {
            display: none;
            margin-top: 20px;
        }
        .justificativa-container label {
            font-weight: bold;
        }
        .justificativa-container textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .botoes {
            text-align: center;
            margin-top: 30px;
        }
        .botoes button {
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #3BBFC3;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }
        .botoes button:hover {
            background-color: #34a5a9;
        }
        .cancelar {
            background-color: #ff6b6b;
        }
        .cancelar:hover {
            background-color: #e65a5a;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Exibe ou oculta o campo de justificativa dependendo do status
            $('input[name="deferido"]').on('change', function() {
                if ($(this).val() === '0') {
                    $('#justificativa-group').show();
                    $('#justificativa').prop('required', true);
                } else {
                    $('#justificativa-group').hide();
                    $('#justificativa').prop('required', false);
                }
            });

            // Validação do formulário antes do envio
            $('form').on('submit', function(e) {
                // Se o status for "Deferir", definimos o valor da justificativa como null
                if ($('input[name="deferido"]:checked').val() === '1') {
                    $('#justificativa').val(null);
                }

                // A justificativa será enviada independentemente do status
                // Caso o status seja "indeferir", ela não será null, mas caso contrário será null
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Verificar Inscrição do Aluno</h1>

        <form action="/listar_alunos_modalidades/verificar/homologar" method="POST">
            <input type="hidden" id="AIM_ID" name="AIM_ID" value="<?php echo $this->getView()->aluno_inscrito_modalidades->__get('AIM_ID'); ?>">
            
            <!-- Detalhes do Aluno e Inscrição -->
            <table class="table">
                <tr>
                    <th>Campo</th>
                    <th>Detalhes</th>
                </tr>
                <tr>
                    <td>Nome do Aluno</td>
                    <td><?php echo $this->getView()->aluno_inscrito_modalidades->__get('AIM_NOME'); ?></td>
                </tr>
                <tr>
                    <td>Prontuário</td>
                    <td><?php echo $this->getView()->aluno_inscrito_modalidades->__get('AIM_PRONTUARIO'); ?></td>
                </tr>
                <tr>
                    <td>CPF</td>
                    <td><?php echo $this->getView()->aluno_inscrito_modalidades->__get('AIM_CPF'); ?></td>
                </tr>
                <tr>
                    <td>Modalidade</td>
                    <td><?php echo $this->getView()->nomeModalidade ?></td>
                </tr>
                <tr>
                    <td>Evento</td>
                    <td><?php echo $this->getView()->nomeEvento ?></td>
                </tr>
            </table>

            <!-- Status da Inscrição -->
            <div class="status-container">
                <label>Status da Inscrição:</label><br>
                <input type="radio" id="deferido" name="deferido" value="1" checked> Deferir
                <input type="radio" id="deferido" name="deferido" value="0"> Indeferir
            </div>

            <!-- Justificativa -->
            <div class="justificativa-container" id="justificativa-group">
                <label for="justificativa">Justificativa (obrigatória caso indeferido):</label>
                <textarea class="form-control" id="justificativa" name="justificativa" rows="3"></textarea>
            </div>

            <!-- Documentos -->
            <h2>Documentos Enviados</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo de Arquivo</th>
                        <th>Arquivo Atual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $documentos = ($this->getView()->documentos);
                        if (isset($documentos) && !empty($documentos)) {
                            $labels = [
                                'AIE_COPIA_RG' => 'CÓPIA DO RG',
                                'AIE_FOTO_PESSOAL' => 'FOTO PESSOAL',
                                'AIE_AUTORIZACAO_PAIS' => 'AUTORIZAÇÃO DOS PAIS',
                                'AIE_BOLETIM_ESCOLAR' => 'BOLETIM ESCOLAR',
                            ];
                            foreach ($documentos as $docName => $docValue) {
                                echo "<tr>";
                                echo "<td>{$labels[$docName]}</td>";
                                echo $docValue 
                                    ? "<td><a href='../../../resources/uploads/documentos/{$docValue}' download>Baixar</a></td>"
                                    : "<td>Documento não enviado</td>";
                                echo "</tr>";
                            }
                        } else {
                            throw new Exception("Nenhum documento encontrado.");
                        }
                    } catch (Exception $e) {
                        echo "<tr><td colspan='2'>Erro: " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="botoes">
                <button type="submit">Enviar</button>
                <button type="button" class="cancelar" onclick="window.location.href='/dashboard/eventos/listar'">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
