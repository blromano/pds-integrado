<?php
session_start();
require_once('conexao/request.class.php');

$ID_USUARIO = $_SESSION['USU_ID'];
$usuario = new usuarios();
$id_cerveja = $_GET['id'];
$cervejaSelecionada = $usuario->processoCriado($ID_USUARIO,$id_cerveja);
?>


<!DOCTYPE html>
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
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Dúvidas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Planos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="processoCerveja.php" class="nav-link active">Gerenciar Cervejas</a>
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
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="col">
                        <p class="lead text-Left text-white">
                        <?php
                             echo $cervejaSelecionada->nome;                        
                        ?>
                            <a href="brassagem.php" class="navbar-nav ml-3">Brassagem</a></br>
                            <a href="fervura.php" class="navbar-nav ml-3">Fervura</a></br>
                            <a href="fermentacao.php" class="navbar-nav ml-3">Fermentação</a></br>
                            <a href="maturacao.php" class="navbar-nav ml-3">Maturação</a></br>
                            <a href="#" class="navbar-nav ml-3">Envase</a></br>
                            <a href="#" class="navbar-nav ml-3">Cálculo de Garrafas</a></br>
                            <a href="#" class="navbar-nav ml-3">Informações da receita da Cerveja</a></br>
                            <a href="#" class="navbar-nav ml-3">Gerar Planilha</br></a>
                            <p class="lead text-right text-white">
                    </div>
                </div>
            </div>
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
