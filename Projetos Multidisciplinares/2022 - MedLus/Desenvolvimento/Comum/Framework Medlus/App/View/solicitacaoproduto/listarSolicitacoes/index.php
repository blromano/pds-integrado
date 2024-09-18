<h1 class="h3 mb-2 text-gray-800">Listar Solicitações de Compras de Materiais e Medicamentos</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Listar Solicitações de Compras de Materiais e Medicamentos</h6>
    </div>
    <?php
    if (count($this->getView()->solicitacoes) < 1) { ?>
        <p class="px-5 py-2">Não existem registros de Solicitações de Compras de Materiais e Medicamentos</p>
    <?php } else { ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade Solicitada</th>
                            <th>Preço por unidade</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade Solicitada</th>
                            <th>Preço por unidade</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($this->getView()->solicitacoes as $dado) { ?>
                            <tr class="text-center text-nowrap mx-auto">
                                <th scope="row"><?php echo $dado->__get("SCP_ID") ?></th>
                                <td><?php echo $dado->__get("PRO_NOME") ?></td>
                                <td><?php echo $dado->__get("PSC_QUANTIDADE_PRODUTO_SOLICITADO") ?></td>
                                <td><?php echo "R$".$dado->__get("PRO_VALOR") ?></td>
                                <?php if($dado->__get("SCP_STATUS") == 1){?>
                                    <td class="text-success font-weight-bold">Autorizado</td>
                                <?php }elseif($dado->__get("SCP_STATUS") == 0){?>
                                    <td class="text-danger font-weight-bold">Recusado</td>
                                <?php }elseif($dado->__get("SCP_STATUS") == 2){?>
                                    <td class="text-warning fw-bold">Pendente</td>
                                <?php }elseif($dado->__get("SCP_STATUS") == 3){?>
                                    <td class="fw-bold">Concluído</td>
                                <?php }?>
                                <td class="text-center text-nowrap mx-auto">
                                    <!-- Botão de Detalhes -->
                                    <a href="/solicitacaoProduto/detalhar?id=<?php echo $dado->__get("SCP_ID") ?>" class="btn btn-sm btn-med">Detalhes</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExcluirCompra">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>
