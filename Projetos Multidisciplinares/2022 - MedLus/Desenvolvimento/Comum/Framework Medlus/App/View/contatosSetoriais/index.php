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
if (count($this->getView()->contatos_setoriais) < 1) { ?>
   <p>Não existem registros de Contatos</p>  <a href="/contatosSetoriais/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
<?php } else {?>     <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">Contatos</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                             <div class="posbotao">
                                <a href="/contatosSetoriais/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Whatsapp</th>
                                    <th scope="col">Setor</th>
                                    <th scope="col">Id da Secretaria</th>

                                    <th scope="col" class="actions text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->getView()->contatos_setoriais as $dado) { ?>
                                <tr>
                                    <td><?php echo $dado->__get('CTT_ID'); ?></td>
                                    <td><?php echo $dado->__get('CTT_RESPONSAVEL'); ?></td>
                                    <td><?php echo $dado->__get('CTT_EMAIL'); ?></td>
                                    <td><?php echo $dado->__get('CTT_TELEFONE'); ?></td>
                                    <td><?php echo $dado->__get('CTT_WHATSAAP'); ?></td>
                                    <td><?php echo $dado->__get('CTT_SETOR'); ?></td>
                                    <td><?php echo $dado->__get('FK_SECRETARIAS_SEC_ID'); ?></td>


                                    <td class="action-row text-center">
                                        <a href='contatosSetoriais/editar?id=<?php echo $dado->__get('CTT_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-primary btn_redondo me-5" data-id="<?php echo $dado->__get('CTT_ID'); ?>" >Editar</a>
                                        <input type="button" onclick="confirmarCadastro();" id="botaodesativa" value="Desativar" class="btn btn-sm btn-danger btn_redondo" />
                                    </tr>
                                </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            <tfoot>
                    </table>
                    <?php } ?>
                            </div>
                            </div>
                            </div>
                            



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
       
                window.location='contatosSetoriais/excluir?id=<?php echo $dado->__get('CTT_ID'); ?>';
            } else if (result.isDenied) {
                Swal.fire('O contato não foi desativado', '', 'info')
            }
            })
    }
</script>