<?php
    $pagina = "consultas";
    $footerColado = TRUE;
    include "config.php";
    include "header.php";
?>
<section class="container d-flex justify-content-around col-sm-12 col-md-6 col-lg-6 mb-5">
    <form action="" method="POST" class="">
        <h3>Registrar Consulta Presencial</h3>

        <label for="paciente">Nome do Paciente:</label>
        <input type="text" class="inputs">

        <label for="prontuario">Prontuario do Paciente:</label>
        <input type="text" class="inputs">

        <label for="medico">Médico Responsável:</label>
        <input type="text" class="inputs">

        <label for="medico">Data:</label>
        <input type="datetime-local" class="inputs" id="inform-date">

        <label>Sintomas:</label>
        <textarea class="inputs" rows="4" cols="88" wrap="hard"></textarea>

        <label for="arquivo_pm">Prescrição Médica: <button type="button" class="but-abrir">Abrir</button></label>

        <label for="arquivo_sm">Solicitação de Exames: <button type="button" class="but-abrir">Abrir</button></label>
        

        <label for="internação">Internação: <button type="button" class="but-abrir">Abrir</button></label>
        

        <label for="retorno">Retorno: <input class="form-check-input" type="radio" value="SIM" name="ret" id="retorno"><p id="p-sim">SIM</p><input class="form-check-input" type="radio" value="SIM" name="ret" id="retorno1"><p id="p-nao">NÃO</p></label>
        
        <button type="submit" id="but-salvar">Salvar</button>
        <button type="submit" id="but-cancelar">Cancelar</button>
    </form>
</section>
    <?php include "footer.php";?>