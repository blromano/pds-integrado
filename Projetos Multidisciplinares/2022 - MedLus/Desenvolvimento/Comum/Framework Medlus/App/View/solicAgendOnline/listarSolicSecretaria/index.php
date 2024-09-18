

<?php
use App\DAO\UsuarioDAO;
if (count($this->getView()->solicitacoes) < 1) { ?>
    <p>Não existem solicitações de consulta online cadastradas</p>
<?php } else {?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Listar solicitações</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome do Paciente</th>
                        <th scope="col">Especialidade Médica</th>
                        <th scope="col">Data</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="actions text-center">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome do Paciente</th>
                        <th scope="col">Especialidade Médica</th>
                        <th scope="col">Data</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="actions text-center">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                        <?php foreach ($this->getView()->solicitacoes as $dado) { ?>
                            <tr>
                                <td><?php echo $dado->__get('SOL_ID'); ?></td>
                                <td><?php echo $dado->__get('USU_NOME')?></td>
                                <td><?php echo $dado->__get('ESP_NOME')?></td> 
                                <td><?php echo $dado->__get('SOL_DATA')?></td>
                                <td><?php echo $dado->__get('SOL_HORARIO')?></td>
                                    
                                    <?php if($dado->__get("SOL_STATUS") == "0"){?>
                                        <td class="text-warning font-weight-bold">Pendente</td>
                                    <?php }else if($dado->__get("SOL_STATUS") == "1"){?>
                                        <td class="text-success font-weight-bold">Confirmado</td>
                                    <?php }?>  

                                <td class="actions text-center">
                                    <?php if($dado->__get("SOL_STATUS") == "0"){?>
                                        <a class="btn btn-sm btn-med btn_redondo me-5" type="button"  value="confirmar" href='/solicitacoesOnline/confirmar?id=<?php echo $dado->__get('SOL_ID'); ?>' onclick="();">Confirmar</a> 
                                    
                                    <?php }?>  
                                    
                                    
                                    <a href='/solicitacoesOnline/editar?id=<?php echo $dado->__get('SOL_ID'); ?>'  id="botaoremarcar" class="btn btn-sm btn-med btn_redondo me-5" >Remarcar</a> 
                                    <button class="btn btn-sm btn-danger btn_redondo"  type="button"  value="Cancelar" id="botaodesativa" onclick="excluirSolOnline();">Cancelar</button>
                                  
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>

<script>
    function excluirSolOnline(){
        Swal.fire({
            title: 'Deseja excluir?',
            input: 'textarea',
            inputPlaceholder: 'Justificativa de cancelamento',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Solicitação de consulta online excluída com sucesso!', '', 'success')
                window.location='/solicitacoesOnline/excluir?id=<?php echo $dado->__get('SOL_ID'); ?>';
                
            } else if (result.isDenied) {
                Swal.fire('Solicitação de consulta online não foi excluída', '', 'info')
            }
            }) 
    }

</script>




<!-- SELECT DOS MÉDICO DISPONÍVEIS -->

<!-- 
<script>
    function confirmarSolOnline(){

        const { value: fruit } = await Swal.fire({
        title: 'Select field validation',
        input: 'select',
        inputOptions: {
            'Fruits': {
            apples: 'Apples',
            bananas: 'Bananas',
            grapes: 'Grapes',
            oranges: 'Oranges'
            },
            'Vegetables': {
            potato: 'Potato',
            broccoli: 'Broccoli',
            carrot: 'Carrot'
            },
            'icecream': 'Ice cream'
        },
        inputPlaceholder: 'Select a fruit',
        showCancelButton: true,
        inputValidator: (value) => {
            return new Promise((resolve) => {
            if (value === 'oranges') {
                resolve()
            } else {
                resolve('You need to select oranges :)')
            }
            })
        }
        })

        if (fruit) {
        Swal.fire(`You selected: ${fruit}`)
    }
</script>
} -->