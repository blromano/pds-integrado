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
if (count($this->getView()->EspecialidadesMedicos) < 1) { ?>
   <p>Não existem registros de médicos desta especialidade </p>  <a href="/EspecialidadesMedicos/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
<?php } else {?>  
    

                <!-- Page Heading -->
                <?php 
                $pagnome = array_column($this->getView()->EspecialidadesMedicos, 'ESP_NOME');
                $titlepag = $pagnome[0];
                ?>
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $titlepag;?> </h1>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" id = "content">
                        <div class="card-body">
                             <div class="posbotao">
                                <a href="/EspecialidadesMedicos/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Formação</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Whatsapp</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col" class="actions text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->getView()->EspecialidadesMedicos as $dado) { ?>
                                    <tr>
                                        <td><?php echo $dado->__get('USU_NOME'); ?></td>
                                        <td><?php echo $dado->__get('MED_FORMACAO'); ?></td>
                                        <td><?php echo $dado->__get('MED_EMAIL_PROFISSIONAL'); ?></td>
                                        <td><?php echo $dado->__get('MED_TELEFONE_PROFISSIONAL'); ?></td>
                                        <td><?php echo $dado->__get('USU_NUMERO_CELULAR'); ?></td>
                                        <td><?php echo $dado->__get('USU_NUMERO_RESIDENCIA'); ?></td>
                                        <td class="action-row text-center">
                                            <a href='EspecialidadesMedicos/editar?id=<?php echo $dado->__get('EPM_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-primary btn_redondo me-5" >Editar</a>
                                            <input type="button" onclick="confirmarCadastro();" id="botaodesativa" value="Desativar" class="btn btn-sm btn-danger btn_redondo" />
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
                window.location='EspecialidadesMedicos/desativar?id=<?php echo $dado->__get('EPM_ID'); ?>';
            } else if (result.isDenied) {
                Swal.fire('A Especialidade do Médico não foi desativado', '', 'info')
            }
            })
    }
</script>