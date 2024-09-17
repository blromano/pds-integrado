<?php
    $pagina = "Interface_Autorização";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-4">
    <h1 class="mt-3">
        Listar Exames     
    </h1>
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">Nome do Paciente</th>
                <th scope="col">Nome do Exame</th>
                <th scope="col">Data Marcada</th>
                <th scope="col">Estado do Exame</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"><?php echo $nome_paciente = "Victor Emanuel"?></td>
                <td><?php echo $nome_exame = "Exame de Urina"?></td>
                <td><?php echo $data = "13/12/1981"?></td>
                <td class="text-success fw-bold"><?php echo $estado_exame = "Aceito"?></td>
                <td class="text-center text-nowrap mx-auto">
                    <a href="#" class="btn btn-sm btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#DetalhesEx1">Detalhes</a>
                    <!-- Modal Dentro do Detalhar -->
                    <div class="modal fade" id="DetalhesEx1" tabindex="-1" aria-labelledby="DetalhesEx1" aria-hidden="true">
                        <!-- Dados do Detalhar -->
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:  #2BB8B1">
                                    <h5 class="modal-title" style="color: white" id=""><?php echo $nome_exame = "Exame de Urina"?></h5>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <ul class="text-start list-group list-group-flush">
                                            <li class="list-group-item">
                                                <p>Nome do Paciente: <?php echo $nome = "Victor Emanuel"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>CPF: <?php echo $cpf = "19634726932"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Nome do Exame: <?php echo $nome_exame = "Urina"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Data de Criação: <?php echo $data = "31/12/1981"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Setor de Atendimento: <?php echo $setor = "UTI"?></ps>
                                            </li>          
                                            <li class="list-group-item text-success fw-bold">
                                                <p>Estado da Solicitação: <?php echo $estado = "Realizado"?></p>
                                            </li> 
                                        </ul>
                                    </div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <!-- Botão Autorizar e Excluir-->
                                    <a class="btn btn-sm btn-success mx-2" type="button" data-bs-toggle="modal" data-bs-target="#Autorizar01" data-bs-dismiss="modal">Autorizar</a>
                                    <a class="btn btn-sm btn-secondary mx-2" type="button" data-bs-toggle="modal" data-bs-target="#Recusar01" data-bs-dismiss="modal">Recusar</a>
                                    <a class="btn btn-sm btn-danger mx-2" type="button" data-bs-toggle="modal" data-bs-target="#Excluir01" data-bs-dismiss="modal">Excluir</a>
                                    <!-- Download e Cancelar -->
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#Download01" data-bs-dismiss="modal"><i class="bi bi-download"></i></button>
                                    <button type="button" class="btn btn-light"data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL DOWNLOAD -->
                    <div class="modal fade" id="Download01">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Download em Andamento"?></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Recusar do Interior do Detalhar -->
                    <div class="modal fade" id="Recusar01">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="desc">Justificativa: </label>
                                            <textarea class="form-control col-8" type="text" placeholder="Justificativa" id="ID"></textarea>
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Autorizar do Interior do Detalhar -->
                    <div class="modal fade" id="Autorizar01">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Excluir do Interior do Detalhar -->
                    <div class="modal fade" id="Excluir01">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal UPLOAD de Guia -->
                    <a class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#UploadExame">
                        <i class="bi bi-upload"></i>
                    </a>
                    <div class="modal fade" id="UploadExame" tabindex="-1" aria-labelledby="UploadExame" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered"">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $mensagem = "Adicionar Arquivo: "?></h5>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label" for="customFile"></label>
                                            <input type="file" class="form-control" id="customFile" />
                                        </div>
                                    </form>
                                    <button type="Submit" class="btn btn-success"data-bs-dismiss="modal" data-bs-target="#ConfirmarUpload01" data-bs-toggle="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Cancelar</button>
                                </div>          
                            </div>
                        </div>
                    </div>
                    <!-- MODAL CONFIRMAR UPLOAD -->
                    <div class="modal fade" id="ConfirmarUpload01">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="row"><?php echo $nome_paciente = "Arthur"?></td>
                <td><?php echo $nome_exame = "Exame de Sangue"?></td>
                <td><?php echo $data = "13/12/1999"?></td>
                <td class="text-warning fw-bold"><?php echo $estado_exame = "Pendente"?></td>
                <td class="text-center text-nowrap mx-auto">
                    <a href="#" class="btn btn-sm btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#DetalhesEx2">Detalhes</a>
                    <!-- Modal Dentro do Detalhar -->
                    <div class="modal fade" id="DetalhesEx2" tabindex="-1" aria-labelledby="DetalhesEx2" aria-hidden="true">
                        <!-- Dados do Detalhar -->
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:  #2BB8B1">
                                    <h5 class="modal-title" style="color: white" id="Detalhar"><?php echo $nome_exame = "Exame de Urina"?></h5>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <ul class="text-start list-group list-group-flush">
                                            <li class="list-group-item">
                                                <p>Nome do Paciente: <?php echo $nome = "Arthur"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>CPF: <?php echo $cpf = "84374304730"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Nome do Exame: <?php echo $nome_exame = "Sangue"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Data de Criação: <?php echo $data = "31/12/1999"?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Setor de Atendimento: <?php echo $setor = "UTI"?></ps>
                                            </li>   
                                            <li class="list-group-item text-warning fw-bold">
                                                <p>Estado da Solicitação: <?php echo $estado = "Pendente"?></p>
                                            </li> 
                                        </ul>
                                    </div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <!-- Botão Autorizar e Excluir-->
                                    <a class="btn btn-sm btn-success mx-2" type="button" data-bs-toggle="modal" data-bs-target="#Autorizar02" data-bs-dismiss="modal">Autorizar</a>
                                    <a class="btn btn-sm btn-secondary mx-2" type="button" data-bs-toggle="modal" data-bs-target="#Recusar02" data-bs-dismiss="modal">Recusar</a>
                                    <a class="btn btn-sm btn-danger mx-2" type="button" data-bs-toggle="modal" data-bs-target="#Excluir02" data-bs-dismiss="modal">Excluir</a>
                                    <!-- Download e Cancelar -->
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#Download02" data-bs-dismiss="modal"><i class="bi bi-download"></i></button>
                                    <button type="button" class="btn btn-light"data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- MODAL DOWNLOAD -->
                     <div class="modal fade" id="Download02">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Download em Andamento"?></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Recusar do Interior do Detalhar -->
                    <div class="modal fade" id="Recusar02">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="desc">Justificativa: </label>
                                            <textarea class="form-control col-8" type="text" placeholder="Justificativa" id="ID"></textarea>
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Autorizar do Interior do Detalhar -->
                    <div class="modal fade" id="Autorizar02">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Excluir do Interior do Detalhar -->
                    <div class="modal fade" id="Excluir02">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal UPLOAD de Guia -->
                    <a class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#UploadExame">
                        <i class="bi bi-upload"></i>
                    </a>
                    <div class="modal fade" id="UploadExame" tabindex="-1" aria-labelledby="UploadExame" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered"">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $mensagem = "Adicionar Arquivo: "?></h5>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label" for="customFile"></label>
                                            <input type="file" class="form-control" id="customFile" />
                                        </div>
                                    </form>
                                    <button type="Submit" class="btn btn-success"data-bs-dismiss="modal" data-bs-target="#ConfirmarUpload02" data-bs-toggle="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Cancelar</button>
                                </div>          
                            </div>
                        </div>
                    </div>
                    <!-- MODAL CONFIRMAR UPLOAD -->
                    <div class="modal fade" id="ConfirmarUpload02">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="d-flex justify-content-center row">
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                            <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                        </div>
                                        <div class="input-group mb-3 row">
                                            <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                            <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</section>
<?php
    include "footer.php";
?>