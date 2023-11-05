<?php
include '../../dao/mod04/PCDDAO.php';

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

    <!-- Data Tables CSS -->
    <link href="../../css/plugin/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../css/plugin/buttons.dataTables.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../../css/custom/mod04/style.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/custom/mod04/estilo_input.css" rel="stylesheet" type="text/css"/>
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
                            <div  class="btn btn-danger" id="btn-cancelar"> Cancelar </div>
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
                            <img  class="img-responsive" src="../../img/icone.png" id="icone-menu" alt="icone"/>
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
                            
                            <li id="btn-login">
                                <a href="../../class/mod01/logout.php"> Logout </a>
                            </li>   
                        </ul>
                    </div>
                    
                </div>
            </nav>

            <!-- Contact Section -->
            <section id="contact">
                <div class="container elemento-expandido"><br>


                    <div class="tab-content">                   

                        <h3 align="center">Plataformas de coletas de dados Cadastradas</h3><br>

                        <div>

                            <table class="table table-condensed table-striped table-hover" id="list-PCD">
                                <thead>
                                    <tr bgcolor="#3a4857">
                                        <th style="width:10%"></th>
                                        <th style="width:10%">Plataforma</th>
                                        <th style="width:20%">Munícipio</th>
                                        <th style="width:10%">UF</th>
                                        <th style="width:20%">Latitude</th>
                                        <th style="width:20%">Longitude</th>
                                        <th style="width:20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $pcds = new PCDDAO();
                                    $pcds->listarPCD();
                                    ?>
                                </tbody>
                            </table>

                        </div>

                        <div align="center" style="width: 100%">
                            <button class="btn btn-primary btn-table"><a style="color: #ffffff; text-decoration:none;" id="comparacao"><h6>Comparar PCDs</h6></a></button><br>
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

            <!-- Data Tables JQuery -->
            <script src="../../js/plugin/jquery.dataTables.min.js"></script>
            <script src="../../js/plugin/dataTables.bootstrap.min.js"></script>        
            <script src="../../js/custom/mod04/tables.js"></script>

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
            
            <script>
                $(document).ready(function () {
                    var cont = 0;
                    var id;
                    var idCheck = [];
                    $('#list-PCD tbody').on('click', 'input', function () {
                        if ($(this).is(':checked')) {
                            id = this.value;  
                            idCheck.push(id);
                            cont++;
                        } else{
                            var index;
                            id = this.value;  
                            for (var i = 0; i < idCheck.length; i++) {
                                if(+id== +idCheck[i])
                                    index = i;
                            }
                            idCheck.splice(index, 1);
                            cont--;
                        }
                    });


                    $('#comparacao').click(function () {
                        if (cont === 2 || cont === 3)
                            window.location.href = "tabeladecomparacao.php?id1=" + idCheck[0] + "&id2=" + idCheck[1] + "&id3=" + idCheck[2];
                        else if (cont < 2)
                            alert("Por favor, selecione no mínimo 2 PCds.");
                        else {
                            alert("Por favor, selecione no máximo 3 PCds.");
                        }

                    });
                });
            </script>

        </body>

        </html>