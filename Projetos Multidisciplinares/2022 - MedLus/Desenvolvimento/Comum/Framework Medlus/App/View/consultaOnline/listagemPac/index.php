<?php
if (count($this->getView()->pacientes) < 1) { ?>
    <p>Não existem registros de pacientes vinculados a consultas online</p>
<?php } else { ?>

    <!-- PStatus Heading -->
    <h1 class="h3 mb-2 text-gray-800">Histórico Geral de Pacientes</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome do paciente</th>
                            <th scope="col " class="actions text-center">Visualizar Histórico</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome do paciente</th>
                            <th colspan="2">Visualizar Histórico</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($this->getView()->pacientes as $dado) { ?>
                            <tr>
                                <td><?php echo $dado->__get('PAC_ID'); ?></td>
                                <td><?php echo $dado->__get('USU_NOME'); ?> </td>

                                <td class="text-center">
                                    <?php ?>
                                        <a class="btn btn-sm btn-med" href='historico?id=<?php echo $dado->__get('PAC_ID'); ?>'>Visualizar Histórico</a><?php
                                                                                                                                    ?>
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
        function CancelarConsulta() {
            Swal.fire({
                title: 'Deseja desativar?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sim',
                denyButtonText: `não`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Tipo de rémedio desativado com sucesso!', '', 'success')
                    window.location = 'excluir?id=<?php echo $dado->__get('CTO_ID'); ?>';
                } else if (result.isDenied) {
                    Swal.fire('O Tipo de remédio não foi desativado', '', 'info')
                }
            })
        }
    </script>