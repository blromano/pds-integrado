<?php

require_once '../modelo/mod01/Usuario.php';
require_once '../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../indra/mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() != 4) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 1:
            header('Location: ../indra/mod01/indexNivel1.php');
            break;
        case 2:
            header('Location: ../indra/mod01/indexNivel2.php');
            break;
        case 3:
            header('Location: ../indra/mod01/indexNivel3.php');
            break;
        case 4:
            header('Location: ../indra/mod01/indexNivel4.php');
            break;      
        default:
            unset($_SESSION['user']); 
            session_destroy();
            header('location: ../indra/mod01/index1.php'); 
            break;
        }

    }
}



?>




<!DOCTYPE html>
<html lang="pt-br">

    <head>

   

        <title>Ferramenta 3</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../css/plugin/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/plugin/freelancer.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/custom/mod03/style.css" rel="stylesheet" type="text/css"/>


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
                        <img  class="img-responsive" src="../img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="hidden">
                            <a href="../indra/mod01/index1.php"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="../indra/mod01/index1.php">P&aacute;gina Principal</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="dropdown" data-toggle="dropdown">Ferramentas</a> 
                            <ul class="dropdown-menu" id="drop-menu" role="menu">
                                <li role="presentation"><a href="../indra/mod01/MeuPerfil1.php" >Meu Perfil</a></li>
                                <li role="presentation"><a href="ferramenta2.php" >PCDs</a></li>
                                <li role="presentation"><a href="ferramenta4.php" >Relatórios</a></li>
                                <li role="presentation"><a href="ferramenta5ADM.php" >Alertas</a></li>
                            </ul>
                        </li>
                        <li class="page-scroll">
                            <a href="#about"> Instru&ccedil;&otilde;es </a>
                        </li>
                        <li class="page-scroll">
                            <a href="#funcionalidades"> Funcionalidades </a>
                        </li>
                        <li id="btn-login" class="page-scroll">
                            <a href="../class/mod01/logout.php"> Logout </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header id="painel-inicial">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive " id="logo-indra" src="../img/iconemod3b.png" alt="logo">
                        <div class="intro-text">
                            <span class="skills">Medições</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- About Section -->
        <section class="success" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2> Instru&ccedil;&otilde;es </h2>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-2">
                        <p>Esta ferramenta corresponde aàs medições da pcd, medição dos sensores e arquivos da pcd. As funcionalidades contemplam o Gerenciamento de Medições da PCD; Gerenciamento da Periodicidade de Medição dos Sensores; Gerenciamento do Estado dos Sensores; Importação do Arquivo de Medições da PCD; Gerenciamento da Periodicidade de Transmissão do arquivo da PCD.</p>
                    </div>
                    <div class="col-lg-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </section>

        <section  id="funcionalidades">
            <div class="container elemento-expandido">
                <div class="column">
                    <div class="row-lg-3 text-center">
                        <h2>Ferramentas</h2>
                        <br />
                        <br />
                    </div>
                    <div class="row-lg-9 text-center">

                        <div class="panel-group" style="width: 80%;margin-left:10%; ">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a style="color:#007EA4" data-toggle="collapse" href="#collapse1">Opções</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">                              
                                    <div class="panel-footer painel-modificado" ><a href="../indra/mod03/GerenciarMedicoesPCDs/SelecionarPCD.php">Selecionar PCD</a></div>
                                    <div class="panel-footer painel-modificado" ><a href="../indra/mod03/ImportarArquivosMedicoes/ImportarArquivosmedicao.php">Importar Arquivo de Medições </a></div>
                                    <div class="panel-footer painel-modificado" ><a href="../indra/mod03/GerenciarPeriodicidadeTransmissaoArquivoMedicoes/PeriodicidadeArquivo.php">gerenciar Periodicidade de Medição dos Arquivos da PCD </a></div>
                                </div>
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
                    <script src="../js/plugin/jquery.js"></script>

                    <!-- Bootstrap Core JavaScript -->
                    <script src="../js/plugin/bootstrap.min.js"></script>


                    <!-- Custom Theme JavaScript -->
                    <script src="../js/plugin/freelancer.js"></script>

                    </body>

                    </html>

