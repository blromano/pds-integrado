<?php

require_once "../../modelo/mod01/UsuarioLogin.php";
session_start();




if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() != 3 ){
       
        switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 1:
            header('Location: indexNivel1.php');
            break;
        
        case 2:
            header('Location: indexNivel2.php');
            break;

        case 4:
            header('Location: indexNivel4.php');
            break;
        default:
          
            header('location:index1.php');  
            break;
        }
    }
}
?>


?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Projeto Indra</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../../css/plugin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/plugin/freelancer.css" rel="stylesheet">
    <!-- formVailidatior.io CSS -->
    <link href="../../css/plugin/formValidation.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../../css/custom/mod01/style.css" rel="stylesheet" type="text/css"/>

    </head>

  <body id="page-top" class="index">


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" id="menu">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#page-top" class="page-scroll icone-menu-container">
                        <img  class="img-responsive" src="../../img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="">
                             <a href="MeuPerfil.html"> Meu Perfil</a>  
                        </li>
                        <li class="page-scroll">
                            <a href="#about"> Sobre N&oacute;s </a>
                        </li>
                        <li class="page-scroll">
                            <a href="#ferramentas"> Ferramentas </a>
                        </li>
                        
                        <li class="">
                            <a href="GerenciarPCD.php"> PCDs </a>
                        </li>
                        <li id="btn-login">
                            <a href="../../class/mod01/logout.php"> Logout </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header id="painel-inicial">
            <div class="container elemento-expandido" >
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive" id="logo-indra" src="../../img/logo-indra.png" alt="logo">
                        <div class="intro-text">
                            <span class="skills">Portal do Clima de S&atilde;o Jo&atilde;o e Regi&atilde;o</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section class="success" id="about">
            <div class="container elemento-expandido">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2> Sobre Nós </h2>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-2">
                        <p>"Indra" é um portal de consulta e comparação do clima, onde o usuário pode ver informações referentes a úmidade, temperatura, nível da chuva e outras, tendo a oportunidade de agrupá-las em gráficos e tabelas. Os dados do portal são coletados por PCDs, sendo estas estações de coleta de dados equipadas com diversos dispositivos sensoriais.</p>
                    </div>
                    <div class="col-lg-4">
                        <p>O portal foi desenvolvido pela turma do 4º Ano do Ensino Médio integrado ao Técnico em Informática de 2016 como projeto da disciplina de PDS(Projeto de Desenvolvimento de Sistemas). O nome "Indra" refere-se a um deus do hinduísmo, responsável pelas tempestades.</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" class="btn btn-xs btn-spoiler spoiler-trigger" data-toggle="collapse">Resposáveis</button>
                    </div>
                    <div class="panel-collapse collapse out">
                        <div class="panel-body">
                            <p>Nome 1</p>
                            <p>Nome 2</p>
                            <p>Nome 3</p>
                            <p>Nome 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    

         <!-- Ferramentas -->
    <section  id="ferramentas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ferramentas</h2>
                    <br />
                    <br />

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail" >
                            <img  class="card-img" src="../../img/iconemod1.png" alt="iconemod1">
                            <div class="caption link-ferramenta"  >
                                <h3>Meu Perfil</h3>
                                <p><a href="MeuPerfil1.php" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod2.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Fale Conosco</h3>                                
                                <p><a href="../../indra/mod01/FaleConosco.php" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod3.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Medições</h3>                               
                                <p><a href="../../ferramentas/ferramenta5User.php" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas" >
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod4.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Relatórios</h3>                                
                                <p><a href="../../ferramentas/ferramenta4.php" role="button">Saiba mais...</a></p>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>

        <!-- Footer -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container ">
                    <div class="row">
                        <div class="footer-col col-md-6">
                            <h3>Local</h3>
                            <p>Instituto Federal de Educação, Ciência e Tecnologia de São Paulo<br>Campus São João da Boa Vista</p>
                        </div>
                        <div class="footer-col col-md-6">
                            <h3>Redes Sociais</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="https://www.facebook.com/ifspsaojoaodaboavista" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll visible-xs visible-sm">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

         <!-- jQuery -->
    <script src="../../js/plugin/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/plugin/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <!--- formValidation.io jQuery -->
    <script src="../../js/plugin/formValidation.min.js"></script>
    <script src="../../js/plugin/formValidation-bootstrap.min.js"></script>
    <script src="../../js/custom/mod01/validator.js"></script>
    <script src="../../js/custom/mod01/validatorCadastro.js"></script>
    <script src="../../js/custom/mod01/validatorLogin.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/plugin/freelancer.js"></script>

    </body>

</html>
