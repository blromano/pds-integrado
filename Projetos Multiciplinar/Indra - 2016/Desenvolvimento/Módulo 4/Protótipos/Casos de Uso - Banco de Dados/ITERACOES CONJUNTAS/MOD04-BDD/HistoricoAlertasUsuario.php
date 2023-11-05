<!DOCTYPE html>

<?php
include 'class/AlertaPopularDAO.php';

$alertas = new AlertaPopularDAO();

if (isset($_POST['datainicial']))
    $dataInicial = $_POST['datainicial'];
else
    $dataInicial = '01/01/0001';
if (isset($_POST['datafinal']))
    $dataFinal = $_POST['datafinal'];
else
    $dataFinal = '31/12/9999';
?>

<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Projeto Indra - Histórico de Alertas</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/freelancer.css" rel="stylesheet">
        <link href="css/fileinput.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/carrosel.css" rel="stylesheet">


        <!-- Data Tables CSS -->
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/buttons.dataTables.css" rel="stylesheet">

        <!-- formVailidatior.io CSS -->
        <link href="css/formValidation.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/formValidation.min.css" rel="stylesheet" type="text/css"/>


    </head>

    <script type="text/javascript">
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i)
            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }
    </script>

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
                    <a href="index.html" class="page-scroll icone-menu-container">
                        <img class="img-responsive" src="img/icone.png" id="icone-menu" alt="icone"/>
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
    </div>



    <!-- Modal Imagens -->
    <div class="modal fade" id="modalImagens">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Descrição do Alerta</h4>
                    <br>
                    <br>
                    <div id="corpoDescricao" class="modal-body">
                    </div>
                </div>

                <div id="corpoImagens" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>

    Modal Descrição 
    <div class="modal fade" id="modalDescricao">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Descrição do Alerta</h4>
                </div>
                <div id="corpoDescricao" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Contact Section -->
    <section id="contact">
        <div class="container">

            <div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>ALERTAS ENVIADOS PELA POPULAÇÃO</h2>
                    </div>
                </div>
                
                <br><br>
                <input id="dataInicial"  type="hidden">
                <input id="dataFinal"  type="hidden">
                
                

                    <div class="form-group">
                        <form method="POST" action="" name="FormData" id="FormData">
                            <label >Data Inicial:</label>
                            <input type="text" id="datainicial" value=<?php
                            if (isset($_POST['datainicial']))
                                echo $_POST['datainicial'];
                            else
                                echo "\"\"";
                            ?> name="datainicial" style="width: 20%;" class="form-control select" placeholder="dd-mm-aaaa" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>
                            <label>Data Final:</label>
                            <input type="text" value=<?php
                            if (isset($_POST['datafinal']))
                                echo $_POST['datafinal'];
                            else
                                echo "\"\"";
                            ?> id="datafinal" name="datafinal" style="width: 20%;" class="form-control select" placeholder="dd-mm-aaaa" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>

                            <input type="submit" value="Filtrar Data" class="btn btn-primary" style="margin-left: 0%">
                            <a class="btn btn-primary" style="margin-left: 1%" href="HistoricoAlertasUsuario.php">Limpar</a>
                        </form>
                    </div>
                    
                
                <div style="display:none;" id="selectLocal" class="form-group">
                    <div>
                        <?php
                        $alertas->listarLocalidades();
                        ?>
                    </div>
                </div>
                    

                <br>
                <table  id="list-Alerts" class="table table-condensed">
                    <thead>
                        <tr bgcolor="#3a4857">
                            <th style="width:28%">Autor</th>
                            <th style="width:20%">Rua</th>
                            <th style="width:10%">Bairro</th>
                            <th style="width:15%">Cidade</th>
                            <th style="width:10%">Data</th>
                            <th style="width:7%">Hora</th>
                            <th style="width:15%">Status</th>
                            <th style="width:10%">Tipo</th>
                            <th style="width:5%"></th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $alertas->listarAlertasPopular($dataInicial, $dataFinal);
                        ?>

                    </tbody>
                    <tfoot>

                    </tfoot>
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/formValidation.min.js"></script>
    <script src="js/formValidation-bootstrap.min.js"></script>
    <script src="js/validationNovaPesquisa.js" type="text/javascript"></script>

    <!-- Data Tables JQuery -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/tablesPlus.js"></script>
    <script src="js/tables.js"></script>

    <!-- Data Tables Buttons -->
    <script src="js/dataTables.buttons.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="js/enviarAlertarADM.js"></script>
    <script src="js/multi-step-modal.js"></script>

</body>
</html>
