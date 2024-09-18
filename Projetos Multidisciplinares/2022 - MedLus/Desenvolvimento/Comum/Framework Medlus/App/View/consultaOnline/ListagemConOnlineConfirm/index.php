<?php 
if (count($this->getView()->consultas_online) < 1) { ?>
    <p>Não existem registros de consultas online</p>
<?php } else {?>

<!-- PStatus Heading -->
<h1 class="h3 mb-2 text-gray-800">Consultas online Confirmadas</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col ">ID da Consulta</th>
                        <th scope="col ">Nome</th>
                        <th scope="col ">Médico</th>
                        <th scope="col ">Especialidade</th>
                        <th scope="col ">Data</th>
                        <th scope="col ">Horário</th>
                        <th scope="col " class="actions text-center">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID da Consulta</th>
                        <th>Nome</th>
                        <th>Médico</th>
                        <th>Especialidade</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($this->getView()->consultas_online as $dado) { ?>
                    <tr>
                    <td><?php echo $dado->__get('CTO_ID'); ?></td>
                        <td><?php echo $dado->__get('PAC_NOME'); ?> </td>
                        <td><?php echo $dado->__get('MED_NOME'); ?> </td>
                        <td><?php echo $dado->__get('ESP_NOME'); ?></td>
                        <td><?php echo $dado->__get('CTO_DATA'); ?></td>
                        </td>
                        <td><?php echo $dado->__get('CTO_HORA_INICIO'); ?></td>

                        <td class="text-center">
                        <?php if ($dado->__get('CTO_STATUS') == 0) { ?>
                            <a href='editarSec?id=<?php echo $dado->__get('CTO_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-med" data-id="<?php echo $dado->__get('CTO_ID'); ?>" >Remarcar</a>
                                <input type="button" onclick="CancelarConsulta();" id="botaodesativa" value="Cancelar" class="btn btn-sm btn-danger"/>
                            <?php } else {?> <p> Finalizada</p><?php } ?>
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