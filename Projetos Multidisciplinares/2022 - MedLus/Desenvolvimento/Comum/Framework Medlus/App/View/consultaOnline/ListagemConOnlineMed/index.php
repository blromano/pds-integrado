<?php 
if (count($this->getView()->consultas_online) < 1) { ?>
    <p>Não existem registros de consultas online</p>
<?php } else {?>

<!-- PStatus Heading -->
<h1 class="h3 mb-2 text-gray-800">Minhas Consultas</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col ">ID da Consulta</th>
                        <th scope="col ">Paciente</th>
                        <th scope="col ">Data</th>
                        <th scope="col ">Horário</th>
                        <th scope="col ">Link da Consulta</th>
                        <th scope="col " class="actions text-center">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID da Consulta</th>
                        <th>Paciente</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Link da Consulta</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($this->getView()->consultas_online as $dado) { ?>
                    <tr>
                    <td><?php echo $dado->__get('CTO_ID'); ?></td>
                        <td><?php echo $dado->__get('PAC_NOME'); ?> </td>
                        <td><?php echo $dado->__get('CTO_DATA'); ?> </td>
                        <td><?php echo $dado->__get('CTO_HORA_INICIO'); ?></td>
                        <td>
                        <?php if ($dado->__get('CTO_STATUS') == 0) { ?>
                            <a href = <?php echo $dado->__get('CTO_LINK_MEET'); ?> ><?php echo $dado->__get('CTO_LINK_MEET'); ?> </a> 
                            <?php } else {?> <p> Finalizada</p><?php } ?>
                        </td>
                        <td class="text-center"> <a class="btn btn-sm btn-med" href='historico?id=<?php echo $dado->__get('CTO_ID'); ?>' >Visualizar</a><?php}?></td>
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