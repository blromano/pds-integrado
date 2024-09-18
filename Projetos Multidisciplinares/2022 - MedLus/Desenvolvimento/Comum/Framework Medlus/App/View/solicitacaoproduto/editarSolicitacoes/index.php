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
    <h1 class="h3 mb-2 text-gray-800 my-4">Editar Solicitação de Compra</h1>
    <form id="solicitarCompra" class="col-12 col-md-6 col-lg-4" method="POST" action="/solicitacaoProduto/editadaSolicitacao" enctype="multipart/form-data">
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
            <input type="text" class="form-control rounded-pill" required="required" id="quantidadeProduto" placeholder="Quantidade" name="PSC_QUANTIDADE_PRODUTO_SOLICITADO">
        </div>
        <input type="hidden" name="SCP_ID" value="<?php echo $this->getView()->solicitacao->__get('SCP_ID'); ?>">
        <input class="btn btn-med rounded-pill btn-block" type="submit" value="Enviar" href="editarSolicitacaoProduto">
    </form>
</div>

<!-- FAZER O ATO DA SOLICITAÇÃO PEGAR O HORÁRIO DO PC UTILIZADO PARA SOLICITAR-->