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
<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Inserir Produto no Estoque</h1>
    <form id="solicitarCompra" class="col-12 col-md-6 col-lg-4" method="POST" action="/produto/inserir" enctype="multipart/form-data">
        <div class="form-group">
            <p id="sizeLimitError" class="text-danger font-weight-bold d-none">O arquivo da guia não pode exceder 10 MB</p>
        </div>
        <div class="form-group">
        <label for="nomeProduto" class="form-label">Nome do Produto</label>
        <input class="form-control rounded-pill" list="datalistOptions" required="required" id="nomeProduto" placeholder="Nome do Produto" name="PRO_NOME">
            <datalist id="datalistOptions">
                <?php foreach ($this->getView()->produtos as $produto) { ?>
                    <option value="<?php echo $produto->__get("PRO_NOME")?>">
                <?php }?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="setor">Quantidade</label>
            <input type="text" class="form-control rounded-pill" required="required" id="quantidadeProduto" placeholder="Quantidade" name="PRO_QUANTIDADE">
        </div>
        <div class="form-group">
            <label for="guia">Preço Unitário</label>
            <input type="text" class="form-control rounded-pill" required="required" id="precoProduto" placeholder="Preço Unitário" name="PRO_VALOR">
        </div>
        <div class="form-group">
        <label for="tipoProduto" class="form-label">Tipo do Produto</label>
        <input class="form-control rounded-pill" list="op" required="required" id="tipoProduto" placeholder="Tipo do Produto" name="TPP_NOME">
            <datalist id="op">
                <?php foreach ($this->getView()->produtos as $produto) { ?>
                    <option value="<?php echo $produto->__get("TPP_NOME")?>">
                <?php }?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="setor">Nome do Fornecedor</label>
            <input type="text" class="form-control rounded-pill" required="required" id="nomeProduto" placeholder="Nome do Fornecedor" name="FOR_NOME">
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
        <input class="btn btn-med rounded-pill btn-block" type="submit" value="Enviar" href="inserirProduto">
    </form>
</div>

<!-- FAZER O ATO DA SOLICITAÇÃO PEGAR O HORÁRIO DO PC UTILIZADO PARA SOLICITAR-->