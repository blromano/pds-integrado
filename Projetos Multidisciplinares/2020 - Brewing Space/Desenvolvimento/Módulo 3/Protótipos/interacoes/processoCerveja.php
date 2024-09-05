<?php
session_start();
require_once('conexao/request.class.php');

$ID_USUARIO = $_SESSION['USU_ID'];
$usuario = new usuarios();
$cervejas = $usuario->retornaCerveja($ID_USUARIO);
?>

<html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">
                    
                    <a href="#" class="navbar-brand">
                        <img class="logo" src="includes/img/Logo-2-Transparente.png">
                    </a>
                    
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Início</a>
                            </li>
                            <li class="nav-item">n ta 
                                <a href="#" class="nav-link active">Dúvidas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Planos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="processoCriado.php">Gerenciar Cervejas</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3"><button>cadastrar</button></a>
                            </li>
                        </ul>
                    </div>
                    
                </div>               
            </nav>            
        </header>
 
        <section class="my-5">
            <form action="pesquisa.html"><button>INICIAR NOVA</button></form>
            <table class="table table-bordered align-self-center">
                <br>
                <thead>
                  <tr>
                     </br>
                    <th scope="col">Listagem de cervejas já iniciadas:</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                if ($cervejas) {
                    foreach ($cervejas as $key => $value) {

                    echo '
                        <tr>
                            <td>'.$value->nome.'</td>
                            <td><a href="atualizar.php?id='.$value->nome .'">Editar</a> | <a href="deletar.php?id='.$value->id.'">Excluir</a>| <a href="processoCriado.php?id='.$value->id.'">Gerenciar</a></td>
                        </tr>
                    ';
                    }
                }else{
                    echo "<h2>Sem dados.</h2>";
                }
                
                ?>
                  
                </tbody>
             
              </table>
        </section>        
        <figre></figre>
        <footer class="mt-5">
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="col">
                        <p class="lead text-center text-white">
                            © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                            <img src="includes/img/cerveja.png" height="512" width="512"/></p>
                    </div>
                </div>
            </div>
        </footer>        
    </body>
</html>
