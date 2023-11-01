<?php
session_start();
require_once('../conexao/request.class.php');

$conexao = new Receita();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                                <a href="#" class="nav-link ml-3">Dúvidas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Planos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="#" class="btn btn-outline-light">Bem-Vindo, Administrador</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>               
            </nav>
        </header>
        <main>
            <div class="container content-main">
                <div class="card">
                    <div class="card-header">
                        Editar Cerveja
                    </div>
                    <div class="card-body">
                    <form method="POST" action="adc.php">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputNome">Nome:</label>
                                    <input type="text" class="form-control" name="nome" min="3" max="50" required autofocus>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputNome">CPF:</label>
                                    <input type="text" class="form-control" name="cpf" min="14" max="14" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCpf">E-Mail:</label>
                                    <input type="email" class="form-control" name="email" min="7" max="31"required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCpf">Senha:</label>
                                    <input type="password" class="form-control" name="senha" min="8" max="16" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputFoto">Foto</label>
                                    <input type="file" class="form-control" name="foto" max="255" autofocus>
                                </div>
                            </div>

                            <br/>

                            <input type="submit" value="Confirmar" name="enviar" class="btn btn-primary active" role="button" aria-pressed="true">
                            <a href="index.php" class="btn btn-secondary active" role="button" aria-pressed="true">Cancelar</a>
                        
                        </form>
                    </div>
                </div>
            </div>
            
        </main>
        


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
        <footer style="position: absolute; bottom: 0px; width: 100%;">
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="col">
                        <p class="lead text-center text-white">
                            © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                        </p>
                    </div>
                </div>
            </div>
        </footer>  
        
    </body>
</html>
