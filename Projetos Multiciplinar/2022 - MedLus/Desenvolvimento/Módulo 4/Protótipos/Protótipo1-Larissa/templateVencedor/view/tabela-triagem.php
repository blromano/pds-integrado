<?php
    $pagina = "tabela-triagem";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-5">
    <h1 class="mt-3">Pacientes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Médico</th>
                <th scope="col">Data</th>
                <th scope="col">Triagem</th>
                <th scope="col">Consulta Presencial</th>
                <th scope="col">Histórico de Consulta</th>
                <!--<th scope="col" class="actions text-center">Ações</th>-->
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Renata Mussulino</td>
                <td>Doutor A</td>
                <td>13:00, 11/06/2022</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <!--<td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </td>-->
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Edilson Diniz Silvestre</td>
                <td>Doutor B</td>
                <td>13:00, 11/06/2022</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <!--<td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </td>-->
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Tarcizo Roberto</td>
                <td>Médico C</td>
                <td>13:00, 11/06/2022</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <!--<td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </td>-->
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Alberto Silva Rodrigues</td>
                <td>Médico D</td>
                <td>13:00, 11/06/2022</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Abrir</a>
                </td>
                <!--<td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </td>-->
            </tr>
        </tbody>
    </table>
</section>
<?php
    include "footer.php";
?>