<h1 class="h3 mb-2 text-gray-800">Listar Solicitações de Compras de Materiais e Medicamentos</h1>

<div class="d-flex align-items-center flex-column pt-4">
    <div class="d-flex justify-content-center">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p class="card-text">ID: <?php echo $this->getView()->solicitacao->__get("SCP_ID") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">Nome do Produto: <?php echo $this->getView()->solicitacao->__get("PRO_NOME") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">Tipo de Produto: <?php echo $this->getView()->solicitacao->__get("TPP_NOME") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">Quantidade: <?php echo $this->getView()->solicitacao->__get("PSC_QUANTIDADE_PRODUTO_SOLICITADO") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">Preço: R$<?php echo $this->getView()->solicitacao->__get("PRO_VALOR") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">Fornecedor: <?php echo $this->getView()->solicitacao->__get("FOR_NOME") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">CNPJ: <?php echo $this->getView()->solicitacao->__get("FOR_CNPJ") ?></p>
            </li>

            <li class="list-group-item">
                <p class="card-text">Contato do Fornecedor: <?php echo $this->getView()->solicitacao->__get("FOR_EMAIL") ?></p>
            </li>
            <li class="list-group-item">
                <p class="card-text">Data Solicitação: <?php echo $this->getView()->solicitacao->__get("SCP_DATA_HORA") ?></p>
            </li>
            <li class="list-group-item">
                <?php if($this->getView()->solicitacao->__get("SCP_STATUS") == 1){?>
                    <p class="card-text">Status: Autorizado</p>
                <?php } elseif($this->getView()->solicitacao->__get("SCP_STATUS") == 0) {?>
                    <p class="card-text">Status: Recusado</p>
                <?php } elseif($this->getView()->solicitacao->__get("SCP_STATUS") == 2) {?>
                    <p class="card-text">Status: Pendente</p>
                <?php } elseif($this->getView()->solicitacao->__get("SCP_STATUS") == 3) {?>
                    <p class="card-text">Status: Finalizado</p>
                <?php }?>
            </li>
        </ul>
    </div>
    <div class="py-5">
        <?php if($this->getView()->solicitacao->__get("SCP_STATUS") == 2) { ?>
            <a class="btn btn-sm btn-success" href="/solicitacaoProduto/autorizar?id=<?php echo $this->getView()->solicitacao->__get("SCP_ID") ?>">Autorizar</a>
            <a class="btn btn-sm btn-danger" style="color:white" href="/solicitacaoProduto/recusar?id=<?php echo $this->getView()->solicitacao->__get("SCP_ID") ?>">Recusar</a>
        <?php } else if($this->getView()->solicitacao->__get("SCP_STATUS") == 1) { ?>
            <a class="btn btn-sm btn-success" style="color:white" href="/solicitacaoProduto/finalizar?id=<?php echo $this->getView()->solicitacao->__get("SCP_ID") ?>">Concluir</a>
        <?php } ?>
        <a class="btn btn-sm btn-med" href="/solicitacaoProduto/listarSolicitacoes">Voltar</a>
    </div>
</div>