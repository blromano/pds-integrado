<script>
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        };
</script>
<?php if(isset($_GET['msg'])){?>
    <script>    
        Swal.fire({title: '<?php echo $this->getView()->msg; ?>', icon: "success", showCancelButton: false, showConfirmButton: false,});
    </script>
<?php } ?>
<?php 
$hoje = date('Y/m/d');
if (count($this->getView()->pacientes) < 1) { ?>
   <p>Não existem registros de Pacientes</p>
<?php } else {?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pacientes</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Precisa ver se vai cadastrasr apenas os atributos da tabela paciente do banco de dados, ou vai usar os atributos da tabela usuario junto com os atributos da tabela pacientes -->
                      
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Histórico de pagamentos</th>
                                        <th scope="col" class="actions text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->getView()->pacientes as $dado) { ?>
                                    <tr>
                                        <td><?php echo $dado->__get('USU_NOME'); ?></td>
                                        <td><?php echo $dado->__get('USU_CPF'); ?></td>
                                        <td><?php echo $dado->__get('USU_EMAIL'); ?></td>

                                        <?php if($dado->__get("PAG_DATAPAGAMENTO") == "0000-00-00"){?>
                                            <td class="text-warning font-weight-bold">Pendente</td>
                                        <?php }else if($dado->__get("PAG_DATAPAGAMENTO") <= $dado->__get("PAG_DATAVENCIMENTO")){?>
                                            <td class="text-success font-weight-bold">Pago</td>
                                        <?php }else if($hoje > $dado->__get("PAG_DATAVENCIMENTO")){?>
                                            <td class="text-danger font-weight-bold">Atrasado</td>
                                        <?php }?>
                                        
                                        <td class= "action-row text-center"> <a type="button" class="btn btn-primary btn_redondo" href= "/pagamentos">Visualizar pagamentos</a></td>
                                        <td class="action-row text-center">
                                       
                                            <input type="button" onclick="confirmarCadastro();" id="botaodesativa" value="Desativar" class="btn btn-sm btn-danger btn_redondo" />
                                            <!-- desativar e ativar, precisa ver uma forma de fazer isso -->
                                        </tr>
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                <tfoot>
                             </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <script>
    function confirmarCadastro(){
        Swal.fire({
            title: 'Deseja desativar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location='pacientes/desativar?id=<?php echo $dado->__get('PAC_ID'); ?>';
            } else if (result.isDenied) {
                Swal.fire('O Paciente não foi desativado', '', 'info')
            }
            })
    }
</script>