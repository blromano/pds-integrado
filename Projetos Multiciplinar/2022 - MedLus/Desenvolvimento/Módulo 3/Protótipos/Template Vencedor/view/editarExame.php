<?php
    $pagina = "edicarExame";
    $footerColado = True; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>

<section class="container mt-5 col-12 col-md-8 d-flex flex-column align-items-center">
    <h1>Editar Exame</h1>
    <form action="" method="POST" class="d-flex flex-column mt-5 col-12 col-md-6 col-lg-3">
        <label for="exame">Nome do exame</label>
        <input type="text" placeholder="Nome do exame" class="form-control mb-3" id="exame" value="Ressonância Magnética">

        <label for="data">Data e Horário</label>
        <input type="datetime-local" class="form-control mb-3" id="data" format-value="dd-MM-yyyyTHH:mm">

        <label for="guia">Guia de Exame Médico</label>
        <input type="file" class="custom-file-input form-control mb-5" id="guia">

        <button class="btn btn-primary" type="submit">Confirmar</button>
    </form>
</section>

<?php include "footer.php";?>