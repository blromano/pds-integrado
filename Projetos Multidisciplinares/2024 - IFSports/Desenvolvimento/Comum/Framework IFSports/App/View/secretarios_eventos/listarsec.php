<link rel="stylesheet" href="../../resources/css/modalidades.css">
<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div>
                <div class="col-lg-7 title_evento"> <?php echo $this->getView()->texto ?> </div>
                <div class="col-lg-5 btn_add">
                    <p class="card-description">
                        <a href="/dashboard/secretarios_eventos/cadastrar" class="btn btn-success"> 
                            <i class="mdi mdi-plus"></i>
                        </a>
                    </p>
                </div>
            </div>
            <br clear="all">

            <div class="table-responsive pt-3">
                <table id="tabela" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="centralize">ID</th>
                            <th class="centralize">Secretários</th>
                            <th class="centralize">Campus</th>
                            <th class="centralize">Status</th>
                            <th class="centralize">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($this->getView()->secretarios_eventos as $secretario_eventos){ ?>
                        <tr>
                            <td><?php echo $secretario_eventos->__get('SCE_ID'); ?></td>
                            <td><?php echo $secretario_eventos->__get('SCE_NOME'); ?></td>
                            <td><?php echo $secretario_eventos->__get('CAM_NOME'); ?></td>
                            <td>
                            <?php 
                                $status = $secretario_eventos->__get('LGN_ATIVO');
                                if ($status == 1) {
                                    echo 'Ativo';
                                } elseif ($status == 2) {
                                    echo 'Inativo';
                                } else {
                                    echo 'Desconhecido';
                                }
                            ?>
                            </td>
                            <td>
                                <a href="/dashboard/secretarios_eventos/editar?SCE_ID=<?php echo $secretario_eventos->__get('SCE_ID'); ?>" class="btn btn-dark"><i class="mdi mdi-pencil"></i></a>
                                <a href="/dashboard/secretarios_eventos/status?LGN_ID=<?php echo $secretario_eventos->__get('FK_LOGIN_LGN_ID'); ?>" class="btn btn-danger" ><?php echo $this->getView()->icone_restringir; ?></a>
                                <a href="/dashboard/secretarios_eventos/mudarsenha?LGN_ID=<?php echo $secretario_eventos->__get('FK_LOGIN_LGN_ID'); ?>" class="btn btn-info btn-rounded btn-fw" ><?php echo $this->getView()->icone_mudar; ?></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#tabela').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
            },
            "responsive": true
        }).draw(true).columns.adjust();
    });
</script>