<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados do Campeonato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e2e2e2;
        }
        .button-container {
            margin-bottom: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }
        .visualizar {
            background-color: #4CAF50;
        }
        .editar {
            background-color: #f39c12;
        }
        .filter-form {
            margin-bottom: 20px;
        }
        .filter-form label {
            margin-right: 10px;
        }
        .modality-table {
            display: none;
            margin-top: 20px;
        }
        .modality-list {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h1>Resultados do Campeonato</h1>
    
    <div class="filter-form">
        <form id="filterForm">
            <label for="modalidade">Modalidade:</label>
            <select id="modalidade" name="modalidade" onchange="filtrarResultados()">
                <option value="">Todas</option>
                <option value="volei">Vôlei</option>
                <option value="natacao">Natação</option>
                <!-- Adicione mais modalidades conforme necessário -->
            </select>
        </form>
    </div>

    <div class="modality-list">
        <table id="resultsTable">
            <thead>
                <tr>
                    <th>Modalidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr data-modalidade="volei">
                    <td>Vôlei</td>
                    <td>
                        <button class="visualizar" onclick="mostrarTabela('volei')">Visualizar</button>
                        <button class="editar" onclick="editarResultados('volei')">Editar</button>
                    </td>
                </tr>
                <tr data-modalidade="natacao">
                    <td>Natação</td>
                    <td>
                        <button class="visualizar" onclick="mostrarTabela('natacao')">Visualizar</button>
                        <button class="editar" onclick="editarResultados('natacao')">Editar</button>
                    </td>
                </tr>
                <!-- Continue o código com mais modalidades e ações conforme necessário -->
            </tbody>
        </table>
    </div>
    
    <script>
        function filtrarResultados() {
            var select = document.getElementById("modalidade");
            var modalidadeSelecionada = select.value;
            var rows = document.querySelectorAll("#resultsTable tbody tr");
            
            rows.forEach(function(row) {
                var modalidade = row.getAttribute("data-modalidade");
                if (modalidadeSelecionada === "" || modalidadeSelecionada === modalidade) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</body>
</html>
