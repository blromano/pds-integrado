<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Documentos</title>
    <style>
    /* Estilos mantidos do código original */
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
        margin: 10px 0;
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
        transition: background-color 0.3s;
    }
    .file-input-label:hover {
        background-color: #34a5a9;
    }
    .botoes {
        text-align: center;
        margin-top: 30px;
    }
    .enviar, .cancelar {
        display: inline-block;
        padding: 12px 25px;
        font-size: 16px;
        font-weight: bold;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 25px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        border: none;
    }
    .enviar {
        background-color: #3BBFC3;
    }
    .enviar:hover {
        background-color: #34a5a9;
        transform: scale(1.05);
    }
    .cancelar {
        background-color: #ff6b6b;
    }
    .cancelar:hover {
        background-color: #e65a5a;
        transform: scale(1.05);
        
    }
    .file-input-label.small {
    padding: 6px 15px; /* Reduz o padding */
    font-size: 12px; /* Diminui o tamanho da fonte */
    border-radius: 15px; /* Ajusta o arredondamento */ }

    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Documentos</h1>
        <form action="/meus_eventos_aluno/editar_documentos/inserir" method="POST" enctype="multipart/form-data">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo de Arquivo</th>
                        <th>Arquivo Atual</th>
                        <th>Substituir Arquivo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    try {
                        $documentos = ($this->getView()->documentos);
                    
                        // Verifica se o array de documentos não está vazio
                        if (isset($documentos) && !empty($documentos)) {
                            
                            $labels = [
                                'AIE_COPIA_RG' => 'CÓPIA DO RG',
                                'AIE_FOTO_PESSOAL' => 'FOTO PESSOAL',
                                'AIE_AUTORIZACAO_PAIS' => 'AUTORIZAÇÃO DOS PAIS',
                                'AIE_BOLETIM_ESCOLAR' => 'BOLETIM ESCOLAR',
                            ];
                    
                            $i = 0;
                            foreach ($documentos as $docName => $docValue) {
                                if ($i >= count($labels)) break; // Limita ao número de documentos disponíveis
                    
                                // Formata o nome do documento para exibição
                                $documentoLabel = str_replace('AIE_', '', $docName); 
                                $documentoLabel = str_replace('_', ' ', $documentoLabel);
                                $documentoLabel = ucfirst(strtolower($documentoLabel)); 
                    
                                echo "<tr>";
                                echo "<td>" . $labels[$docName] . "</td>";
                                echo $docValue 
                                    ? "<td><a href='../../../resources/uploads/documentos/{$docValue}' download>Baixar</a></td>"
                                    : "<td>Documento não enviado</td>";
                                echo "<td><label for='{$docName}' class='file-input-label small'>Escolher Documento</label><input type='file' id='{$docName}' name='{$docName}' accept='.pdf, .jpg, .jpeg, .png'></td>";
                                echo "</tr>";
                    
                                $i++;
                            }
                    
                        } else {
                            throw new Exception("Nenhum documento encontrado.");
                        }
                    } catch (Exception $e) {
                        echo "<tr><td colspan='3'>Erro: " . $e->getMessage() . "</td></tr>";
                    }
                    
                ?>
                </tbody>
            </table>
            <input type="hidden" name="AIE_ID" value="<?php echo $_POST['AIE_ID']?>"> <!-- ID do registro -->
            <div class="botoes">
                <button type="submit" class="enviar">Salvar Alterações</button>
                </form>
                <button type="button" onclick="window.location.href='/dashboard/listarmeuseventos'" class="cancelar">Cancelar</button>
            </div>
    </div>
</body>
</html>
