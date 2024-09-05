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
                                        $comentarios = $this->getView()->comentarios;
                                        if(!$comentarios == null) {
                                            echo "<tr class='table'>
                                                <th class='font-weight-bold text-green' scope='col'>Data</th>
                                                <th class='font-weight-bold text-green' scope='col'>Comentário</th>
                                                <th class='font-weight-bold text-green' scope='col'>Ações</th>
                                                </tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                        if($comentarios == null) {
                                            echo "<h2>Não há comentários realizados.</h2>";
                                        }
                                        foreach ($this->getView()->comentarios as $comentario) { 
                                    ?>
                                        <tr>
                                            <td class="col-md-2"><?= $comentario->__get('COM_DATA_HORA'); ?></td>
                                            <td class="col-md-8"><?= $comentario->__get('COM_TEXTO') ?></td>
                                            <td class="d-flex flex-row col-md-2">
                                                <a class="btn btn-success btn-color btn-size mr-2" style="color: white; text-decoration: none" href="/dashboard/editarComentario?id=<?= $comentario->__get('COM_ID'); ?>">Editar</a>
                                                <button class="btn btn-danger btn-size mr-2" style="color: white; text-decoration: none" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir este comentário?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <a class="btn btn-primary bg-danger" href="/dashboard/excluirComentario?id=<?= $comentario->__get('COM_ID'); ?>">Excluir comentário</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
