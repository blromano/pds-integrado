

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-med">Consultas Presenciais</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                
                                        <?php if (count($this->getView()->consultasPresenciais) < 1) { ?>
                                            <p>Não existem registros de Pacientes</p>
                                        <?php } else {?>

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Médico</th>
                                            <th>Data</th>
                                            <th>Horário</th>
                                            <th>Triagem</th>
                                            <th>Consulta Presencial</th>
                                            <th>Histórico</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Médico</th>
                                            <th>Data</th>
                                            <th>Horário</th>
                                            <th>Triagem</th>
                                            <th>Consulta Presencial</th>
                                            <th>Histórico</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($this->getView()->consultasPresenciais as $dado) { ?>
                                        <tr>
                                            <td><?php echo $dado->__get('COP_ID'); ?></td>
                                            <td><?php echo $dado->__get('NOME_PACIENTE'); ?></td>
                                            <td><?php echo $dado->__get('NOME_MEDICO'); ?></td>
                                            <td><?php echo $dado->__get('COP_DATA_ATEDIMENTO'); ?></td>
                                            <td><?php echo $dado->__get('COP_HORA_ATENDIMENTO'); ?></td>
                                            <td><a href="/triagem_presencial"><button class="btn btn-primary btn-user btn-block btn-med">Abrir</button></a></td>
                                            <td><a href="/consulta_form?id=<?php echo $dado->__get('COP_ID');?>"><button class="btn btn-primary btn-user btn-block btn-med">Abrir</button></a></td>
                                            <td><button class="btn btn-primary btn-user btn-block btn-med">Abrir</button></td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        <?php } ?>
                    <?php } ?>  

