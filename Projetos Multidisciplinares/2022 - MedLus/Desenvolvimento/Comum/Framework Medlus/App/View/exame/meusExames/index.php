<h1 class="h3 mb-2 text-gray-800">Listar Meus Exames</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Meus Exames</h6>
        <a class=" mt-2 btn btn-sm btn-med" href="/exame/solicitar">Solicitar Exame</a>
    </div>
    <?php
    if (count($this->getView()->exames) < 1) { ?>
        <p class="px-5 py-2">Não existem registros de Exames</p>
    <?php } else { ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome do Exame</th>
                            <th>Setor do Atendimento</th>
                            <th>Data Marcada</th>
                            <th>Horário Marcado</th>
                            <th>Guia</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nome do Exame</th>
                            <th>Setor do Atendimento</th>
                            <th>Data Marcada</th>
                            <th>Horário Marcado</th>
                            <th>Guia</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($this->getView()->exames as $exame) { ?>
                            <tr>
                                <td><?php echo $exame->__get('EXA_NOME'); ?></td>
                                <td><?php echo $exame->__get('EXA_SETOR_ATENDIMENTO'); ?></td>
                                <td>
                                    <?php

                                    $exploded_date = explode('-', $exame->__get('EXA_DATA_MARCADA'));
                                    echo $exploded_date[2] . '/' . $exploded_date[1] . '/' . $exploded_date[0];

                                    ?>
                                </td>
                                <td>
                                    <?php 


                                    $exploded_time = explode(':', $exame->__get('EXA_HORARIO'));
                                    echo $exploded_time[0].":".$exploded_time[1];
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="/exame/downloadguia?guia=<?php echo $exame->__get('EXA_URL_GUIA_MEDICA') ?>">
                                        <i class="fas fa-file-download text-dark"></i>
                                    </a>
                                </td>
                                <?php
                                switch ($exame->__get('EXA_STATUS')) {
                                    case 1:
                                        echo '<td class="text-success font-weight-bold">Autorizado</td>';
                                        break;
                                    case 2:
                                        echo '<td>Realizado</td>';
                                        break;
                                    case 3:
                                        echo "<td>Finalizado</td>";
                                        break;
                                    case 4:
                                        echo '<td class="text-danger font-weight-bold">Recusado</td>';
                                        break;
                                    default:
                                        echo '<td>Pendente</td>';
                                        break;
                                }
                                ?>
                                <td class="text-center text-nowrap">
                                    <?php if ($exame->__get('EXA_STATUS') == 0 || $exame->__get('EXA_STATUS') == 4) { ?>
                                        <a href="/exame/editarSolicitacaoExame?id=<?php echo $exame->__get('EXA_ID'); ?>" class="btn btn-sm btn-med mx-2">Editar</a>
                                        <button class="btn btn-sm btn-danger mx-2 cancelarExame" exa-id="<?php echo $exame->__get('EXA_ID'); ?>">Cancelar</button>
                                    <?php } else if ($exame->__get('EXA_STATUS') == 3) { ?>
                                        <a href="#" class="btn btn-sm btn-secondary">Resultados</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

    <!-- CONFIRMAÇÃO EXCLUSÃO -->
    <div class="modal fade" id="modalConfirmarExclusao" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex flex-column align-items-center">
                    <h4 class="text-center">
                        Tem certeza que deseja excluir a solicitação do exame?
                    </h4>
                    <div class="mt-3">
                        <button type="button" class="btn btn-danger mx-1" data-dismiss="modal" data-toggle="modal" data-target="#cancelarExame">Não</button>
                        <a type="button" class="btn btn-med mx-1" id="confirmar-exclusao" href="">Sim</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('.cancelarExame').click(event => {
        const exaId = $(event.target).attr('exa-id')
        $('#confirmar-exclusao').attr('href', `/exame/excluirmeuexame?id=${exaId}`)
        $('#modalConfirmarExclusao').modal('show')
    })
</script>