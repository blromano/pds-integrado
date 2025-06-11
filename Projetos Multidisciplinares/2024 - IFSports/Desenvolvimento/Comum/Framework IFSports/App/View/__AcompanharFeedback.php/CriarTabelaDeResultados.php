<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Tabelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .input-cell, .input-header {
            width: 150px;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <h1>Criar Tabelas de Resultados</h1>
    <form id="tableForm">
        <label for="numRows">Número de linhas:</label>
        <input type="number" id="numRows" name="numRows" min="1" required>
        <br><br>
        <label for="numCols">Número de colunas:</label>
        <input type="number" id="numCols" name="numCols" min="1" required>
        <br><br>
        <button type="button" onclick="generateTable()">Gerar Tabela</button>
    </form>
    <div id="tableContainer"></div>

    <script>
        function generateTable() {
            // Obtendo os valores do formulário
            const numRows = parseInt(document.getElementById('numRows').value);
            const numCols = parseInt(document.getElementById('numCols').value);

            // Validando os valores
            if (isNaN(numRows) || isNaN(numCols) || numRows <= 0 || numCols <= 0) {
                alert('Por favor, insira números válidos.');
                return;
            }

            // Criando o formulário para editar o conteúdo das células e nomes das colunas
            let tableHtml = '<form id="contentForm"><table><thead><tr>';
            // Adicionando campos para os nomes das colunas
            for (let i = 1; i <= numCols; i++) {
                tableHtml += `<th><input type="text" class="input-header" name="header-${i}" placeholder="Nome Coluna ${i}" required></th>`;
            }
            tableHtml += '</tr></thead><tbody>';

            // Adicionando as linhas e células com campos de entrada
            for (let i = 1; i <= numRows; i++) {
                tableHtml += '<tr>';
                for (let j = 1; j <= numCols; j++) {
                    tableHtml += `<td><input type="text" class="input-cell" name="cell-${i}-${j}" placeholder="Celula ${i}-${j}"></td>`;
                }
                tableHtml += '</tr>';
            }
            tableHtml += '</tbody></table>';
            tableHtml += '<br><button type="button" onclick="submitTable()">Salvar Tabela</button></form>';

            // Adicionando a tabela ao container
            document.getElementById('tableContainer').innerHTML = tableHtml;
        }

        function submitTable() {
            // Obtendo os dados do formulário
            const form = document.getElementById('contentForm');
            const formData = new FormData(form);

            // Criando a tabela final com o conteúdo inserido
            let finalTableHtml = '<table><thead><tr>';
            const numCols = parseInt(document.getElementById('numCols').value);

            // Adicionando os nomes das colunas
            for (let i = 1; i <= numCols; i++) {
                const headerName = formData.get(`header-${i}`);
                finalTableHtml += `<th>${headerName || `Coluna ${i}`}</th>`;
            }
            finalTableHtml += '</tr></thead><tbody>';

            // Adicionando as linhas e células com o conteúdo inserido
            const numRows = parseInt(document.getElementById('numRows').value);
            for (let i = 1; i <= numRows; i++) {
                finalTableHtml += '<tr>';
                for (let j = 1; j <= numCols; j++) {
                    const cellName = `cell-${i}-${j}`;
                    const cellValue = formData.get(cellName);
                    finalTableHtml += `<td>${cellValue || ''}</td>`;
                }
                finalTableHtml += '</tr>';
            }
            finalTableHtml += '</tbody></table>';

            // Adicionando a tabela final ao container
            document.getElementById('tableContainer').innerHTML = finalTableHtml;
        }
    </script>
</body>
</html>
