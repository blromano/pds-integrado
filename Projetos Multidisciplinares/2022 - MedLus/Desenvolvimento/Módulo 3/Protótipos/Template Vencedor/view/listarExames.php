<?php
    $pagina = "listarExames";
    $footerColado = True; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>

<section class="container col-12 col-md-8">
    <div class="d-flex flex-row align-items-center justify-content-between mb-2">
        <h1>
            Meus Exames
        </h1>
        <a href="solicitarExame.php" class="btn btn-sm btn-primary">Solicitar Exame</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome do Exame</th>
                    <th scope="col">Data Marcada</th>
                    <th scope="col">Horário Marcado</th>
                    <th scope="col">Guia</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ressonância Magnética</td>
                    <td>10/06/2022</td>
                    <td>09:00</td>
                    <td>
                        <a href="#" class="">
                            <i class="bi bi-download fs-5 text-dark"></i>
                        </a>
                    </td>
                    <td class="text-success fw-bold">Autorizado</td>
                    <td class="text-center text-nowrap">
                        <a href="editarExame.php" class="btn btn-sm btn-primary mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#cancelarExame">Cancelar</button>
                    </td>
                </tr>
                <tr>
                    <td>Raio X</td>
                    <td>19/06/2022</td>
                    <td>18:00</td>
                    <td>
                        <a href="#" class="">
                            <i class="bi bi-download fs-5 text-dark"></i>
                        </a>
                    </td>
                    <td class="fw-bold">Pendente</td>
                    <td class="text-center text-nowrap">
                        <a href="editarExame.php" class="btn btn-sm btn-primary mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#cancelarExame">Cancelar</button>
                    </tr>
                </td>
                <tr>
                    <td>Endoscopia</td>
                    <td>12/06/2022</td>
                    <td>14:00</td>
                    <td>
                        <a href="#" class="">
                            <i class="bi bi-download fs-5 text-dark"></i>
                        </a>
                    </td>
                    <td class="text-danger fw-bold">Recusado</td>
                    <td class="text-center text-nowrap">
                        <a href="editarExame.php" class="btn btn-sm btn-primary mx-2">Editar</a>
                        <button type="button" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#cancelarExame">Cancelar</button>
                    </tr>
                </td>
                <tr class="bg-light">
                    <td>Tomografia Computadorizada</td>
                    <td>06/05/2022</td>
                    <td>14:40</td>
                    <td>
                        <a href="#" class="">
                            <i class="bi bi-download fs-5 text-dark"></i>
                        </a>
                    </td>
                    <td>Realizado</td>
                    <td class="text-center text-nowrap">
                        <a href="editarExame.php" class="btn btn-sm btn-secondary">Resultados</a>
                    </td>
                </tr>
                <tr class="bg-light">
                    <td>Papanicolau</td>
                    <td>01/12/2021</td>
                    <td>10:30</td>
                    <td>
                        <a href="#" class="">
                            <i class="bi bi-download fs-5 text-dark"></i>
                        </a>
                    </td>
                    <td>Realizado</td>
                    <td class="text-center text-nowrap">
                        <a href="editarExame.php" class="btn btn-sm btn-secondary">Resultados</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<!-- CANCELAR EXAME (INÍCIO) -->

<div class="modal fade" id="cancelarExame" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
            <h3>Cancelar Exame</h3>
        </div>
        <div class="modal-body">
            <table class="table table-borderless">
                <tr>
                    <td>Nome do exame</td>
                    <td class="fw-bold">Ressonância Magnética</td>
                </tr>
                <tr>
                    <td>Data</td>
                    <td class="fw-bold">06/12/2022</td>
                </tr>
                <tr>
                    <td>Horário</td>
                    <td class="fw-bold">13:56</td>
                </tr>
                <tr>
                    <td>Guia</td>
                    <td class="text-nowrap fw-bold">
                        ressonanciaMagnetica.pdf
                        <a href="#" class="ml-1">
                            <i class="bi bi-download fs-5 text-dark"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary close" type="button" data-dismiss="modal">Voltar</button>
            <button class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#confirmarExclusao">Cancelar Exame</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAÇÃO EXCLUSÃO -->
<div class="modal fade" id="confirmarExclusao" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column">
                <h4 class="text-center">
                    Tem certeza que deseja excluir a solicitação do exame?
                </h4>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#cancelarExame">Não</button>
                    <button type="button" class="btn btn-primary">Sim</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Adicionar isso ao template dps -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!-- CANCELAR EXAME (FIM) -->


<?php include "footer.php";?>
