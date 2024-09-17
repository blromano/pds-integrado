<!DOCTYPE html>
<html lang="pt-br">
<?php
require_once '../../modelo/mod01/UsuarioLogin.php';
session_start();





if(!isset($_SESSION['user'])){
    //session_destroy();
    header('location:index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() > 4) {
       
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

?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fale Conosco</title>

     
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

  

<script>
function validaForm()
{

   var TextMsg =  cadastrar_feedback.FEE_MENSAGEM.value;

   if(cadastrar_feedback.FEE_TOPICO.selectedIndex==0){
            alert("Informe o assunto da mensagem");
            
            return false;
        }
   if (TextMsg.length>1000)
   {
       alert("Mensagem muito grande");
   return false;
    }


   if (TextMsg =="")
   {
       alert("Preencha o campo de mensagem");
      
       return false;
    }

}



</script>


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
                        <a class="dropdown-toggle" id="dropdown" data-toggle="dropdown">Ferramentas</a> 
                        <ul class="dropdown-menu" id="drop-menu" role="menu">
                            <li role="presentation"><a href="ferramenta1.html" >Ferramenta 1</a></li>
                            <li role="presentation"><a href="ferramenta3.html" >Ferramenta 3</a></li>
                            <li role="presentation"><a href="ferramenta4.html" >Ferramenta 4</a></li>
                            <li role="presentation"><a href="ferramenta5.html" >Ferramenta 5</a></li>
                        </ul>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"> Fale Conosco </a>
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
                <div class="col-lg-12">
                    <img class="img-responsive " id="logo-indra" src="../../img/iconemod2b.png" alt="logo">
                    <div class="intro-text">
                        <span class="skills">Ferramenta 2</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->

        <section class="success" id="about">
            <form class = "cadastrar_feedback" name ="cadastrar_feedback"  method="post" action="../../class/mod01/CadastrarFeedBack.php" novalidate id = "cadastrar_feedback" onsubmit="return validaForm()" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2> Fale Conosco </h2>
                        <br>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="USU_ID" value="<?php echo $_SESSION['user']->getId();?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br></br>
                    <div class="form-group">
                        <label for="comment">Digite sua mensagem:</label>
                        <br></br>
                        <select class="form-control select" name = "FEE_TOPICO" required>
                            <option value="0">Assunto</option>
                            <option value="1">Dúvida</option>
                            <option value="2">Critíca</option>
                            <option value="3">Sugestões</option>
                        </select>
                        <br></br>
                        <label for="comment">Digite sua mensagem:</label>
                        <textarea id="comment" class="form-control" rows="5" style="width: 100%" name = "FEE_MENSAGEM" required></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Enviar" role="button" >
                </div>
                <form>
                </section>

                <section  id="funcionalidades">
                    <div class="container elemento-expandido">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2>Funcionalidades</h2>
                                <br />
                                <br />
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
            <script src="../../js/custom/mod01/classie.js"></script>
        <script src="../../js/custom/mod01/cbpAnimatedHeader.js"></script>
    
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

