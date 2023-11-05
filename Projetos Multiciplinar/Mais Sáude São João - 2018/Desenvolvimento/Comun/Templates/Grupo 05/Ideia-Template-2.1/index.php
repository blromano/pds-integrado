<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title> Template - Grupo 5 </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
        <script src="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.js"></script>

        <!--
<script type="text/javascript" src="http://186.219.151.106/hhunt/jquery/jquery-3.3.1.min.js"></script>
<script src="http://186.219.151.106/hhunt/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" href="http://186.219.151.106/hhunt/bootstrap/css/bootstrap.css">
-->

        <link rel="stylesheet" type="text/css" href="./styles/style.css">
        <script type="text/javascript" src="./scripts/load-content.js"></script>
    </head>
    <body>

        <header>
            <div class="container-fluid low-opacity text-light">
                <div class="row full-height align-items-center">
                    <div class="col-md-4 offset-md-4 text-center">
                        <div class="container">
                            <img src="./resources/logofinal_vetorbranco.png" alt="Logo eduardo" class="img-fluid" data-aos="fade-up">
                        </div>
                        <a class="non-rounded btn btn-outline-light btn-lg" href="#content"> Participe </a>
                    </div>
                </div>
            </div>
        </header>

        <content id="content">
            <div class="full-height fixed-top blur" style="z-index: -1">
            </div>

            <div class="container my-4" >
                <div class="bg-light" data-aos="fade-up">
                    <?php include("./contents/menu.html"); ?>
                </div>
            </div>

            <div class="container my-4" id="sobre">

                <div class="bg-light p-4" data-aos="fade-right">
                    <h1 class="text-center"> Sobre nosso template! </h1>
                    <hr>
                    <div class="row">
                        <div data-aos="slide-up" class="col-md-3 my-1 offset-md-1">
                            <p> Nossa template é totalmente animado e responsivo alem de totalmente original! </p>
                        </div>
                        <div data-aos="slide-down" class="bg-primary my-1 col-md-7" style="min-height: 3em"></div>
                    </div>
                    <div class="row" data-aos="slide-left">
                        <div class="col-md-10 offset-md-1 my-1 bg-danger" style="min-height: 3em"></div>
                    </div>
                    <div class="row" data-aos="slide-right">
                        <div class="col-md-5 offset-md-1">
                        	<div class="row">
                                <div class="col-md-12 my-1 bg-dark" data-aos="fade-down" style="min-height: 6em"></div>
                                <div class="col-md-12 my-1 bg-info" data-aos="fade-down" style="min-height: 3em"></div>
                            </div>
                        </div>
                        <div class="col-md-5 my-3" data-aos="fade-up" style="min-height: 3em;">
                            
                            Todas as animações foram feitas com a biblioteca <a href="https://michalsnik.github.io/aos/" class="text-secondary">AOS</a> que é extremamente intuitiva e fácil de se aprender.
                            <br><br>
                            Cada bloco neste site faz parte de um arquivo externo que esta sendo linkado à página principal com PHP
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4" id="postagens">
                <div class="bg-light p-4" data-aos="fade-right">
                    <?php include ("./contents/exemplopostagem.html"); ?>
                </div>
            </div>
            
            <div class="container my-4" id="equipe">
                <div class="bg-light p-4" data-aos="fade-right">
                    <?php include ("./contents/equipe.html"); ?>
                </div>
            </div>

            <div class="container my-4" id="cadastro">
                <div class="bg-light p-4" data-aos="fade-left">
                    <h1 class="text-center"> Faça parte! </h1>
                    <hr>
                    <?php include("./contents/cadastrousuario.html"); ?>
                </div>
            </div>
            

        </content>

        <footer>
            <div class="container-fluid bg-dark text-light">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-3 offset-md-3">
                            <ul class="navbar-nav text-center">
                                <li>Fale conosco</li>
                                <li><a href="#" class="text-secondary"> brenindasilva@hotmail.com </a></li>
                                <li><a href="#" class="text-secondary"> 4002-8922 </a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="navbar-nav text-center">
                                <li>Ajuda</li>
                                <li><a href="#" class="text-secondary"> Políticas de privacidade: </a></li>
                                <li><a href="#" class="text-secondary"> Autores </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
