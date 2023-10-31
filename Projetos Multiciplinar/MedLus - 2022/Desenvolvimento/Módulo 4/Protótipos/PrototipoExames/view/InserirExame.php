<?php
    $pagina = "exemplo";
    $footerColado = true; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>

<section class="container mt-2">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
        <button id="btn1" class="btn" style=" background-color: none; border-color: #2BB8B1;" type="submit">Pesquisar</button>       
    </form>
    <!-- Possibilidades de Remédios -->
    <div id="remedios" class="mt-3">
      
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Exames</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ultrassom
                    <input type="radio" value="Selecionar">
                </td>
                <td>
                    <input type="button" value="editar" class="but-editar">
                    <input type="button" value="excluir" class="but-excluir">
                </td>
            </tr>
            <tr>
                <td>Raio-X
                    <input type="radio" value="Selecionar">
                </td>
            </tr>
            <tr>
                <td>Ressonância
                    <input type="radio" value="Selecionar">
                </td>
            </tr>
            <tr>
                <td>Tomografia
                    <input type="radio" value="Selecionar">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="mt-2">
        <input class="btn btn-primary" type="submit" value="Enviar">
    </div>
    <div class="pop_up_excluir">
            <p>Você deseja realmente excluir esse exame?</p>
            <div class="buttons-edit">
                <button id="butt1">SIM</button>
                <button id="butt2">NÃO</button>
            </div>
        </div>
</section>

<?php
    include "footer.php";
?> 