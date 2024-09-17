<?php
include '../../dao/mod01/FeedbackDAO.php';

require_once '../../modelo/mod01/UsuarioLogin.php';
session_start();





if(!isset($_SESSION['user'])){
    //session_destroy();
    header('location:index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() != 4) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 1:
            header('Location: indexNivel1.php');
            break;
        case 2:
            header('Location: indexNivel2.php');
            break;    
        case 3:
            header('Location: indexNivel3.php');
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

$feedback = new FeedbackDAO();

$lista = $feedback->Listar();
$mensagem;


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gerenciamento dos Usuários</title>

    
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
                                <a href="indexNivel1.php"></a>
                            </li>
                            <li class="page-scroll">
                                <a href="indexNivel1.php">P&aacute;gina Principal</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="dropdown" data-toggle="dropdown">Gerenciar</a> 
                                <ul class="dropdown-menu" id="drop-menu" role="menu">
                                    <li role="presentation"><a href="GerenciarPCD.html" >PCDs</a></li>
                                    <li role="presentation"><a href="GerenciarComunicados.html" >Comunicados</a></li> 
                                </ul>
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
                <div class="container" >
                    <div class="row">
                     <div class="col-lg-12 text-center">
                        <br>
                        <br>
                        <h1>Gerenciar FeedBack</h1>
                        <br>
                        <br>
                    </div>

                </div>
            </div>
        </header>

              
            <!-- About Section -->
            <section id="contact">
                <form class="formResposta" action="enviarResposta.php" method="POST" id="formResposta">
                <div class="container elemento-expandido"><br><br>                           
                    <div>
                        <h2>Listagem de Mensagens</h2><br><br>
                        <table id="lista_feedback" class="table table-condensed">
                            <thead>
                                <tr bgcolor="#3a4857">
                                    <th style="width:10%">Identificador</th>
                                    <th style="width:7%">Status de Visualização</th>
                                    <th style="width:4%">Data de envio</th>
                                    <th style="width:7%">Identificador do Usuário</th>
                                    <th style="width:15%">Topico</th>
                                    <th style="width:5%"></th>
                                    
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $arrayId = array();
                                foreach ($lista as $value): 
                                 

                                    ?>
                                <tr>
                                   <?php $id = $value->getId();
                                   

                                        $mensagem = $value->getMensagem();


                                    ?> 
                                     
                                   
                                   <td class = "identificador"><?php echo $value->getId(); ?></td>
                                   <td class = "status" ><?php echo $value->getStatus(); ?></td>
                                   <td class = "dataHora"><?php echo $value->getDataHora(); ?></td>
                                   <td class = "idUsuario"><?php echo $value->getIdUsuario(); ?></td>
                                   <td class = "topico"><?php echo $value->getTopico(); ?></td>


                                   <td><button name = "ide" class="btn btn-primary btn-table btn-editar" data-toggle="modal" data-target="#modalResponder" value = <?php echo $id;?> >Responder</button></td>     
                                   </tr>                                  <?php 
                                   endforeach;
                                   ?>

                               </tbody>

                           </table>
                       </div>
                   </div>
               </div>
               <form>
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
        <script src="../../js/custom/mod01/tabela.js"></script>
<!--         <script src="js/dataTables.editor.min.js"></script> -->
        
        <!-- Data Tables Buttons -->
        <script src="../../js/plugin/dataTables.buttons.min.js"></script>

             <!-- Data Tables Buttons -->
        <script src="../../js/plugin/dataTables.buttons.min.js"></script>

         <!-- Bootstrap Core JavaScript -->
         <script src="../../js/plugin/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../js/plugin/freelancer.js"></script>

        <script src="../../js/plugin/jquery.js"></script>
        <!-- script para o formulário do modal-->
        
        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="../../js/custom/mod01/classie.js"></script>
        <script src="../../js/custom/mod01/cbpAnimatedHeader.js"></script>

        
        <script>
        function mostrar_formulario(valor_select) {

            switch (valor_select) {
                case '1':
                $("#form_instituicao").css("display", "block");
                $("#form_especialista").css("display", "none");
                break;
                case '2':
                $("#form_especialista").css("display", "block");
                $("#form_instituicao").css("display", "none");
                break;
                default:
                $("#form_especialista").css("display", "none");
                $("#form_instituicao").css("display", "none");
                break;
            }
        }
        </script>



    </body>

    </html>

