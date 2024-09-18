<?php
include 'class/HistoricoPCDDAO.php';

if (isset ($_GET['id'])){
    $id = $_GET['id'];
}

if (isset ($_GET['datainicial'])){
    $datainicial = $_GET['datainicial'];
}

if (isset ($_GET['datafinal'])){
    $dataFinal = $_GET['datafinal'];
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

    <title>Projeto Indra</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Data Tables CSS -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/buttons.dataTables.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/formValidation.min.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

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

            <div class="modal fade" id="modalSensores">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Sensores instalados</h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <?php
                                $pcd = new PCDDAO();
                                $pcd->listarSensoresPCD($id);
                                ?>

                            </ul>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Contact Section -->
            <section id="contact">
                <h2 align="center">Dados Históricos DE UMA PCD</h2><br>
                <div class="container"><br>
                    <h4 align="center" >Dados cadastrais da PCD</h4><br>
                    <table align="center" style="width:100%" class="table table-condensed">
                        <thead>
                            <tr bgcolor="#3a4857">
                                <th style="width:15%">Plataforma</th>
                                <th style="width:25%">Munícipio</th>
                                <th style="width:10%">UF</th>
                                <th style="width:25%">Latitude</th>
                                <th style="width:25%">Longitude</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        /* $i = 1;
                          $pcd = new PCDDAO();

                          foreach ($_SESSION['valores'] as $valor) {
                          $pcd->listarPCD($valor);
                      } */

                      $pcd = new PCDDAO();
                      $pcd->PCDTabela($id);
                      ?>
                  </tbody>
              </table>

              <h4 align="center" >Dados dos sensores da PCD</h4>
              <br>
              
              <form method="GET" action="DadosHistoricosPCD.php" name="FormData" id="FormData">
                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <div class="form-group">
                    <label>Data Inicial:</label>
                    <!--<input type="date" id="datainicial" name="datainicial" style="width: 20%;" class="form-control select">-->
                    <input type="text" id="datainicial" name="datainicial" style="width: 16%;" class="form-control select" placeholder="Data Inicial" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>

<!--                        <select style="width: 16%;" class="form-control select" name="datainicial" id="datainicial">

                            <option></option>
                        <?php
//                            $data = new PCDDAO($id);
//                            $data->listarData($id);
                        ?>

                    </select>-->

                    <label>Data Final:</label>
                    <!--<input type="date" id="datafinal" name="datafinal" style="width: 20%;" class="form-control select">-->
                    <input type="text" id="datafinal" name="datafinal" style="width: 16%;" class="form-control select" placeholder="Data Final" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>
<!--                        <select style="width: 16%;" class="form-control select" name="datafinal" id="datafinal">

                            <option></option>
                        <?php
//                            $data = new PCDDAO($id);
//                            $data->listarData($id);
                        ?>
                    </select>-->

                    <input type="submit" value="Nova Pesquisa" class="btn btn-primary btn-table">

                    <!--<button class="btn btn-primary btn-table ">Nova Pesquisa</button>-->
                </div>
            </form>

            <table style="width:30%">
                <tr>                    
                    <td style="width:25%"><a href="DadosHistoricosPCD.php?id=<?php echo $id; ?>" class="btn btn-primary btn-table">Limpar</a></td>
                    <td style="width:75%"><button class="btn btn-primary btn-table ">Exportar Medições</button></td>
                </tr>
            </table>

            <br>

            <table id="DadosSensores" align="center" style="width:100%" class="table table-condensed">
                <thead>
                    <tr bgcolor="#3a4857">
                        <th style="width:15%">Data</th>
                        <th style="width:15%">Hora</th>
                        <th style="width:15%">Tipo de Medição</th>
                        <th style="width:15%">Tipo de Sensor</th>
                        <th style="width:15%">Dado da Medição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					
					if ((isset ($_GET['datainicial']))|| (isset ($_GET['dataFinal']))){
					
                    $pcd = new PCDDAO();
                    $pcd->listarDadosPCD($id, $datainicial, $dataFinal);
					
					}else{
						
						echo '<h4>INSIRA UM PERÍODO PARA ACESSAR OS DADOS!</h4>';
					}
                    ?>
                </tbody>
            </table>
            <?php  ?>

            <table style="width:50%">
                <tr>
                    <td style="width:50%"><label>Análisar dados em formato de gráfico:</label><td>
                        <td style="width:15%"><a href="GraficoLinear1x.php?id=<?php echo $id; ?>" class="btn btn-primary btn-table">Linear</a></td>
                        <td style="width:15%"><a href="GraficoDeBarra1x.php?id=<?php echo $id; ?>" class="btn btn-primary btn-table">Barras</a></td>

                    </tr>
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
        <script src="js/jquery.js"></script>

        <!-- Data Tables JQuery -->
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/tables.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/formValidation.min.js"></script>
        <script src="js/formValidation-bootstrap.min.js"></script>
        <script src="js/validationNovaPesquisa.js" type="text/javascript"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<!--        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>-->

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>