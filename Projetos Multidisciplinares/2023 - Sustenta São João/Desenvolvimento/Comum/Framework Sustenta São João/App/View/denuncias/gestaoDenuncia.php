<head>
    <style>
        .title-link {
            color: black;
            transition: all 0.2s ease-in-out;
        }

        .title-link:hover {
            color: #5b8e8b;
            text-decoration: none;
        }

        .link{
            text-decoration: none;
            text-decoration-color: white;
            text-decoration-line: none;
            color: white;
        }

        .text-green{
            color: #3eb84d;
        }

        .bg-green{
            background-color: #3eb84d;
            color: white;
        }
    </style>
</head>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title"><?= $this->getView()->title; ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table-striped">
                                <thead>
                                    <?php
                                        if(!$this->getView()->denuncias == null) {
                                            echo "<tr class='table'>
                                                <th class='font-weight-bold text-green' scope='col'>Local</th>
                                                <th class='font-weight-bold text-green' scope='col'>Data da postagem</th>
                                                <th class='font-weight-bold text-green' scope='col'>Usuário</th>
                                                <th class='font-weight-bold text-green' scope='col'>E-mail</th>
                                                <th class='font-weight-bold text-green' scope='col'>Status</th>
                                                <th class='font-weight-bold text-green' scope='col'>Ações</th>
                                                </tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                        if($this->getView()->denuncias == null) {
                                            echo "<h2>Não há denúncias realizadas.</h2>";
                                        }
                                        foreach ($this->getView()->denuncias as $denuncia) { 
                                    ?>
                                        <tr>
                                            <td> <a class="title-link" href=""><?= $denuncia->__get('DEN_RUA'); ?></a> </td>
                                            <td><?= $denuncia->__get('DEN_DATA_PUBLICACAO'); ?></td>
                                            <td> <a class="title-link" href=""><?= $denuncia->__get('USU_NOME'); ?></a> </td>
                                            <td> <a class="title-link" href=""><?= $denuncia->__get('USU_EMAIL'); ?></a> </td>
                                            <td>
                                                <?php if ($denuncia->__get('DEN_STATUS_DENUNCIA') == "A") { ?>
                                                    <span class="text-warning">Em andamento</span>
                                                <?php } elseif ($denuncia->__get('DEN_STATUS_DENUNCIA') == "R") { ?>
                                                    <span class="text-success">Solucionado</span>
                                                <?php } elseif ($denuncia->__get('DEN_STATUS_DENUNCIA') == "NR") { ?>
                                                    <span class="text-danger">Não solucionado</span>
                                                <?php } ?>
                                            </td>
                                            <td class="d-flex flex-row">
                                                <a class="btn btn-warning btn-size mr-2" style="color: white; text-decoration: none" href="/dashboard/alterarStatusDenuncia?DEN_ID=<?= $denuncia->__get('DEN_ID'); ?>&DEN_STATUS_DENUNCIA=A">Em Andamento</a>
                                                <a class="btn btn-success btn-color btn-size mr-2" style="color: white; text-decoration: none" href="/dashboard/alterarStatusDenuncia?DEN_ID=<?= $denuncia->__get('DEN_ID'); ?>&DEN_STATUS_DENUNCIA=R">Solucionado</a>
                                                
                                                <a class="btn btn-danger btn-size mr-2" style="color: white; text-decoration: none" href="/dashboard/alterarStatusDenuncia?DEN_ID=<?= $denuncia->__get('DEN_ID'); ?>&DEN_STATUS_DENUNCIA=NR">Não Solucionado</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Excluir -->
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir essa denúncia?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <a class="btn btn-primary bg-danger" href="/dashboard/excluir-denuncia?id=<?= $denuncia->__get('DEN_ID'); ?>">Excluir denúncia</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Reenviar -->
                    <div class="modal fade" id="modalReenviar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja reenviar essa denúncia? </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <a class="btn btn-primary bg-danger" href="/dashboard/excluir-denuncia?id=<?= $denuncia->__get('DEN_ID'); ?>">Reenviar denúncia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
