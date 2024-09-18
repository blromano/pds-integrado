<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Solicitar Compra de Materiais e Medicamentos</h1>
    <form id="solicitarCompra" class="col-12 col-md-6 col-lg-4" method="POST" action="/solicitacaoproduto/solicitarProduto" enctype="multipart/form-data">
        <div class="form-group">
            <p id="sizeLimitError" class="text-danger font-weight-bold d-none">O arquivo da guia não pode exceder 10 MB</p>
        </div>
        <div class="form-group">
        <label for="nomeProduto" class="form-label">Nome do Produto</label>
        <input class="form-control rounded-pill" list="datalistOptions" id="nomeProduto" placeholder="Nome do Produto" name="PRO_NOME">
            <datalist id="datalistOptions">
                <?php foreach ($this->getView()->produtos as $produto) { ?>
                    <option value="<?php echo $produto->__get("PRO_NOME")?>">
                <?php }?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="setor">Quantidade</label>
            <input type="text" class="form-control rounded-pill" required="required" id="quantidadeProduto" placeholder="Quantidade" name="PSC_QUANTIDADE_PRODUTO_SOLICITADO">
        </div>
        <div class="form-group">
            <label for="guia">Preço Unitário</label>
            <input type="text" class="form-control rounded-pill" required="required" id="precoProduto" placeholder="Preço Unitário" name="PRO_VALOR">
        </div>
        <div class="form-group">
            <label for="setor">CNPJ do Fornecedor</label>
            <input type="text" class="form-control rounded-pill" required="required" id="cnpjProduto" placeholder="CNPJ do Fornecedor" name="FOR_CNPJ">
        </div>
        <div class="form-group">
            <label for="setor">Email do Fornecedor</label>
            <input type="text" class="form-control rounded-pill" required="required" id="emailProduto" placeholder="Email do Fornecedor" name="FOR_EMAIL">
        </div>
        <div class="form-group">
            <label for="setor">Telefone do Fornecedor</label>
            <input type="text" class="form-control rounded-pill" required="required" id="telefoneProduto" placeholder="Telefone do Fornecedor" name="FOR_TELEFONE">
        </div>
        <input class="btn btn-med rounded-pill btn-block" type="submit" value="Enviar" href="inserir">
    </form>
</div>

<!-- FAZER O ATO DA SOLICITAÇÃO PEGAR O HORÁRIO DO PC UTILIZADO PARA SOLICITAR-->