<?php
    $pagina = "Interface_Estoque";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-4">
    <h1 class="mt-3">Estoque:</h1>
    <!-- Adiciona Produtos a tabela -->
    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddProduto">Adicionar Produto</a>
    <div class="modal fade" id="AddProduto" tabindex="-1" aria-labelledby="AddProduto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2BB8B1">
                    <h5 class="modal-title" style="color: white" id="AddProduto">Inserir o Produto:</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="d-flex justify-content-center row">
                        <div class="input-group mb-3 row">
                            <label class="form-label col-4 mt-2" for="username">Nome do Produto</label>
                            <input class="form-control col-8" type="text" placeholder="Email or Phone" id="username">
                        </div>
                        <div class="input-group mb-3 row">
                            <label class="form-label col-4 mt-2" for="ID">ID do Produto</label>
                            <input class="form-control col-8" type="text" placeholder="ID" id="ID">
                        </div>
                        <div class="input-group mb-3 row">
                            <label class="form-label col-4 mt-2" for="Texto">Quantidade do Produto</label>
                            <input class="form-control col-8" type="Text" placeholder="Texto" id="Texto">
                        </div>
                        <div class="input-group mb-3 row">
                            <label class="form-label col-4 mt-2" for="Email">Contato do Fornecedor</label>
                            <input class="form-control col-8" type="Email" placeholder="Email" id="Email">
                        </div>
                        <div class="input-group mb-3 row">
                            <label class="form-label col-4 mt-2" for="text">Telefone do Fornecedor</label>
                            <input class="form-control col-8" type="text" placeholder="Telefone" id="tel">
                        </div>
                        <div class="input-group mb-3 row">
                            <label class="form-label col-4 mt-2" for="ID">CNPJ do Fornecedor</label>
                            <input class="form-control col-8" type="text" placeholder="CNPJ" id="ID">
                        </div>
                        <div class="input-group mb-3 row">
                                <label class="form-label" for="customFile"></label>
                                <input type="file" class="form-control" id="customFile" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#AdicionarSalvar" data-bs-dismiss="modal">Salvar</button>
                    <button type="submit" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL SALVAR (ADICIONAR PRODUTO) -->
    <div class="modal fade" id="AdicionarSalvar" tabindex="-1" aria-labelledby="AdicionarSalvar" aria-hidden="true">
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
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <!-- Cabeçalho Da Tabela -->
                <tr class="text-center text-nowrap mx-auto">
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Quantidade do Produto</th>
                    <th scope="col">Contato do Fornecedor</th>
                    <th scope="col">Telefone</th>
                    <th scope="col" class="actions text-center">Editar</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center text-nowrap mx-auto">
                    <th scope="row">188445</th>
                    <td><?php echo $nome_produto = "Dipirona"?></td>
                    <td><?php echo $quantidade_produto = "09"?></tdclass=>
                    <td><?php echo $Contato_fornecedor = "clonador@cartaogmail.com"?></tdclass=>
                    <td><?php echo $telefone_fornecedor = "(19) 1292-3212"?></td>
                    <td>
                        <!-- Botão Editar -->
                        <a class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#EditarProdutoEstoque">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td class="text-center text-nowrap mx-auto">
                        <!-- Botão de Detalhes -->
                        <a href="#" class="btn btn-sm btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#DetalhesExame">Detalhes</a>
                        <!-- Botão Excluir -->
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ExcluirProdutoEstoque">Excluir</a>
                        <div class="modal fade" id="ExcluirProdutoEstoque" tabindex="-1" aria-labelledby="ExcluirProdutoEstoque" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2BB8B1">
                                        <h5 class="modal-title" style="color: white" id="AddProduto">Excluir Produto do Estoque:</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" class="d-flex justify-content-center row">
                                            <div class="input-group mb-3 row">
                                                <label class="form-label col-4 mt-2" for="Email">Prontuário: </label>
                                                <input class="form-control col-8" type="Email" placeholder="Prontuário" id="Email">
                                            </div>
                                            <div class="input-group mb-3 row">
                                                <label class="form-label col-4 mt-2" for="ID">Senha: </label>
                                                <input class="form-control col-8" type="password" placeholder="Senha" id="ID">
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-success"data-bs-dismiss="modal">Confirmar</button>
                                        <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- MODAL DETALHES -->
                <div class="modal fade" id="DetalhesExame" tabindex="-1" aria-labelledby="DetalhesExame" aria-hidden="true">
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
                                        <p class="card-text">Nome do Produto: <?php echo $nome_produto = "Dipirona"?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="card-text">Quantidade: <?php echo $quant = "129"?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="card-text">Fornecedor: <?php echo $fornecedor = "Anvisa"?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="card-text">Telefone: <?php echo $telefone_fornecedor?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="card-text">CNPJ: <?php echo $setor = "12871982718629619863"?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="card-text">Contato do Fornecedor: <?php echo $Contato_fornecedor?></p>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL DO EDITAR -->
                <div class="modal fade" id="EditarProdutoEstoque" tabindex="-1" aria-labelledby="EditarProdutoEstoque" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #2BB8B1">
                                <h5 class="modal-title" style="color: white" id="EditarProdutoEstoque">Editar Produto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" class="d-flex justify-content-center row">
                                    <div class="input-group mb-3 row">
                                        <label class="form-label col-4 mt-2" for="username">Nome do Produto</label>
                                        <input class="form-control col-8" type="text" placeholder="Email or Phone" id="username">
                                    </div>
                                    <div class="input-group mb-3 row">
                                        <label class="form-label col-4 mt-2" for="ID">ID do Produto</label>
                                        <input class="form-control col-8" type="text" placeholder="ID" id="ID">
                                    </div>
                                    <div class="input-group mb-3 row">
                                        <label class="form-label col-4 mt-2" for="Texto">Quantidade do Produto</label>
                                        <input class="form-control col-8" type="Text" placeholder="Texto" id="Texto">
                                    </div>
                                    <div class="input-group mb-3 row">
                                        <label class="form-label col-4 mt-2" for="Email">Contato do Fornecedor</label>
                                        <input class="form-control col-8" type="Email" placeholder="Email" id="Email">
                                    </div>
                                    <div class="input-group mb-3 row">
                                        <label class="form-label col-4 mt-2" for="text">Telefone do Fornecedor</label>
                                        <input class="form-control col-8" type="text" placeholder="Telefone" id="tel">
                                    </div>
                                    <div class="input-group mb-3 row">
                                        <label class="form-label col-4 mt-2" for="ID">CNPJ do Fornecedor</label>
                                        <input class="form-control col-8" type="text" placeholder="CNPJ" id="ID">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditarProdutoSalvar" data-bs-dismiss="modal">Salvar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- MODAL DO SALVAR (EDITAR) -->
                <div class="modal fade" id="EditarProdutoSalvar" tabindex="-1" aria-labelledby="EditarProdutoSalvar" aria-hidden="true">
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
    </div>
</section>

<?php
    include "footer.php";
?>