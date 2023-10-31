<?php
    $pagina = "historico";
    $footerColado = True;
    include "../config.php";
    include "../header.php";
?>

<section class="container mt-5">
    <h1 class="mt-3">
        Histórico de Consultas Online          
    </h1>
    </br>
    <div id="divBusca">
         <a href = "#"> <div class="input-group w-25">
            <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                     <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
            </span>
            <input type="text" class="form-control" placeholder="Nome do paciente" aria-label="Input group example" aria-describedby="basic-addon1">
     </div> </a>
    </br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Médico</th>
                <th scope="col">Especialidade</th>
                <th scope="col">Data e horário</th>
                <th scope="col" class="actions text-center">Endereço para a Entrar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Renata Mussulino</td>
                <td>Fábio</td>
                <td>Ortopedista</td>
                <td>22/06/22 - 15:15</td>
                <td class="action-row">
                <a href="" class="btn btn-sm btn-primary">Entrar</a>
                </tr>
            </td>
            <tr>
                <th scope="row">2</th>
                <td>Edilson Diniz Silvestre</td>
                <td>Fábio</td>          
                <td>Otorrinolaringologista</td>
                <td>23/06/22 - 15:15 - 16:00</td>
                <td class="action-row">
                <a href="" class="btn btn-sm btn-primary">Entrar</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Tarcizo Roberto</td>
                <td>Fábio</td>          
                <td>Cardiologista</td>
                <td>21/06/22 - 15:15 - 15:55</td>
                <td class="action-row">
                <a href="" class="btn btn-sm btn-primary">Entrar</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Alberto Silva Rodrigues</td>
                <td>Fábio</td>          
                <td>Cardiologista</td>
                <td>25/06/22 - 15:15</td>
                <td class="action-row">
                    <a href="" class="btn btn-sm btn-primary">Entrar</a>
                </tr>
            </tr>
        </tbody>
    </table>

    
</section>
<?php
    include "../footer.php";
?>