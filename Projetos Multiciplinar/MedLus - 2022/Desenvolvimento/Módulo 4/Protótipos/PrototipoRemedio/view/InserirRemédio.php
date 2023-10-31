<?php
    $pagina = "listagem";
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
    <div class="table-responsive mx-auto">
        <table class="table text-center table-striped">
            <thead>
                <tr>
                    <th scope="col">Remédios</th>
                    <th scope="col">Período</th>
                    <th scope="col">Periodicidade</th>  
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Neosaldina
                        <input type="radio" value="Selecionar">
                    </td>
                    <td>1</td>
                    <td>8</td>
                    <td>
                        <input type="button" value="editar" class="but-editar">
                        <input type="button" value="excluir" class="but-excluir">
                    </td>
                </tr>
                <tr>
                    <td>Dorflex
                        <input type="radio" value="Selecionar">
                    </td>
                </tr>
                <tr>
                    <td>Ibuprofeno
                        <input type="radio" value="Selecionar">
                    </td>
                </tr>
                <tr>
                    <td>Parasetamol
                        <input type="radio" value="Selecionar">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-2">
        <input id="but-enviar" class="btn btn-primary" type="submit" value="Enviar">
            </div>
    </div>

    <div class="pop_up_excluir">
            <h3>ULTRASSOM</h3>
            <h6>OBSERVAÇÕES</h6>
            <textarea name="" id="comment-edit" cols="60" rows="6" wrap="hard"></textarea>
            <div class="buttons-edit">
                <button id="butt1">SALVAR</button>
                <button id="butt2">CANCELAR</button>
            </div>
        </div>
</section>

<?php
    include "footer.php";
?> 