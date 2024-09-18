<?php 
if (count($this->getView()->consultas_online) < 1) { ?>
    <p>Não existem registros de consultas online</p>
<?php } else {?>

<!-- PStatus Heading -->
<h1 class="h3 mb-2 text-gray-800">Histórico consultas online</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col ">ID da Consulta</th>
                        <th scope="col ">Médico</th>
                        <th scope="col ">Especialidade</th>
                        <th scope="col ">Início</th>
                        <th scope="col ">Termino</th>
                        <th scope="col ">Status</th>
                        <th scope="col " class="actions text-center">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID da Consulta</th>
                        <th>Médico</th>
                        <th>Especialidade</th>
                        <th>Ínicio</th>
                        <th>Termino</th>
                        <th>Status</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($this->getView()->consultas_online as $dado) { ?>
                    <tr>
                    <td><?php echo $dado->__get('CTO_ID'); ?></td>
                        <td><?php echo $dado->__get('MED_NOME'); ?> </td>
                        <td><?php echo $dado->__get('ESP_NOME'); ?> </td>
                        <td><?php echo $dado->__get('CTO_HORA_INICIO'); ?></td>
                        <td>
                        <?php if ($dado->__get('CTO_HORA_TERMINO') != '00:00:00') { ?>
                            <p><?php echo $dado->__get('CTO_HORA_TERMINO'); ?> </p> 
                            <?php } else {?> <p> --:--</p><?php } ?>
                        </td>
                        </td>
                        <td>
                        <?php if ($dado->__get('CTO_STATUS') == 0) { ?>
                            <a href = <?php echo $dado->__get('CTO_LINK_MEET'); ?> ><?php echo $dado->__get('CTO_LINK_MEET'); ?> </a> 
                            <?php } else {?> <p> Finalizada</p><?php } ?>
                        </td>

                        <td class="text-center">
                        <?php if ($dado->__get('CTO_STATUS') == 0) { ?>
                          <a href='editar?id=<?php echo $dado->__get('CTO_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-med" data-id="<?php echo $dado->__get('CTO_ID'); ?>" >Remarcar</a>
                                    <a class="btn btn-sm btn-med" href='detalhes?id=<?php echo $dado->__get('CTO_ID'); ?>' >Detalhes</a>
                                <input type="button" onclick="CancelarConsulta();" id="botaodesativa" value="Cancelar" class="btn btn-sm btn-danger"/>
                                <?php 
                            } 
                            else {?>
                                <a class="btn btn-sm btn-med" href='detalhes?id=<?php echo $dado->__get('CTO_ID'); ?>' >Detalhes</a>
                                <a class="btn btn-sm btn-med" href='/../triagemonline/cadastrar?id=<?php echo $dado->__get('CTO_ID'); ?>' >Triagem Online</a><?php 
                        }?>
                        </td>
                    </tr>

                    
                <?php } ?>
                </tbody>
            </table>
            <?php } ?> 
        </div>
    </div>
</div>

<script>
    function CancelarConsulta(){
        Swal.fire({
            title: 'Deseja desativar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Consulta Online cancelada com sucesso!', '', 'success')
                window.location='excluir?id=<?php echo $dado->__get('CTO_ID'); ?>';
            } else if (result.isDenied) {
                Swal.fire('Consulta Online não cancelada', '', 'info')
            }
            })
    }
</script>