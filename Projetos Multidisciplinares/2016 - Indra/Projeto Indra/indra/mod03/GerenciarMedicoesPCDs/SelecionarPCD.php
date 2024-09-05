<?php

include '../../../dao/mod03/PcdDao.php';
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

        <title>Gerenciamento de Periodicidade de Medição dos Sensores</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../../../css/plugin/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="../../../css/plugin/freelancer.css" rel="stylesheet">
        <link href="../../../css/custom/mod03/style.css" rel="stylesheet" type="text/css"/>

        <!-- Data Tables CSS -->
        <link href="../../../css/plugin/dataTables.bootstrap.css" rel="stylesheet" />
        
        <!-- Custom Fonts -->
        <link href="../../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        



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
                        <li class="page-scroll" id="btn-login">
                            <a> Login </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contact Section -->
        <section id="contact">

            <div class="container">
                <br /> <br />
                <div class="panel panel-body">

                    <h2>Seleção de PCDs</h2>
                    <br /><br />
                    <table id="pcds" class="table table-condensed">
                        <thead>
                            <tr bgcolor="#3a4857">
                                <th width="20%">Codigo da PCD</th>
                                <th width="28%">Latitude</th>
                                <th width="28%">Longitude</th>
                                <th width="2%"></th>
                                <th width="2%"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            foreach (PcdDao::Listar() as $pcd):
                                ?>
                                <tr>
                                    <td><?php echo $pcd['PCD_ID'] ?></td>
                                    <td><?php echo $pcd['PCD_LATITUDE'] ?></td>
                                    <td><?php echo $pcd['PCD_LONGITUDE'] ?></td>
                                    <td>
                                        <a class="btn btn-primary " href="MedicoesCTR.php?id_pcd=<?php echo $pcd['PCD_ID'] ?>">Gerenciar Medições</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary " href="../GerenciarPeriodicidadeMedicaoSensores/SensoresCTR.php?id_pcd=<?php echo $pcd['PCD_ID'] ?>">Gerenciar Sensores</a>
                                    </td>
                                </tr>

                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
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
        <script src="../../../js/plugin/jquery.js"></script>

        <!-- Data Tables JQuery -->
        <script src="../../../js/plugin/jquery.dataTables.min.js"></script>
        <script src="../../../js/plugin/dataTables.bootstrap.min.js"></script>
        <script src="../../../js/custom/mod03/tables.js"></script>


        <!-- Bootstrap Core JavaScript -->
        <script src="../../../js/plugin/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../../js/plugin/freelancer.js"></script>


    </body>

</html>