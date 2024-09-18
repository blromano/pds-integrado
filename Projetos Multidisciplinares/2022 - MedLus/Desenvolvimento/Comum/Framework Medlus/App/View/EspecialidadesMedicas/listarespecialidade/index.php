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
if (count($this->getView()->EspecialidadesMedicas) < 1) { ?>
   <p>Não existem registros de Especialidades Medicas</p>  <a href="/EspecialidadesMedicas/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
<?php } else {?>     <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">Especialidades Medicas</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" id = "content">
                        <div class="card-body">
                             <div class="posbotao">
                                <a href="/EspecialidadesMedicas/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                        <th scope="col">Especialidade</th>
                                        <th scope="col" class="actions text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->getView()->EspecialidadesMedicas as $dado) { ?>
                                    <tr>
                                        <td><?php echo $dado->__get('ESP_ID'); ?></td>
                                        <td><?php echo $dado->__get('ESP_NOME'); ?></td>
                                        <td class="action-row text-center">
                                        <a href='EspecialidadesMedicos?id=<?php echo $dado->__get('ESP_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-success btn_redondo me-5" >Listar</a>
                                            <a href='EspecialidadesMedicas/editar?id=<?php echo $dado->__get('ESP_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-primary btn_redondo me-5" >Editar</a>
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
                window.location='EspecialidadesMedicas/desativar?id=<?php echo $dado->__get('ESP_ID'); ?>';
            } else if (result.isDenied) {
                Swal.fire('O Especialidade não foi desativada', '', 'info')
            }
            })
    }
</script>
