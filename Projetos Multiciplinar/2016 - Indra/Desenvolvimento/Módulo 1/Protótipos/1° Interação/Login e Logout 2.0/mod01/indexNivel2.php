<?php
session_start();
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body id="page-top" class="index">
        <?php
        echo $_SESSION['usuario'];
        ?>

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
                        <a href="#page-top"></a>
                    </li>
                    
                    <li class="">
                        <a href="#ferramentas"> Ferramentas </a>
                    </li>
                    <li class="">
                        <a href="MeuPerfil.html"> Meu Perfil </a>
                    </li>
                    <li class="">
                        <a href="FaleConosco.html"> Fale Conosco </a>
                    </li>
                    <li id="btn-login">
                        <?php
                        session_destroy();
                        ?>
                        <a href="indexNivel1 .php"> Logout </a>
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
                    <img class="img-responsive" id="logo-indra" src="img/logo-indra.png" alt="logo">
                    <div class="intro-text">
                        <span class="skills">Portal do Clima de S&atilde;o Jo&atilde;o e Regi&atilde;o</span>
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
        <!--
        <section  id="ferramentas">
            <div class="container elemento-expandido">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Ferramentas</h2>
                        <br />
                        <br />

                        <div class="col-md-4 col-sm-6">
                            <div class="thumbnail" >
                                <img  class="card-img" src="img/iconemod1.png" alt="iconemod1">
                                <div class="caption link-ferramenta"  >
                                    <h3>Ferramenta 1</h3>
                                    <p>Descri&ccedil;&atilde;o</p>
                                    <p><a href="ferramenta1.html" role="button">Saiba mais...</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <img  class="card-img" src="img/iconemod2.png" alt="iconemod1">
                                <div class="caption link-ferramenta" >
                                    <h3>Ferramenta 2</h3>
                                    <p>Descri&ccedil;&atilde;o</p>
                                    <p><a href="ferramenta2.html" role="button">Saiba mais...</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <img  class="card-img" src="img/iconemod3.png" alt="iconemod1">
                                <div class="caption link-ferramenta" >
                                    <h3>Ferramenta 3</h3>
                                    <p>Descri&ccedil;&atilde;o</p>
                                    <p><a href="ferramenta3.html" role="button">Saiba mais...</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2"></div>

                        <div class="col-md-4 col-sm-6" >
                            <div class="thumbnail">
                                <img  class="card-img" src="img/iconemod4.png" alt="iconemod1">
                                <div class="caption link-ferramenta" >
                                    <h3>Ferramenta 4</h3>
                                    <p>Descri&ccedil;&atilde;o</p>
                                    <p><a href="ferramenta4.html" role="button">Saiba mais...</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <img  class="card-img" src="img/iconemod5.png" alt="iconemod1">
                                <div class="caption link-ferramenta" >
                                    <h3>Ferramenta 5</h3>
                                    <p>Descri&ccedil;&atilde;o</p>
                                    <p><a href="ferramenta5.html" role="button">Saiba mais...</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
        </div>
        </section>
    -->

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
                            <img  class="card-img" src="img/iconemod1.png" alt="iconemod1">
                            <div class="caption link-ferramenta"  >
                                <h3>Ferramenta 1</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta1.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="img/iconemod2.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 2</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta2.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="img/iconemod3.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 3</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta3.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas" >
                        <div class="thumbnail">
                            <img  class="card-img" src="img/iconemod4.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 4</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta4.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="img/iconemod5.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 5</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta5.html" role="button">Saiba mais...</a></p>
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
