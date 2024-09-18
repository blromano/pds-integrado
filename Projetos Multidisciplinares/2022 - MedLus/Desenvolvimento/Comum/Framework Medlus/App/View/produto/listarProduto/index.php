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
if (count($this->getView()->produtos) < 1) { ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Estoque</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço por unidade</th>
                        <th>Tipo</th>
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
        <h6 class="mt-1 m-0 font-weight-bold text-med">Estoque</h6>
        <a class="btn btn-sm btn-med ml-auto" href="/produto/inserirProduto">Inserir Produto</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço por unidade</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->getView()->produtos as $dado) { ?>
                        <tr class="text-center text-nowrap mx-auto">
                            <th scope="row"><?php echo $dado->__get("PRO_ID") ?></th>
                            <td><?php echo $dado->__get("PRO_NOME") ?></td>
                            <td><?php echo $dado->__get("PRO_QUANTIDADE") ?></td>
                            <td><?php echo "R$".$dado->__get("PRO_VALOR") ?></td>
                            <td><?php echo $dado->__get("TPP_NOME") ?></td>
                            <td class="text-center text-nowrap mx-auto">
                                <!-- Botão de Detalhes -->
                                <a href="/solicitacaoProduto/detalhar?id=<?php echo $dado->__get("PRO_ID") ?>" class="btn btn-sm btn-med">Detalhes</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExcluirCompra">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?> 