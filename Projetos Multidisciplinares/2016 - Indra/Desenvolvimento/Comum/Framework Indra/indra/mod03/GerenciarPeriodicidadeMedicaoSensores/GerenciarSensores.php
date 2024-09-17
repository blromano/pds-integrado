<?php

include '../GerenciarPeriodicidadeMedicaoSensores/SensoresCTR.php';
require_once '../../../modelo/mod01/Usuario.php';
require_once '../../../modelo/mod01/UsuarioLogin.php';




session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../../mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() != 4) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 1:
            header('Location: ../../mod01/indexNivel1.php');
            break;
        case 2:
            header('Location: ../../mod01/indexNivel2.php');
            break;
        case 3:
            header('Location: ../../mod01/indexNivel3.php');
            break;
        case 4:
            header('Location: ../../mod01/indexNivel4.php');
            break;      
        default:
            unset($_SESSION['user']); 
            session_destroy();
            header('location:../../mod01/index1.php'); 
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

        <title>Gerenciar Sensores</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../../../css/plugin/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="../../../css/plugin/freelancer.css" rel="stylesheet">

        <!-- Data Tables CSS -->
        <link href="../../../css/plugin/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <link href="../../../css/custom/mod03/style.css" rel="stylesheet" type="text/css"/>


    </head>


    <body id="page-top" class="index">
        
        <div class="modal fade" id="modal-edit" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alterar Periodicidade de Medição</h4>
                    </div>
                    <div id="form-atualizar">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modal-habilitar" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Habilitar Sensor</h4>
                    </div>
                    <div id="form-habilitar">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modal-desabilitar" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Desabilitar Sensor</h4>
                    </div>
                    <div id="form-desabilitar">
                    
                    </div>
                </div>
            </div>
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
                        <img  class="img-responsive" src="../../../img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="../../../ferramentas/ferramenta3.php">Ferramenta 3</a>
                        </li>
						<li class="page-scroll">
                            <a href="../../../indra/mod01/index1.php">Página Principal</a>
                        </li>
                        <li id="btn-login">
                            <a> Login </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contact Section -->
        <section id="contact">

            <!-- Tabela de Sensores -->
            <div class="container panel panel-body">

                <h2>Gerenciar Sensores da PCD - <?php echo $_SESSION['idPcd'] ?></h2>
                <br/>
                <br/>
                <a class="btn btn-primary" href="../GerenciarMedicoesPCDs/SelecionarPCD.php"> Selecionar PCD</a>

                <table id="sensores-tabela" class="table table-condensed">
                    <thead>
                        <tr bgcolor="#3a4857">
                            <th width="17%">ID do Sensor</th>
                            <th width="17%">Nome</th>
                            <th width="17%">Periodicidade(Minutos)</th>
                            <th width="17%">Estado</th>
                            <th width="17%"></th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tbody id="tabela-sensores">
                        <?php GerarTabelaSensores($_SESSION['idPcd']) ?>
                    </tbody>
                </table>

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
        <script src="../../../js/plugin/jquery.js" type="text/javascript"></script>
        
        <!-- js sensores -->
        <script src="../../../js/custom/mod03/sensoresAJAX.js"></script> 

        <!-- Data Tables JQuery -->
        <script src="../../../js/plugin/jquery.dataTables.min.js"></script>
        <script src="../../../js/plugin/dataTables.bootstrap.min.js"></script>
        <script src="../../../js/custom/mod03/tables.js"></script>
        
        <!-- formValidation.io javaScript -->
        <script src="../../../js/plugin/formValidation.min.js"></script>
        <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>


        <!-- Bootstrap Core JavaScript -->
        <script src="../../../js/plugin/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../../js/plugin/freelancer.js"></script>


    </body>

</html>
