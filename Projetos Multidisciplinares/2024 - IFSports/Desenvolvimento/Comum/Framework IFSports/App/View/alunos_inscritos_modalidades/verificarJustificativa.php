<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Inscrição</title>
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
            transition: background-color 0.3s;
        }
        .file-input-label:hover {
            background-color: #34a5a9;
        }
        .botoes {
            text-align: center;
            margin-top: 30px;
        }
        .cancelar {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #ff6b6b;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            border: none;
        }
        .cancelar:hover {
            background-color: #e65a5a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalhes da Inscrição</h1>
        <?php if (!empty($this->getView()->inscricoes) ) {?>
            <?php foreach ($this->getView()->inscricoes as $inscricao): ?>
                <table class="table">
                    <tr>
                        <th>Campo</th>
                        <th>Detalhes</th>
                    </tr>
                    <tr>
                        <td>Aluno</td>
                        <td><?php echo ($inscricao['ALU_NOME'] ?? 'Não encontrado') ?></td>
                    </tr>
                    <tr>
                        <td>Evento</td>
                        <td><?php echo ($inscricao['EVO_NOME'] ?? 'Não encontrado') ?></td>
                    </tr>
                    <tr>
                        <td>Modalidade</td>
                        <td><?php echo ($inscricao['MDE_NOME'] ?? 'Não encontrado') ?></td>
                    </tr>
                    <tr>
                        <td>Justificativa</td>
                        <td><?php echo ($inscricao['AIM_JUSTIFICATIVA'] ?? 'Não há justificativa registrada para esta inscrição.') ?></td>
                    </tr>
                </table>

                <h2>Seus Documentos</h2>
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
                    <button type="button" class="cancelar" onclick="window.location.href='/dashboard/listarmeuseventos'">Voltar</button>
                </div>
            <?php endforeach; ?>
        <?php } else {?>
            <p style="text-align: center; font-size: 18px; color: #555;">Não há pendências de inscrição para este aluno.</p>
            <div class="botoes">
                    <button type="button" class="cancelar" onclick="window.location.href='/dashboard/listarmeuseventos'">Voltar</button>
                </div>
        <?php } ?>
    </div>
</body>

</html>
