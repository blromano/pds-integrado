
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
    <?php
    if (!isset($_SESSION)){
        session_start();
    }


    if((!isset ($_SESSION['USU_EMAIL']) == true) and (!isset ($_SESSION['USU_NOME']) == true))
    {
        unset($_SESSION['USU_EMAIL']);
        unset($_SESSION['USU_NOME']);
        //header('location:sucesso.php');
        
    }else{
       

    }

    $endereco = $_SESSION['USU_EMAIL'];
    $nome = $_SESSION['USU_NOME'];
    print_r($_SESSION);
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
                    <img  class="img-responsive" src="../img/icone.png" id="icone-menu" alt="icone"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">

                <ul class="nav navbar-nav navbar-right">

                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#"> Olá <?php echo $nome; ?> </a>
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
                    <div class="intro-text">
                        <span class="skills">Confirmação de Cadastro</span>
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


                 <p> Olá, obrigado por se inscrever no sistema Indra. </p>
                 <p>Para confirmar seu cadastro vá até seu email <?php  echo $endereco; ?> e confira seu código de acesso.</p>
                  <?php 

                  // session_destroy(); ?>
                 <p> Esperamos por você.</p>
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
