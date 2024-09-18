<script>
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        };
</script>
<?php if(isset($_GET['msg'])){?>
    <?php if(str_ends_with($_GET['msg'], 'Sucesso')){?>
        <script>    
        Swal.fire({title: $_GET['msg'].replace(/_/g," "), icon: "success", showCancelButton: false, showConfirmButton: false,});
        </script>
    <?php } else{?>
    <script>    
        Swal.fire({title: $_GET['msg'].replace(/_/g," "), });
    </script>
<?php } ?>
<?php } ?>
<?php 
if (count($this->getView()->solicitacoes) < 1) { ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Minhas Solicitações de Compras</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID da Solicitação</th>
                        <th>Nome do Produto</th>
                        <th>Preço Total</th>
                        <th>Quantidade</th>
                        <th>Data Marcada</th>
                        <th>Status da Solicitação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <td valign="top" colspan="5" class="dataTables_empty">Não Existem Dados Cadastrados</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } else {?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="mt-1 m-0 font-weight-bold text-med">Minhas Solicitações de Compras</h6>
        <a class="btn btn-sm btn-med ml-auto" href="/solicitacaoproduto/solicitacaoProduto">Solicitar Compra </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID da Solicitação</th>
                        <th>Nome do Produto</th>
                        <th>Preço Total</th>
                        <th>Quantidade</th>
                        <th>Data Marcada</th>
                        <th>Status da Solicitação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($this->getView()->solicitacoes as $dado) { ?>
                            <tr>
                                <td scope="row"><?php echo $dado->__get('SCP_ID'); ?></td>
                                <td><?php echo $dado->__get("PRO_NOME")?></td>
                                <td><?php echo $dado->__get("PRO_VALOR")*$dado->__get("PSC_QUANTIDADE_PRODUTO_SOLICITADO")?></td>
                                <td><?php echo $dado->__get('PSC_QUANTIDADE_PRODUTO_SOLICITADO'); ?></td>
                                <td><?php echo $dado->__get('SCP_DATA_HORA'); ?></td>
                                <?php if($dado->__get("SCP_STATUS") == 1){?>
                                    <td class="text-success font-weight-bold">Autorizado</td>
                                <?php }elseif($dado->__get("SCP_STATUS") == 0){?>
                                    <td class="text-danger font-weight-bold">Recusado</td>
                                <?php }?>
                                <td class="text-center text-nowrap mx-auto">
                                    <a  class="btn btn-sm btn-med mx-2"  href='./detalharexame?id=<?php echo $dado->__get("SCP_ID");?>'>
                                        <button class="btn btn-sm btn-med mx-2" type="button" id="PopoverCustomT-1">Detalhar</button>
                                    </a> 
                                    <a class="btn btn-sm btn-danger mx-2"  href='./excluirexame?id=<?php echo $dado->__get('SCP_ID'); ?>'>
                                        <button  class="btn btn-sm btn-danger mx-2"  type="button" id="PopoverCustomT-1">Cancelar</button>
                                    </a>
                                    <a class="btn btn-sm btn-light mx-2"  href='./editarSolicitacoes?id=<?php echo $dado->__get('SCP_ID');?>'>
                                        <button  class="btn btn-sm btn-light mx-2"  type="button" id="PopoverCustomT-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                    </a>                                 
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?> 
