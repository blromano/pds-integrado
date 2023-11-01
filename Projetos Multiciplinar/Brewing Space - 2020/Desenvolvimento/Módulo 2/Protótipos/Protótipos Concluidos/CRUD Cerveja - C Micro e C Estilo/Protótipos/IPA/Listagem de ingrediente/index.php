<?php
session_start();
require_once('../../conexao/request.class.php');

$id = $_SESSION['id'];

$conexao = new Receita();

$ing = $conexao->listIngredientes();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="includes/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <script>
    function myFunction() {
        var resp;
        if (confirm("Deseja realmente excluir este ingrediente?")) {
            resp = 1;
        }else{
            resp = 0;
        }

        document.getElementById("demo").innerHTML = resp;
    }
    </script>

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
            <p id="demo"></p>
            <br>
            <div class="container content-main">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="name_title">
                            Ingredientes
                        </div>
                        <input type="text" id="txtBusca" placeholder=" Buscar..." class="maxwidth input">
                        <a href="adicionar.html" class="btn btn-outline-dark float-right">Cadastrar Ingredientes</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nome do ingrediente</th>
                                    <th scope="col">Descrição do ingrediente</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>




                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Fermentis S-04</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae magna ante. Suspendisse ac nisi mi. Curabitur blandit turpis eu ex placerat scelerisque. Nulla facilisi. Donec et fringilla erat.</td>
                                    <td>Fermento</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="editar.html">Editar</a>
                                            <a href="#" onclick="myFunction()">Excluir</a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        	
        </main>
        

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
        <footer class="mt-5">
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
