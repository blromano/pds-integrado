<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Internações Médicas</h1>

    </div>
    <div class="card-body">
    <a href="/internacoes_medicas"><button class="btn btn-primary btn-user btn-block btn-med">Adicionar Internação Médica</button></a>
    <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                
                                        <?php if (count($this->getView()->internacoesMedicas) < 1) { ?>
                                            <p>Não existem registros de Internações</p>
                                        <?php } else {?>

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($this->getView()->internacoesMedicas as $dado) { ?>
                                        <tr>
                                            <td><?php echo $dado->__get('INM_ID') ; ?></td>
                                            <td><a href="/internacoes_medicas/editar?id=<?php echo $dado->__get('INM_ID'); ?>"><button class="btn btn-primary btn-user btn-block btn-med">Abrir</button></a></td>
                                            <td><a href='/internacoes_medicas/excluir?id=<?php echo $dado->__get('INM_ID'); ?>'><button class="btn btn-primary btn-user btn-block btn-med">Deletar</button></a></td>
                                        </tr>
                                        <?php } ?>
                                <?php } ?>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    