<?php
    $pagina = "listarSolicitacoesCompras";
    $footerColado = True; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>

<section class="container col-12 col-md-8">
    <div class="d-flex flex-row align-items-center justify-content-between mb-2">
        <h1>
            Solicitações de Compras
        </h1>
        <a href="solicitarCompra.php" class="btn btn-sm btn-primary">Solicitar Compra</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Preço Total</th>
                    <th scope="col">Data/Hora da Solicitação</th>
                    <th scope="col">Status</th>
                    <th scope="col text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>4</td>
                    <td>Gase</td>
                    <td>R$1.500,00</td>
                    <td>01/06/2022 15:47</td>
                    <td class="text-success fw-bold">Autorizado</td>
                    <td class="text-center text-nowrap">
                        <a href="editarCompra.php" class="btn btn-sm btn-warning mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharSolicitacao">Detalhar</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Soro</td>
                    <td>R$5.000,00</td>
                    <td>20/05/2022 15:47</td>
                    <td class="text-danger fw-bold">Recusado</td>
                    <td class="text-center text-nowrap">
                        <a href="editarCompra.php" class="btn btn-sm btn-warning mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharSolicitacao">Detalhar</button>
                        <button type="button" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#cancelarSolicitacao">Cancelar</button>
                    </tr>
                </td>
                <tr>
                    <td>2</td>
                    <td>Xanax 125g</td>
                    <td>R$3.201,00</td>
                    <td>24/03/2022 15:47</td>
                    <td>Pendente</td>
                    <td class="text-center text-nowrap">
                        <a href="editarCompra.php" class="btn btn-sm btn-warning mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharSolicitacao">Detalhar</button>
                        <button type="button" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#cancelarSolicitacao">Cancelar</button>
                    </tr>
                </td>
                <tr>
                    <td>1</td>
                    <td>Benzetacil 1.200.000U 250g</td>
                    <td>R$15.000,00</td>
                    <td>15/03/2022 15:47</td>
                    <td>Pendente</td>
                    <td class="text-center text-nowrap">
                        <a href="editarCompra.php" class="btn btn-sm btn-warning mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharSolicitacao">Detalhar</button>
                        <button type="button" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#cancelarSolicitacao">Cancelar</button>
                    </tr>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<!-- Detalhar Compra (INÍCIO) -->

<div class="modal fade" id="detalharSolicitacao" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h3>Detalhar Solicitação</h3>
            </div>
            <div class="modal-body"><table class="table table-borderless">
                    <tr>
                        <td>Nome do Produto</td>
                        <td class="fw-bold">Benzetacil 1.200.000U 250g</td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td class="fw-bold">Medicamento</td>
                    </tr>
                    <tr>
                        <td>Quantidade</td>
                        <td class="fw-bold">920</td>
                    </tr>
                    <tr>
                        <td>Preço Unitário</td>
                        <td class="fw-bold">R$12.50</td>
                    </tr>
                    <tr>
                        <td>Data e Hora da Solicitação</td>
                        <td class="fw-bold">15/06/2022 19:57</td>
                    </tr>
                    <tr>
                        <td>CNPJ do Fornecedor</td>
                        <td class="fw-bold">00.453.469/0001-86</td>
                    </tr>
                    <tr>
                        <td>Email do Fornecedor</td>
                        <td class="fw-bold">pabloescobar@outlook.com</td>
                    </tr>
                    <tr>
                        <td>Telefone do Fornecedor</td>
                        <td class="fw-bold">+55 19 95486-2232</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelarSolicitacao" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column">
                <h4 class="text-center">
                    Tem certeza que deseja cancelar a solicitação?
                </h4>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <a class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#informarCredenciais">Sim</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Credenciais -->
<div class="modal fade" id="informarCredenciais" tabindex="-1" aria-labelledby="InformarCredenciais" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2BB8B1">
                <h5 class="modal-title" style="color: white">Informe suas credenciais para proseguir com a ação.</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar Exclusão</button>
            </div>
        </div> 
    </div>
</div>



<!-- Adicionar isso ao template dps -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Detalhar Compra (FIM) -->


<?php include "footer.php";?>
