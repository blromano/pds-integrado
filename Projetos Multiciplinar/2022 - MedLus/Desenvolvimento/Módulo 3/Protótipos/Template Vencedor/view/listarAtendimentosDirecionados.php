<?php
    $pagina = "atendimentosDirecionados";
    $footerColado = True; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>
<!--
                                                          ,-,-.
                                                       _(    _)
                                                      (__,`-'
                                            ,'`.   .-----,
                             __           ,','`.`.  |   |
                  _____    ,'  `.       ,','    `.`.|---|
              _,-'     \  /      \    ,',' _____  `.`.  |
           ,-'          \ \      /  ,','  |  |  |   `.`.|
         ,'           ___\ `.__.' ,','__  |--|--|   __'.`.         _
        /         _,-'     .----. \|    \ |__|__|  /    |/      ,-' \ TM
       |        ,'         |    |  |     \        /     |    ,-'    _\
       |        |          |    |  |      \      /      |  ,'    ,-'
        \       \          |    |  |       \    /       | /     /
         \       \         |    |  |        \  /        | |    ( 
          \       `.       |    |  |         \/         |  \    \
 ____ _    `.       `.     |    |  |    \          /    |   `.   `.
'-..-'||     `.       `.   |    |  |    |\        /|    |     `.   `.
  ||  ||__   __`.       \  |    |  |    | \      / |    |       \    \
  ||  |.-.\ /__\ \       \ |    |  |    |  \    /  |    |      ,'    /
  ||  || || \__, /       | |    |  |    |   \__/   |    | __,-'    ,'
               ,'        / |    |  |    |          |    | \     ,-'
        ____,-'        ,'  |____|  |    |          |    |  \_,-'
        \            ,'            |____|          |____|
         \       _,-'
          \___,-'
 -->


<section class="container col-12 col-md-8">
    <div class="d-flex flex-row align-items-center justify-content-between mb-2">
        <h1>
        Atendimento de Consultas Direcionadas Para Consultas Presenciais
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome do Paciente</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Diagnóstico</th>
                    <th scope="col">Data e Horário do Atendimento</th>
                    <th scope="col">Local da Consulta</th>
                    <th scope="col">Nome do Médico</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pedro Sanches Mariotto</td>
                    <td class="text-danger fw-bold">Alto</td>
                    <td>Depressão</td>
                    <td>24/06/2022 - 15:30</td>
                    <td>Hospital N°4. Rua dos Bobos</td>
                    <td>Lucas Felício Valim</td>
                    <td class="text-center text-nowrap">
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharConsulta">Detalhar</button>
                    </td>
                </tr>
                <tr>
                    <td>Nicolas Teixeira de Oliveira</td>
                    <td class="fw-bold">Médio</td>
                    <td>AIDS</td>
                    <td>23/08/2022 - 09:00</td>
                    <td>Hospital N°3. Rua dos Bobos</td>
                    <td>Ingrid Vitória Flauzino de Souza</td>
                    <td class="text-center text-nowrap">
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharConsulta">Detalhar</button>
                    </td>
                </tr>
                <tr>
                    <td>Renan Henrique Mussulino Peixoto</td>
                    <td class="text-success fw-bold">Baixo</td>
                    <td>Câncer</td>
                    <td>12/09/2022 - 11:00</td>
                    <td>Hospital N°3. Rua dos Bobos</td>
                    <td>Kaik Henrique Mussulino Peixoto</td>
                    <td class="text-center text-nowrap">
                        <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#detalharConsulta">Detalhar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<!-- Detalhar Consulta (INÍCIO) -->

<div class="modal fade" id="detalharConsulta" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
            <h3>Detalhar Consulta Online</h3>
        </div>
        <div class="modal-body">
            <table class="table table-borderless">
                <tr>
                    <td>Nome do Paciente</td>
                    <td class="fw-bold">
                        Ingrid Vitória Flauzino de Souza
                    </td>
                </tr>
                <tr>
                    <td>Nível de Prioridade</td>
                    <td class="fw-bold">
                        ALTA
                    </td>
                </tr>
                <tr>
                    <td>Data e Horário de Atendimento</td>
                    <td class="fw-bold">
                        12/09/2022 - 11:00
                    </td>
                </tr>
                <tr>
                    <td>Local da consulta</td>
                    <td class="fw-bold">
                        Hospital N°3. Rua dos Bobos
                    </td>
                </tr>
                <tr>
                    <td>Nome do Médico</td>
                    <td class="fw-bold">
                        Kaik Henrique Mussulino Peixoto
                    </td>
                </tr>
                <tr>
                    <td>Diagnóstico</td>
                    <td class="fw-bold">
                        AIDS e GONORREIA
                    </td>
                </tr>
                <tr>
                    <td>Sintomas</td>
                    <td class="fw-bold">
                        <textarea cols="30" rows="3" readonly class="form-control bg-white">Febre persistente;
Tosse seca prolongada e garganta arranhada;
Suores noturnos;
Inchaço dos gânglios linfáticos durante mais de 3 meses;
Dor de cabeça e dificuldade de concentração;
Dor nos músculos e nas articulações;
Cansaço, fadiga e perda de energia;
Rápida perda de peso;</textarea>
                    </td>
                </tr>
                <tr>
                    <td>Medicamentos Prescritos</td>
                    <td class="fw-bold">
                        <ul>
                            <li>Ciclosporina - Sandimun Neoral®</li>
                            <li>Nimesulida</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Observações Gerais</td>
                    <td class="fw-bold">
                        <textarea cols="30" rows="3" readonly class="form-control bg-white">Nenhuma.</textarea>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<!-- Adicionar isso ao template dps -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





<?php include "footer.php";?>
