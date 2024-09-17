<?php
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/Consulta.css">
    </head>
    <body>
        <div class="modal-container">
            <div class="modal">
                <hr />
                    <span>
                        Ao cliclar em salvar você confirma que todos os dados inseridos estão corretos 
                        , ou seja, não são necessárias mais alterações.
                        <br/>Deseja realmente salvá-lo?
                    </span>
                <hr />
                    <div class="btns">
                        <button class="btnOK" onclick="closeModal()">SALVAR</button>
                        <button class="btnClose" onclick="closeModal()">CANCELAR</button>
                    </div>
            </div>
        </div>
        
        <div class="area">
            <div class="top">
                <h2>Registrar Consulta Presencial</h2>
            </div>
            <div class="middle">
                <p>Paciente: João Batista</p>
                <p id="pront">Prontuário: F57398</p>
                <p id="enfer">Médico Responsável: Roberto Alves</p>
                <p>Data: <input id="date1" type="date"></p>
                <p>Sintomas: <br><textarea name="sintomas" id="sint" cols="40" rows="20" wrap="hard"></textarea></p>
                <p>Prescrição Médica: <input class="arquivos" type="button" value="Adicionar"></p>
                <p>Solicitação de Exames: <input class="arquivos" type="button" value="Adicionar"></p>
                <p>Internação: <input class="arquivos" type="button" value="Adicionar"></p>
                <p>Retorno: <input id="retorno" type="checkbox"><input id="date2" type="date"></p>
            </div>
            <div class="bottom">
                <button class="salv" onclick="openModal()">Salvar</button>
                <button class="canc">Cancelar</button>
            </div>
        </div>
    
        <script src="JS/script.js"></script>
    </body>
</html>