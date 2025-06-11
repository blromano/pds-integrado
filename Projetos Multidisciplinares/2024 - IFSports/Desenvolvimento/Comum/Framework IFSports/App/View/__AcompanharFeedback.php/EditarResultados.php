<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados do Campeonato</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
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
        .first {
            background-color: gold;
            color: black;
            font-weight: bold;
        }
        .second {
            background-color: #c0c0c0;
            color: black;
            font-weight: bold;
        }
        .third {
            background-color: #cd7f32;
            color: black;
            font-weight: bold;
        }
        .edit-button {
            margin-top: 20px;
            display: block;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Classificação do Vôlei</h1>
    <br><br><br><br>
    <table id="resultsTable">
        <thead>
            <tr>
                <th>Posição</th>
                <th>Equipe</th>
                <th>Vitórias</th>
            </tr>
        </thead>
        <tbody>
            <tr class="first">
                <td>1º</td>
                <td contenteditable="false">Equipe A</td>
                <td contenteditable="false">35</td>
            </tr>
            <tr class="second">
                <td>2º</td>
                <td contenteditable="false">Equipe B</td>
                <td contenteditable="false">30</td>
            </tr>
            <tr class="third">
                <td>3º</td>
                <td contenteditable="false">Equipe C</td>
                <td contenteditable="false">28</td>
            </tr>
        </tbody>
    </table>

    <div class="edit-button">
        <button onclick="toggleEdit()">Editar</button>
        <button onclick="saveChanges()" style="display:none;">Salvar</button>
    </div>

    <script>
        function toggleEdit() {
            var table = document.getElementById("resultsTable");
            var cells = table.querySelectorAll("td[contenteditable='false']");
            cells.forEach(function(cell) {
                cell.setAttribute("contenteditable", "true");
            });
            document.querySelector(".edit-button button").style.display = "none";
            document.querySelector(".edit-button button:last-child").style.display = "inline";
        }

        function saveChanges() {
            var table = document.getElementById("resultsTable");
            var cells = table.querySelectorAll("td[contenteditable='true']");
            cells.forEach(function(cell) {
                cell.setAttribute("contenteditable", "false");
            });
            document.querySelector(".edit-button button").style.display = "inline";
            document.querySelector(".edit-button button:last-child").style.display = "none";
        }
    </script>
</body>
</html>
