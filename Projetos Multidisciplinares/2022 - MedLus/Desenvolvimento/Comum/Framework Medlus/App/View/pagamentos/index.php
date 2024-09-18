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
if (count($this->getView()->pagamentos) < 1) { ?>
   <p>Não existem registros de Pagamentos</p>  <a href="/pagamentos/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
<?php } else {?>     <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">Pagamentos</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                             <div class="posbotao">
                                <a href="/pagamentos/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Data de Pagamento</th>
                                    <th scope="col">Data de Vencimento</th>
                                    <th scope="col">Valor do Pagamento</th>
                                    <th scope="col">Id do Plano</th>
                                    <th scope="col">Id do Paciente</th>

                                    <th scope="col" class="actions text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->getView()->pagamentos as $dado) { ?>
                                <tr>
                                    <td><?php echo $dado->__get('PAG_ID'); ?></td>
                                    <td><?php echo $dado->__get('PAG_DATAPAGAMENTO'); ?></td>
                                    <td><?php echo $dado->__get('PAG_DATAVENCIMENTO'); ?></td>
                                    <td><?php echo $dado->__get('PAG_VALORPAGAMENTO'); ?></td>
                                    <td><?php echo $dado->__get('FK_PLANOS_PLA_ID'); ?></td>
                                    <td><?php echo $dado->__get('FK_PACIENTES_PAC_ID'); ?></td>


                                    <td class="action-row text-center">
                                        <a href='pagamentos/editar?id=<?php echo $dado->__get('PAG_ID'); ?>'  id="PopoverCustomT-1" class="btn btn-sm btn-primary btn_redondo me-5" data-id="<?php echo $dado->__get('PAG_ID'); ?>" >Editar</a>
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
                window.location='pagamentos/excluir?id=<?php echo $dado->__get('PAG_ID'); ?>';
            } else if (result.isDenied) {
                Swal.fire('O pagamento não foi desativado', '', 'info')
            }
            })
    }
</script>