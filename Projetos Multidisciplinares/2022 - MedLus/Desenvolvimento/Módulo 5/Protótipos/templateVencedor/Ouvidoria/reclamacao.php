<?php
    $pagina = "Ouvidoria";
    $footerColado = True;
    include "../view/config.php";
    include "../view/header.php";
?>
<section class="d-flex justify-content-center">

    <form class="border-0 col-sm-12 col-md-6 col-lg-3 w-50">
    <h1 class="mt-3 d-flex justify-content-center ">Ouvidoria</h1>
        <label for="username">Nome</label>
        <input type="text"  id="username">

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Recado</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <label for="username">Motivo</label>
        <input type="text" id="username">

        <label for="username">Indentificação</label>
        <input type="text" id="username">
        <br>
        <button class="btn btn-primary" type="button" >Enviar</button>
    </form>
</section>
<?php
    include "../view/footer.php";
?>