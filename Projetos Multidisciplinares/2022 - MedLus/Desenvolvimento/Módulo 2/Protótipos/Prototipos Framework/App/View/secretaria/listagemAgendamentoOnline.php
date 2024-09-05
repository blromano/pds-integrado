<?php
    $pagina = "listagemAgendamento";
    $footerColado = True;
    include "../config.php";
    include "../header.php";
    
?>

<section class="container mt-5">
    <h1 class="mt-3">
        Solicitações de Agendamento          
    </h1>
    
    </br>
    <div id="divBusca">
         <a href = "#"> <div class="input-group w-25">
            <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                     <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
            </span>
            <input type="text" class="form-control" placeholder="Nome do paciente" aria-label="Input group example" aria-describedby="basic-addon1">
     </div> </a>
    </br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Médico solicitado</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Renata Mussulino</td>
                <td>Ortopedista</td>
                <td class="action-row">
                <a href="#exampleModal" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
                    <a href="remarcar.php" class="btn btn-sm btn-primary">Remarcar</a>
                    <a href="#" class="btn btn-sm btn-primary">Confirmar</a>
                </tr>
            </td>
            <tr>
                <th scope="row">2</th>
                <td>Edilson Diniz Silvestre</td>
                <td>Otorrinolaringologista</td>
                <td class="action-row">
                <a href="#exampleModal" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
                    <a href="remarcar.php" class="btn btn-sm btn-primary">Remarcar</a>
                    <a href="#" class="btn btn-sm btn-primary">Confirmar</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Tarcizo Roberto</td>
                <td>Cardiologista</td>
                <td class="action-row">
                <a href="#exampleModal" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
                    <a href="remarcar.php" class="btn btn-sm btn-primary">Remarcar</a>
                    <a href="#" class="btn btn-sm btn-primary">Confirmar</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Alberto Silva Rodrigues</td>
                <td>Neurologista</td>
                <td class="action-row">
                    <a href="#exampleModal" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
                    <a href="remarcar.php" class="btn btn-sm btn-primary">Remarcar</a>
                    <a href="#" class="btn btn-sm btn-primary">Confirmar</a>
                </tr>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar Solicitação</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Você tem certeza que deseja confirmar a solicitação para agendamento Online ?
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
    include "../footer.php";
?>