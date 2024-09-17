<?php
    $pagina = "internacoes";
    $footerColado = TRUE;
    include "config.php";
    include "header.php";
?>
<section class="container d-flex justify-content-around col-sm-12 col-md-6 col-lg-6 mb-5">
    <form action="" method="POST" class="">
        <h3>Internação</h3>

        <label for="paciente">Nome do Paciente</label>
        <input type="text" class="inputs">

        <label for="medico">Nome do Médico</label>
        <input type="text" class="inputs">

        <label>Causa da Internação</label>
        <textarea class="inputs" rows="4" cols="88"></textarea>

        <label for="arquivo">Prescrição Médica(.png,.jpg,.pdf)</label>
        <input type="file">

        <label for="necessidades">Necessidades Clínicas</label>
        <input type="text" class="inputs">

        <label for="tempo">Tempo de permanência</label>
        <input type="text" class="inputs">

        <label for="acomp">Acompanhamento Clínico</label>
        <input type="text" class="inputs">

        <button type="submit">Enviar</button>
    </form>
</section>
    <?php include "footer.php";?>