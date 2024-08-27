<?php
    $pagina = "consultasOnlineConfirmadas";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-5">
    <h1 class="mt-3">
        Consultas Online Confirmadas          
    </h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Médico</th>
                <th scope="col">Especialidade</th>
                <th scope="col">Data e horário</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Renata Mussulino</td>
                <td>Fábio</td>
                <td>Ortopedista</td>
                <td>21/06/22 - 15:15</td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                    <a href="listagem.php" class="btn btn-sm btn-primary">Remarcar</a>
                </tr>
            </td>
            <tr>
                <th scope="row">2</th>
                <td>Edilson Diniz Silvestre</td>
                <td>Fábio</td>          
                <td>Otorrinolaringologista</td>
                <td>21/06/22 - 15:15</td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                    <a href="listagem.php" class="btn btn-sm btn-primary">Remarcar</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Tarcizo Roberto</td>
                <td>Fábio</td>          
                <td>Cardiologista</td>
                <td>21/06/22 - 15:15</td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                    <a href="listagem.php" class="btn btn-sm btn-primary">Remarcar</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Alberto Silva Rodrigues</td>
                <td>Fábio</td>          
                <td>Cardiologista</td>
                <td>21/06/22 - 15:15</td>
                <td class="action-row">
                    <a href="#exampleModal" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
                    <a href="listagem.php" class="btn btn-sm btn-primary">Remarcar</a>
                </tr>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cancelar Agendamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Tem certeza que deseja cancelar seu agendamento de Consulta Online ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sim</button>
            <button type="button" class="btn btn-primary">Não</button>
        </div>
        </div>
    </div>
    </div>
</section>
<?php
    include "footer.php";
?>