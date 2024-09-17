<?php
require_once '../../modelo/mod01/Usuario.php';
require_once '../../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() > 3) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 2:
            header('Location: ../mod01/indexNivel2.php');
            break;
        case 3:
            header('Location: ../mod01/indexNivel3.php');
            break;
        case 4:
            header('Location: ../mod01/indexNivel4.php');
            break;      
        default:
            unset($_SESSION['user']); 
            session_destroy();
            header('location:../mod01/index1.php'); 
            break;
        }

    }
}
?>
<!-- http://www.princiweb.com.br/blog/programacao/google-apis/google-maps-api-v3-busca-de-endereco-e-autocomplete.html -->
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ferramenta 4</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../../css/plugin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/plugin/freelancer.css" rel="stylesheet">

    <link href="../../css/custom/mod04/estilo_input.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans+Condensed:700,300,300italic|Open+Sans:400,300italic,400italic,600,600italic,700,700italic,800,800italic|PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="../../css/custom/mod04/style.css" rel="stylesheet" type="text/css"/>
    <!--<link rel="stylesheet" type="text/css" href="font-awesome/css/mapa_descricao_marcador.css">--> 
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:600" type="text/css" rel="stylesheet" />
    <!--<link rel="stylesheet" type="text/css" href="css/estilo_infowindow.css">-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>

        <body id="page-top" class="index">

            <div id="background-modal" class="elemento-escondido"></div>

            <div id="modal-login" class="elemento-escondido">

                <form name="sentMessage" id="form-login" novalidate>
                    <div class="row control-group">
                        <label>LOGIN</label>
                        <br />
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Email </label>
                            <input type="email" class="form-control entrada-texto" placeholder="Email" required data-validation-required-message="Por favor, digite seu email.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Senha </label>
                            <input type="password" class="form-control entrada-texto" placeholder="Senha" required data-validation-required-message="Por favor, digite uma senha válida.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12" id="cadastrar">
                            <button type="submit" class="btn btn-primary"> Login </button>
                            <div  class="btn btn-primary" id="btn-cancelar"> Cancelar </div>
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
                            <img  class="img-responsive" src="img/icone.png" id="icone-menu" alt="icone"/>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">

                        <ul class="nav navbar-nav navbar-right">

                            <li class="hidden">
                                <a href="../mod01/indexNivel1.php"></a>
                            </li>
                            <li class="page-scroll">
                                <a href="../mod01/indexNivel1.php">P&aacute;gina Principal</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="dropdown" data-toggle="dropdown">Ferramentas</a> 
                                <ul class="dropdown-menu" id="drop-menu" role="menu">
                                    <li role="presentation"><a href="ferramenta1.html" >Ferramenta 1</a></li>
                                    <li role="presentation"><a href="ferramenta2.html" >Ferramenta 2</a></li>
                                    <li role="presentation"><a href="ferramenta3.html" >Ferramenta 3</a></li>
                                    <li role="presentation"><a href="ferramenta5.html" >Ferramenta 5</a></li>
                                </ul>
                            </li>
                            <li class="page-scroll">
                                <a href="#about"> Instru&ccedil;&otilde;es </a>
                            </li>
                            <li class="page-scroll">
                                <a href="#funcionalidades"> Funcionalidades </a>
                            </li>
                            <li id="btn-login" class="page-scroll">
                                <a> Login </a>
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
                            <img class="img-responsive " id="logo-indra" src="img/iconemod4b.png" alt="logo">
                            <div class="intro-text">
                                <span class="skills">Ferramenta 4</span>
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

            <section  id="funcionalidades">
                <div class="container elemento-expandido">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>MAPEAMENTO DE PCD</h2>
                            <br />
                            <!-- Barra de Busca -->
                            <form method="post" action="MapeamentoPCDs.html" id="campos_mapa">   
                                <fieldset>
                                    <legend>Google Maps</legend>   

                                    <div id="barra_busca" class="campos">
                                        <label for="txtEndereco">ENDEREÇO:</label>
                                        <input type="text" id="txtEndereco" name="txtEndereco" style="color: #122b40"/>
                                        <input type="button" id="btnEndereco" name="btnEndereco" value="PROCURAR" />
                                    </div>
                                    <br />
                                    <!-- Div do Mapa -->
                                    <div id="mapa" style="width: 1200px;height: 400px;border: 10px solid #ccc;margin-bottom: -10px;; margin-top: -20px"></div>
                                    <br />
                                    <!-- Div da Latitude e da Longitude do Click -->
                                    <div id="linha_dados" style="height: 10%;width: 100%;margin-top: 10px">
                                        <label for="lat">LATITUDE:</label>
                                        <input id="txtLatitude" name="txtLatitude" type="text" value="0" style="color: #122b40 ;margin-right: 30px" readonly/>
                                        <label for="lng">LONGITUDE:</label>
                                        <input id="txtLongitude" name="txtLongitude" type="text" value="0" style="color: #122b40" readonly/>
                                    </div>
                                    <br />                                
                                </fieldset>
                            </form>

                            <div id="botoes_f4" style="height: 10%;width: 100%;margin-top: 10px">
                                <label>
                                    <h6>Acesse a Lista de PCDs Completa!</h6>
                                </label>
                                
                                
                                <a href="../../indra/mod04/ListaDePCDs.php" id="relatorioPCDs" name="relatorioPCDs" type="button" value="LISTA DE PCDs" class="botao">LISTA DE PCDs</a>

                                <br>
                                <br>
                                <label style="padding: 0px 5px 5px 5px;">
                                    <h6>Acesse o Relatório de Alertas Completo!</h6>
                                </label>
                                <a href="../../indra/mod04/HistoricoAlertasUsuario.php" id="relatorioAlertas" name="relatorioAlertas" type="button" value="HISTÓRICOS DE ALERTAS" class="botao">HISTÓRICOS DE ALERTAS</a>
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
                        <script src="../../js/custom/mod04/classie.js"></script>
                        <script src="../../js/custom/mod04/cbpAnimatedHeader.js"></script>

                        <!-- Contact Form JavaScript -->
                        <script src="../../js/custom/mod04/jqBootstrapValidation.js"></script>
                        <script src="../../js/custom/mod04/contact_me.js"></script>

                        <!-- Custom Theme JavaScript -->
                        <script src="../../js/plugin/freelancer.js"></script>

                        <!-- Caixa de informação -->
                        <script src="../../js/custom/mod04/infobox.js"></script>

                        <!-- Agrupamento dos marcadores -->
                        <script src="../../js/custom/mod04/markerclusterer.js"></script>

                        <!-- Inicializando o Mapa -->
                        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                        <script type="text/javascript" src="../../js/custom/mod04/jquery.min.js"></script>
                        <script type="text/javascript" src="../../js/custom/mod04/jquery-ui.custom.min.js"></script>

                        <script type="text/javascript" src="../../js/custom/mod04/pontos.json"></script>

                        <!-- Script do Mapa -->
                        <script src="../../js/custom/mod04/mapa.js"></script>

                    </body>

                    </html>
