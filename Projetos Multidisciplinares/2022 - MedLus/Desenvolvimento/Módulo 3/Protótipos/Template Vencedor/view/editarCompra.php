<?php
    $pagina = "editarCompra";
    $footerColado = False; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>

<section class="container mt-5 col-12 col-md-8 d-flex flex-column align-items-center">
    <h1>Editar Compra</h1>
    <form action="" method="POST" class="d-flex flex-column mt-5 col-12 col-md-6 col-lg-4">
        <label for="exame">Nome do produto</label>
        <input type="text" placeholder="Nome do exame" class="form-control mb-3" id="exame" value="Benzetacil 1.200.000U 250g">
        
        <label for="tipo">Tipo do produto</label>
        <select name="tipo" id="tipo" class="form-control mb-3">
            <option value="analgesico">Analgésico</option>
            <option value="medicamento" selected="true">Medicamento</option>
            <option value="limpeza">Produto de Limpeza</option>
        </select>
        
        <label for="quantidade">Quantidade</label>
        <input type="number" class="form-control mb-3" id="quantidade" name="quantidade" step="1" placeholder="Quantidade" value="920">
        
        <label for="preco">Preço da Unidade (R$)</label>
        <input type="number" class="form-control mb-3" id="preco" name="preco" step="0.01" placeholder="Preço" value="12.50">
        
        <label for="cnpj">CNPJ do Fornecedor</label>
        <input type="text" placeholder="XX.XXX.XX/0001-XX" class="form-control mb-3" id="cnpj" value="00.453.469/0001-86">

        <label for="email">Email do Fornecedor</label>
        <input type="email" placeholder="Email do Fornecedor" class="form-control mb-3" id="email" value="pabloescobar@outlook.com">

        <label for="email">TELEFONE</label>
        <input type="text" placeholder="+55 XX XXXXX-XXXX" class="form-control mb-3" id="telefone" value="+55 19 95486-2232">

        <button class="btn btn-primary" type="submit">Confirmar</button>
    </form>
</section>

<?php include "footer.php";?>