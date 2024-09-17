<?php
    $pagina = "login";
    $footerColado = True;
    include "config.php";
    include "header.php";

?>
<?php echo $cssLogin; ?>

    <form action="" method="POST" class="col-sm-22 col-md-6 col-lg-13 conteudo_triagem">
        <h3>Triagem</h3>
        
        <label for="username">Paciente</label>
        <input type="text" placeholder="Nome do Paciente" id="nome" maxlength="60">

        <label for="username">CPF</label>
        <input type="text" placeholder="Digite apenas os números" id="cpf" maxlength="11">

        <label for="username">Prontuário</label>
        <input type="text" placeholder="Prontuário" id="prontuario" maxlength="6">

        <label for="username">Data do Atendimento</label>
        <div class="input-daterange input-group" id="dteAtual"> 
            <input type="date" class="form-control input-data dtAtual" runat="server" id="dtAtual" name="dtAtual" data-mask="99/99/9999" />
        </div>

        <label for="username">Horário do Atendimento</label>
        <div class=""> 
            <input type="time" id="hAtual" name="hAtual"  />
        </div>

        <label for="username">Setor de Atendimento</label>
        <input type="text" placeholder="Setor de Atendimento" id="nome" maxlength="60">

        <label for="username">Pressão Sistólica</label>
        <input type="number" placeholder="Pressão Sistólica" id="pressão" maxlength="3">

        <label for="username">Pressão Diastólica</label>
        <input type="number" placeholder="Pressão Diastólica" id="pressão" maxlength="3">

        <label for="username">Peso</label>
        <input type="float" placeholder="Peso" id="peso" maxlength="4">

        <label for="username">Altura</label>
        <input type="float" placeholder="Altura" id="altura" maxlength="3">

        <label for="username">Sintomas</label>
        <input type="text" placeholder="Sintomas do Paciente" id="sintomas" maxlength="200">

        <label for="username">Temperatura</label>
        <input type="float" placeholder="Temperatura" id="temperatura" maxlength="3">

        <label for="username">Alergias</label>
        <input type="text" placeholder="Alergias do Paciente" id="alergias" maxlength="150">

        <label for="username">Informações adicionais</label>
        <input type="text" placeholder="Informações adicionais" id="info add" maxlength="100">

        <label for="preferencial">Atendimento Preferencial</label>
            <select id="preferencial" name="preferencial">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>

        <button type="submit">Entrar</button>
    </form>
    <?php include "footer.php";?>