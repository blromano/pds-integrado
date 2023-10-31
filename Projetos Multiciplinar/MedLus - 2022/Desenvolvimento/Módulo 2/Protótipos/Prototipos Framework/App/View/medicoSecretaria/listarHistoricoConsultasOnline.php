<?php
    $pagina = "tabela";
    $footerColado = True;
    include "../config.php";
    include "../header.php";
?>

<section class="container mt-5">
    <h1 class="mt-3">
        Histórico de consultas    
    </h1>
    </br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col ">ID da Consulta</th>
                <th scope="col">Médico</th>
                <th scope="col">Especialidade</th>
                <th scope="col">Status</th>
                <th scope="col"> Data de Ínicio e Termino</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr >
                <th scope="row"class="">1</th>
                <td>Rodrigo</td>
                <td>Cardiologista</td>
                <td>Finalizada</td>
                <td>27/05 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td class="action-row">
                    <a href="prototipo-21.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="prototipo-22.php" class="btn btn-sm btn-primary">Editar Dados</a>                       
                </tr>
            </td>
            <tr>
                <th scope="row"class="">2</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>Finalizada</td>
                <td>30/05 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td class="action-row">
                    <a href="prototipo-21.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="prototipo-22.php" class="btn btn-sm btn-primary">Editar Dados</a>                       
                </tr>
            </td>
            <tr>
                <th scope="row"class="">3</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>Finalizada</td>
                <td>02/06 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td class="action-row">
                    <a href="prototipo-21.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="prototipo-22.php" class="btn btn-sm btn-primary">Editar Dados</a>                       
                </tr>
            </td>
            <tr>
                <th scope="row"class="">4</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>Finalizada</td>
                <td>08/06 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td class="action-row">
                    <a href="prototipo-21.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="prototipo-22.php" class="btn btn-sm btn-primary">Editar Dados</a>                       
                </tr>
            </td>
            <tr>
                <th scope="row"class="">5</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>Finalizada</td>
                <td>12/06 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td class="action-row">
                    <a href="prototipo-21.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="prototipo-22.php" class="btn btn-sm btn-primary">Editar Dados</a>                       
                </tr>
            </td>
        </tbody>
    </table>
</section>
<?php
    include "../footer.php";;
?>