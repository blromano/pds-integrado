<?php
    $pagina = "tabela";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-5">
    <h1 class="mt-3">
        Histórico de consultas    
    </h1>
    <div id="divBusca">
    <a href = "#"> <div class="input-group w-25">
        <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
        </span>
        <input type="text" class="form-control" placeholder="Nome do médico" aria-label="Input group example" aria-describedby="basic-addon1">
     </div> 
    </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Consulta</th>
                <th scope="col">Médico</th>
                <th scope="col">Especialidade</th>
                <th scope="col"> Data de Ínicio e Termino</th>
                <th scope="col">Status</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1°</th>
                <td>Rodrigo</td>
                <td>Cardiologista</td>
                <td>27/05 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td>Finalizada</td>
                <td class="action-row">
                    <a href="prototipo-18.php" class="btn btn-sm btn-primary">Detalhes</a>                    
                </tr>
            </td>
            <tr>
                <th scope="row">2°</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>30/05 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td>Finalizada</td>
                <td class="action-row">
                    <a href="prototipo-18.php" class="btn btn-sm btn-primary">Detalhes</a>                    
                </tr>
            </td>
            <tr>
                <th scope="row">3°</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>02/06 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td>Finalizada</td>
                <td class="action-row">
                    <a href="prototipo-18.php" class="btn btn-sm btn-primary">Detalhes</a>                    
                </tr>
            </td>
            <tr>
                <th scope="row">4°</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>08/06 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td>Finalizada</td>
                <td class="action-row">
                    <a href="prototipo-18.php" class="btn btn-sm btn-primary">Detalhes</a>                    
                </tr>
            </td>
            <tr>
                <th scope="row">5°</th>
                <td>Renata</td>
                <td>Cardiologista</td>
                <td>12/06 &nbsp-&nbsp&nbsp (13:00 / 14:15) </td>
                <td>Finalizada</td>
                <td class="action-row">
                    <a href="prototipo-18.php" class="btn btn-sm btn-primary">Detalhes</a>                    
                </tr>
            </td>
            <tr>
                <th scope="row">6°</th>
                <td>Renata </td>
                <td>Cardiologista</td>
                <td>26/06  &nbsp-&nbsp&nbsp (12:15 / -- &nbsp:&nbsp --) </td>
                <td><a href = "#">https://meet.google.com/ndf-koso-okg</a> </td>
                <td class="action-row">
                    <a href="prototipo-16.php" class="btn btn-sm btn-primary">Remarcar</a>
                    <a href="prototipo-18.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="prototipo-17.php" class="btn btn-sm btn-danger">Cancelar</a>               
                 </tr>
            </tr>       
        </tbody>
    </table>
</section>
<?php
    include "footer.php";
?>