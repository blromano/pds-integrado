<?php


require_once '../modelo/mod01/Usuario.php';
require_once '../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../indra/mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() !=4) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 2:
            header('Location: ../indra/mod01/indexNivel3.php');
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
            header('location:../indra/mod01/index1.php'); 
            break;
        }

    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ferramenta 2</title>

     <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../css/plugin/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/plugin/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="../css/custom/mod02/style.css" rel="stylesheet" type="text/css"/>
		<link href="../css/plugin/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body id="page-top" class="index">

            <div id="background-modal" class="elemento-escondido"></div>

            
            
            <div id="modal-cadastrar-pcd" class="elemento-escondido">

                <form name="sentMessage" id="form-cadastrar-pcd" novalidate>
                    <div class="form-group">
                        <label>Nome da Cidade em que a PCD estará localizada:</label>
                        <input type="text" class="form-control"placeholder="Cidade">
                    </div>
                    <div class="form-group" >
                        <label>País:</label>
                        <input type="text" class="form-control" placeholder="País">
                    </div>
                    <div class="form-group">
                        <label>Estado:</label>
                        <input type="text" class="form-control" placeholder="Estado">
                    </div>
                    <div class="form-group">
                        <label>Código de Identificação:</label>
                        <input type="text" class="form-control"placeholder="Código">
                    </div>
                    <div class="form-group" >
                       <div style="width:50%;float:left">
                        <label>Localização (Latitude):</label>
                        <input type="text" class="form-control"placeholder="Latitude">
                    </div>
                    <div style="width:50%;float:left;">
                        <label>Localização (Longitude):</label>
                        <input type="text" class="form-control"placeholder="Longitude">
                    </div>
                </div >
                <div class="form-group">
                    <label class="control-label">Fotos:</label>
                    <input id="input-1" type="file" class="file">
                </div>
                <div class="row">
                    <div class="form-group col-xs-12" id="cadastrar-cadastrar-pcd">
                        <button type="submit" class="btn btn-primary"> Salvar </button>
                        <div  class="btn btn-primary" id="btn-cancelar-cadastrar-pcd"> Cancelar </div>
                    </div>
                </div>
            </form>
        </div>
        




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
                                <li role="presentation"><a href="ferramenta1.php" >Meu perfil</a></li>
                                <li role="presentation"><a href="ferramenta3.php" >Medições</a></li>
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
                        <img class="img-responsive " id="logo-indra" src="../img/iconemod2b.png" alt="logo">
                        <div class="intro-text">
                            <span class="skills">Ferramenta 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Alertas -->
        <div class="container-fluid elemento-escondido" id="alerta" style="padding: 1em; background-color: rgba(255,0,0,0.4); ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br>
                    <br>
                    <h1>Alertas</h1>
                    <br>
                    <br>
                </div>
            </div>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active" align="center">
                        <img src="img/alerta/alerta-1.jpg" alt="" />
                        <div class="carousel-caption">
                            <h3>TUA MAE, SP</h3>
                            <p>18/03/2016 - 16:30</p>
                            <p>Risco: Grave</p>
                            <p>Pancadão de Verão</p>
                        </div>
                    </div>

                    <div class="item" align="center">
                        <img src="img/alerta/alerta-1.jpg" alt=""/>
                        <div class="carousel-caption">
                            <h3>TEU FILHO, SP</h3>
                            <p>18/03/2016 - 16:48</p>
                            <p>Risco: Grave</p>
                            <p>Pancadão de Verão</p>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                        <h2>pcd'S</h2>
                        <br />
                        <br />
                    </div>
                    <div class="row-lg-9 text-center">

                        <div class="panel-group" style="width: 80%;margin-left:10%; ">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a style="color:#007EA4" data-toggle="collapse" href="#collapse1">Gerenciamento de PCD's</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body painel-modificado" ><a href="../indra/mod02/listarPCDs.php"> Listagem de PCD's </a></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a style="color:#007EA4" data-toggle="collapse" href="#collapse3">Processamento de imagens</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body painel-modificado"><a href="Pesquisar Imagem.html">Listagem de Imagens</a></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a style="color:#007EA4" data-toggle="collapse" href="#collapse4">Gerenciamento de sensores</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body painel-modificado" ><a href="../indra/mod02/listagemTipoSensor.php"> Tipo de Sensor </a></div>
                                    <div class="panel-footer painel-modificado" ><a href="../indra/mod02/pesquisarSensor.php"> Listagem de Sensores </a></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a style="color:#007EA4" data-toggle="collapse" href="#collapse6">Controle de Funcionamento de PCD's</a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse">
                                    <div class="panel-body painel-modificado"><a href="../indra/mod02/ControledeFuncionalidades.php"> Habilitar/Desabilitar </a>
                                    </div>
                                    <div class="panel-footer painel-modificado" ><a href="Historico.html"> Histórico de Funcionamento de PCD </a></div>
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

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        

        <!-- Contact Form JavaScript -->
        

        <!-- Custom Theme JavaScript -->
        <script src="../js/plugin/freelancer.js"></script>
        <script src="../js/plugin/fileinput.min.js"></script>
        <script src="../js/plugin/fileinput_locale_pt-BR.js"></script>

    </body>

    </html>
