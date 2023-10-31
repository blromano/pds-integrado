<?php
    $pagina = "Interface_Compras";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-4">
    <h1 class="mt-3 mb-2" >Autorizações de Materiais e Medicamentos:</h1>
    <table class="table align-middle">
        <thead>
            <!-- Cabeçalho Da Tabela -->
            <tr class="text-center text-nowrap mx-auto">
                <th scope="col">ID</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Quantidade do Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Estado</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center text-nowrap mx-auto">
                <th scope="row">1</th>
                <td><?php echo $nome_produto = "Estetoscópio"?></td>
                <td><?php echo $quantidade_produto = "09"?></td>
                <td><?php echo $preco_produto = "123"?></td>
                <td class="text-warning fw-bold">Pendente</td>
                <td class="text-center text-nowrap mx-auto">
                    <!-- Botão de Detalhes -->
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#DetalhesCompra">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ExcluirCompra">Excluir</a>
                </td>
            </tr>
            <!-- MODAL DETALHES -->
            <div class="modal fade" id="DetalhesCompra" tabindex="-1" aria-labelledby="DetalhesCompra" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color: #2BB8B1">
                        <h5 class="modal-title" style="color: white" id="exampleModalLabel">Informações</h5>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="card-text">ID: <?php echo $id_produto = "212712712712"?></p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Nome do Produto: <?php echo $nome_produto = "Estetoscópio"?></p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Tipo de Produto: <?php echo $tipo_produto = "Equipamento Médico"?></p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Quantidade: <?php echo $quant = "09"?></p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Preço: <?php echo $preco_produto?></p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Fornecedor: <?php echo $fornecedor = "Anvisa"?></p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">CNPJ: <?php echo $setor = "12871982718629619863"?></p>
                                </li>
                                
                                <li class="list-group-item">
                                    <p class="card-text">Contato do Fornecedor: <?php echo $Contato_fornecedor = "clonadordecartao@gmail.com"?></p>
                                </li> 
                                <li class="list-group-item">
                                    <p class="card-text">Data Solicitação: <?php echo $data = "11/09/2001"?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-success" data-bs-target="#ProdutoAutorizar" data-bs-toggle="modal" data-bs-dismiss="modal">Autorizar</button>
                        <button class="btn btn-sm btn-secondary" style="color:white" data-bs-target="#ProdutoRecusar" data-bs-toggle="modal" data-bs-dismiss="modal">Recusar</button>
                        <button class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- MODAL AUTORIZAR -->
            <div class="modal fade" id="ProdutoAutorizar" tabindex="-1" aria-labelledby="ProdutoAutorizar" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2BB8B1">
                            <h5 class="modal-title" style="color: white">Deseja Prosseguir com a Ação ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" class="d-flex justify-content-center row">
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="username">Prontuário: </label>
                                    <input class="form-control col-8" type="text" placeholder="Prontuario" id="username">
                                </div>
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                    <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- MODAL RECUSAR -->
            <div class="modal fade" id="ProdutoRecusar" tabindex="-1" aria-labelledby="ProdutoRecusar" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2BB8B1">
                            <h5 class="modal-title" style="color: white">Deseja Prosseguir com a Ação ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" class="d-flex justify-content-center row">
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="username">Prontuário: </label>
                                    <input class="form-control col-8" type="text" placeholder="Prontuario" id="username">
                                </div>
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                    <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                </div>
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="desc">Justificativa: </label>
                                    <textarea class="form-control col-8" type="text" placeholder="Justificativa" id="ID"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- MODAL EXCLUIR COMPRAS -->
            <div class="modal fade" id="ExcluirCompra" tabindex="-1" aria-labelledby="ExcluirCompra" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2BB8B1">
                            <h5 class="modal-title" style="color: white">Deseja Prosseguir com a Ação ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" class="d-flex justify-content-center row">
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="username">Prontuário: </label>
                                    <input class="form-control col-8" type="text" placeholder="Prontuario" id="username">
                                </div>
                                <div class="input-group mb-3 row">
                                    <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                    <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div> 
                </div>
            </div>
        </tbody>
    </table>
</section>

<?php
    include "footer.php";
?>