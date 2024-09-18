<?php
    $pagina = "Desativar Funcionarios";
    $local = "../";

    include($local."header.php")
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Desativar Funcionários</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Funcionários Ativos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Especificação</th>
                        <th>Prontuário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Especificação</th>
                        <th>Prontuário</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Maria Clara Martins</td>
                        <td>Médica Pediatra</td>
                        <td>M12345</td>
                        <td><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExcluirFuncionario">Excluir</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Marcos Rocha da Silva</td>
                        <td>Médico Cardiologista</td>
                        <td>m55223</td>
                        <td><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExcluirFuncionario">Excluir</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Larissa Gabrielly Martins</td>
                        <td>Enfermeira</td>
                        <td>E45678</td>
                        <td><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExcluirFuncionario">Excluir</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Gabriel Martins da Silva</td>
                        <td>Secretário Geral</td>
                        <td>s00125</td>
                        <td><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExcluirFuncionario">Excluir</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL DESATIVAR FUNCIONARIO -->
<div class="modal fade" id="ExcluirFuncionario" tabindex="-1" aria-labelledby="ExcluirFuncionario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2BB8B1">
                <h5 class="modal-title" style="color: white">Deseja Desativar este Funcionário? </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="d-flex justify-content-center row">
                    <div class="input-group mb-3 row">
                        <label class="form-label col-4 mt-2" for="username">Prontuário: </label>
                        <input class="form-control col-8" type="text" placeholder="Prontuario" id="username">
                    </div>
                    <div class="input-group mb-3 row">
                        <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                        <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-med" data-dismiss="modal">Desaivar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php
    include($local."footer.php")
?>