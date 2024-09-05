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
        <input type="text" class="inputs" placeholder="Renata Cristina Mussulino Peixoto">

        <label for="medico">Nome do Médico</label>
        <input type="text" class="inputs" placeholder="Doutor Ademir">

        <label>Causa da Internação</label>
        <textarea class="inputs" rows="4" cols="88">Hemorragia.</textarea>

        <label for="arquivo">Prescrição Médica(.png,.jpg,.pdf)</label>
        <input type="file">

        <label for="necessidades">Necessidades Clínicas</label>
        <input type="text" class="inputs" placeholder="Não foram requisitadas.">

        <label for="tempo">Tempo de permanência</label>
        <input type="text" class="inputs" placeholder="3">

        <label for="acomp">Acompanhamento Clínico</label>
        <input type="text" class="inputs" placeholder="Paciente estável.">

        <button type="submit">Editar</button>

        <button id="exc" class="btn btn-danger">Excluir</button>

        <div class="pop_up_excluir">
            <p>Você realmente deseja excluir a internação desse paciente?<br /></p>
            <button class="btn btn-primary">SIM</button>
            <button class="btn btn-primary">CANCELAR</button>
        </div>
    </form>
</section>

    <?php include "footer.php";?>