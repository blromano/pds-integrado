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

$ids = [];
$ids[] = $_GET['id1'];
$ids[] = $_GET['id2'];
if(isset($_GET['id3'])) $ids[] = $_GET['id3'];

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
    <link href="../../css/plugin/formValidation.min.css" rel="stylesheet" type="text/css"/>

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
                <div  class="modal-body">
                    <ul id="corpoModal" class="list-group">
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
	
	<br><br>
			
			<div class="panel">
				<div class="panel-body">
					<a class="btn btn-primary btn-table" href="ListaDePCDs.php">Voltar para Lista de PCDs</a>
				</div>
			</div>

    <!-- Contact Section -->
    <section id="contact">
        <h3 align="center">Tabela de comparação entre medições de PCDs</h3><br>
        <div class="container"><br>
            <h4 align="center" >Dados cadastrais das PCDs</h4><br>
            <table align="center" id="tableDadoCadatrais" style="width:100%" class="table table-condensed">
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
                    $pcd = new PCDDAO();
                    $pcd->TabelaDadosCadastraisPCD($ids);
                    ?>
                </tbody>
            </table>

            <h4 align="center" >Dados das medições das PCDs</h4>
            <br>

            <form method="GET" action="tabeladecomparacao.php" name="FormData" id="FormData">
                <input type="hidden" name="id1" value=<?php echo $ids[0]; ?>>
                <input type="hidden" name="id2" value=<?php echo $ids[1]; ?>>
                <input type="hidden" name="id3" value=<?php echo $ids[2]; ?>>
                <div class="form-group">
                    <label>Data Inicial:</label>
                    <input type="text" id="datainicial" name="datainicial" style="width: 16%;" class="form-control select" placeholder="Data Inicial" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>

                    <label>Data Final:</label>

                    <input type="text" id="datafinal" name="datafinal" style="width: 16%;" class="form-control select" placeholder="Data Final" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>

                    <input type="submit" value="Nova Pesquisa" class="btn btn-primary btn-table">
                </div>
            </form>
            
            <table style="width:25%">
                <tr>                    
                    <td><button class="btn btn-primary btn-table ">Exportar Medições</button></td>
                </tr>
            </table>

            <br>

            <table id="tabelaComparacao" align="center" style="width:100%" class="table table-condensed">
                <thead>
                    <tr bgcolor="#3a4857">
                        <th style="width:17%">Data</th>
                        <th style="width:24%">Tipo de Sensor</th>
                        <th style="width:26%">Tipo de Medição</th>
                        <th style="width:23%">Dado da Medição</th>
                        <th style="width:10%">PCD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pcd = new PCDDAO();
                    if(isset($_GET['datainicial']) && isset($_GET['datafinal']))
                        $pcd->listarDadosComparadosPCDs($ids, $_GET['datainicial'], $_GET['datafinal']);
                    ?>
                </tbody>
            </table>

            <table style="width:50%">
                <tr>
                    <td style="width:50%"><label>Analisar dados em formato gráfico:</label><td>
                        <td style="width:15%"><a href="GraficoLinear1x.php?id=<?php echo $id; ?>" class="btn btn-primary btn-table">Linear</a></td>
                        <td style="width:35%"><button class="btn btn-primary btn-table ">Barras</button></td>

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
        <script src="../../js/plugin/jquery.js"></script>
        <script src="../../js/custom/mod04/comparacao.js"></script>

        <!-- Data Tables JQuery -->
        <script src="../../js/plugin/jquery.dataTables.min.js"></script>
        <script src="../../js/plugin/dataTables.bootstrap.min.js"></script>
        <script src="../../js/custom/mod04/tables.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../js/plugin/bootstrap.min.js"></script>
        <script src="../../js/plugin/formValidation.min.js"></script>
        <script src="../../js/plugin/formValidation-bootstrap.min.js"></script>
        <script src="../../js/custom/mod04/validationNovaPesquisa.js" type="text/javascript"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="../../js/custom/mod04/classie.js"></script>
        <script src="../../js/custom/mod04/cbpAnimatedHeader.js"></script>
        <script src="../../js/custom/mod04/jquery.maskedinput.js" type="text/javascript"></script>
<!--        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>-->

    <!-- Contact Form JavaScript -->
    <script src="../../js/custom/mod04/jqBootstrapValidation.js"></script>
    <script src="../../js/custom/mod04/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/plugin/freelancer.js"></script>

</body>

</html>