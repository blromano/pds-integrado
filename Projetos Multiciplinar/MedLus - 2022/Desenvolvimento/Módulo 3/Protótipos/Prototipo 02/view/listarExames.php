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
                        <a href="#" class="btn btn-sm btn-danger mx-2">Excluir</a>
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
                        <a href="#" class="btn btn-sm btn-danger mx-2">Excluir</a>
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
                        <a href="#" class="btn btn-sm btn-danger mx-2">Excluir</a>
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

<?php include "footer.php";?>
