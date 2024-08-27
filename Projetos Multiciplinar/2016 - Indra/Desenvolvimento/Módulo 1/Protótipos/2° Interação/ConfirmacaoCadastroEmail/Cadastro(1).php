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

    <!-- formVailidatior.io CSS -->
    <link href="css/formValidation.min.css" rel="stylesheet">

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

            <script type = "text/javascript">
            function altera() {

                document.getElementById("dropdownMenu1").innerHTML = "Ativado <span  class= 'caret' ></span>";

            }

            function altera2() {

                document.getElementById("dropdownMenu1").innerHTML = "Desativados <span  class= 'caret' ></span>";
            }


          

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
                            <div  class="btn btn-danger" id="btn-primary"> Cancelar </div>
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
                        <a href="index.html" class="page-scroll icone-menu-container">
                            <img  class="img-responsive" src="img/icone.png" id="icone-menu" alt="icone"/>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="page-scroll">
                                <a href="index.html">P&aacute;gina Principal</a>
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

<!--- formValidation.io jQuery -->
<script src="js/formValidation.min.js"></script>
<script src="js/formValidation-bootstrap.min.js"></script>
<script src="js/validator.js"></script>

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

<script type="js/bootstrap.js"></script>

</body>

</html>
