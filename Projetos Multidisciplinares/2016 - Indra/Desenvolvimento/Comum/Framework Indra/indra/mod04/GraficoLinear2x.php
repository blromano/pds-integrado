<?php
include '../../dao/mod04/ComparacaoGraficoDAO.php';

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


if (isset ($_GET['id'])){
    $id = $_GET['id'];
}

$ids = [];

if (isset ($_GET['id1'])){
    $ids[] = $_GET['id1'];
}

if (isset ($_GET['id2'])){
    $ids[] = $_GET['id2'];
}

if (isset ($_GET['id3'])){
    $ids[] = $_GET['id3'];
}

if (isset ($_GET['idsensor'])){
    $idsensor = $_GET['idsensor'];
}

if (isset ($_GET['datainicial'])){
    $datainicial = $_GET['datainicial'];
}

if (isset ($_GET['datafinal'])){
    $dataFinal = $_GET['datafinal'];
}

$pcds = new GraficoDAO();
$grafico1x = new GraficoDAO();

?>


<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto Indra</title>

    <script src="../../js/plugin/Chart.bundle.js"></script>

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
                        <img  class="img-responsive" src="../../img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="hidden">
                            <a href="index.html"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.html">P&aacute;gina Principal</a>
                        </li>

                        <li id="btn-login">
                            <a href="../../class/mod01/logout.php"> Logout </a>
                        </li>   
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Aqui -->
        <section id="contact">
            <div class="container">
                <div class="box">

                    <div id="TituloPaginaGrafico1x" name="TituloPaginaGrafico1x" align="center"">
                        <h3>Análise de Dados</h3>
                    </div>

                    <br>

                    <h4 align="center" >Dados cadastrais da PCD</h4><br>
                    <table id="grphlin" align="center" style="width:100%" class="table table-condensed">
                        <thead>
                            <tr bgcolor="#3a4857">
                                <th style="width:15%">Índice</th>
                                <th style="width:25%">Munícipio</th>
                                <th style="width:10%">UF</th>
                                <th style="width:25%">Latitude</th>
                                <th style="width:25%">Longitude</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pcds = new GraficoDAO();
                            $pcds->PCDTabelaComparacao($ids);
                            ?>
                        </tbody>
                    </table>

                    <br>
                    <br>

                    <div name="NovoGraficoLinha" id="NovoGraficoLinha">                    
                        <form method="GET" action="GraficoLinear2x.php?>" id="FormularioNovoGraficoLinha" name="FormularioNovoGraficoLinha">

                            <input type="hidden" name="id1" value=<?php echo $ids[0]; ?>>
                            <input type="hidden" name="id2" value=<?php echo $ids[1]; ?>>
                            <input type="hidden" name="id3" value=<?php echo $ids[2]; ?>>

                            <div class="form-group">  

                             <label>Data Inicial:</label>                   
                             <input type="text" id="datainicial" name="datainicial" style="width: 21%;" class="form-control select" placeholder="Data Inicial" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>

                             <label>Data Final:</label>                   
                             <input type="text" id="datafinal" name="datafinal" style="width: 21%;" class="form-control select" placeholder="Data Final" pattern="" maxlength="10" onKeyPress="mascara(this, '99/99/9999')" required>

                             <br>
                             <br>

                             <label>SENSOR:</label>
                             <select class="form-control select" name="SensorPCD" id="SensorPCD" style="width: 28%">
                                <option></option>
                                <?php                                
                                $pcds->listarSensoresSemelhantesPCD($ids[0],$ids[1],$ids[2]);
                                ?> 
                            </select> 

                            <input type="submit" value="Gerar Gráfico" class="btn btn-primary btn-table" style="margin-left: 5%">
                            <a href="GraficoLinear2x.php>" class="btn btn-primary btn-table">Limpar</a></td>

                        </div>

                    </form> 
                </div>

                <?php
                if (isset($_GET['SensorPCD']) && ($_GET['SensorPCD'] != '')) {

                    $arrayDatas = ($grafico1x->gerarHorariosMediaGraficoComparado($ids[0], $ids[1], $ids[2], $grafico1x->sensorSelecionadoGraficoPCD($ids[0], $_GET['SensorPCD']),  $grafico1x->sensorSelecionadoGraficoPCD($ids[1], $_GET['SensorPCD']), $grafico1x->sensorSelecionadoGraficoPCD($ids[2], $_GET['SensorPCD']), $datainicial, $dataFinal));

                    echo '<div class = "box-chart" style = "width: 100%;">';

                        //echo '<h4>Temperatura do Ar - Gráfico Linear</h4>';
                    $grafico1x->renomearGraficoPCD($ids[0], $_GET['SensorPCD']);
                    echo '<canvas id = "GraficoLine" style = "width:100%"></canvas>';

                    echo '<script type = "text/javascript">';
                    echo 'var config = {';
                    echo 'type: "line",';
                    echo 'data: {';
                    echo 'labels: [';
                    foreach ($arrayDatas as $arrayData) {

                        echo '"' . $arrayData . '",';
                    }
                    echo '],';
                    echo 'datasets: [';
                    echo '{';
                    echo 'label: "PCD 1",';
                    echo 'fill: true,';
                    echo 'lineTension: 0.05,';
                    echo 'backgroundColor: "rgba(105, 130, 143, 0.5)",';
                    echo 'borderWidth: 1,';
                    echo 'borderColor: "rgba(90, 112, 123, 1)",';
                    echo 'borderDash: [],';
                    echo 'borderDashOffset: 0.0,';
                    echo 'borderJoinStyle: "miter",';
                    echo 'pointBorderColor: "rgba(90, 112, 123, 1)",';
                    echo 'pointColor: "45, 159, 193, 0.6)",';
                    echo 'pointBackgroundColor: "#fff",';
                    echo 'pointBorderWidth: 1,';
                    echo 'pointHoverRadius: 5,';
                    echo 'pointHoverBackgroundColor: "rgba(58, 72, 87, 1)",';
                    echo 'pointHoverBorderColor: "rgba(58, 72, 87, 1)",';
                    echo 'pointHoverBorderWidth: 2,';
                    echo 'pointRadius: 5,';
                    echo 'pointHitRadius: 10,';
                    echo 'data: [';
                        //echo '<?php';
                    $grafico1x->gerarDadosMediaGraficoComparado($id, 2, $grafico1x->sensorSelecionadoGraficoPCD($id, $_GET['SensorPCD']), $grafico1x->sensorSelecionadoGraficoPCD(2, $_GET['SensorPCD']), $datainicial, $dataFinal);
                    echo ']';
                    echo '},';                    
                    echo '{';
                    echo 'label: "PCD 2",';
                    echo 'fill: true,';
                    echo 'lineTension: 0.05,';
                    echo 'backgroundColor: "rgba(105, 130, 143, 0.5)",';
                    echo 'borderWidth: 1,';
                    echo 'borderColor: "rgba(90, 112, 123, 1)",';
                    echo 'borderDash: [],';
                    echo 'borderDashOffset: 0.0,';
                    echo 'borderJoinStyle: "miter",';
                    echo 'pointBorderColor: "rgba(90, 112, 123, 1)",';
                    echo 'pointColor: "45, 159, 193, 0.6)",';
                    echo 'pointBackgroundColor: "#fff",';
                    echo 'pointBorderWidth: 1,';
                    echo 'pointHoverRadius: 5,';
                    echo 'pointHoverBackgroundColor: "rgba(58, 72, 87, 1)",';
                    echo 'pointHoverBorderColor: "rgba(58, 72, 87, 1)",';
                    echo 'pointHoverBorderWidth: 2,';
                    echo 'pointRadius: 5,';
                    echo 'pointHitRadius: 10,';
                    echo 'data: [';
                        //echo '<?php';
                    $grafico1x->gerarDadosMediaGraficoComparado(2, $id, $grafico1x->sensorSelecionadoGraficoPCD(2, $_GET['SensorPCD']), $grafico1x->sensorSelecionadoGraficoPCD($id, $_GET['SensorPCD']), $datainicial, $dataFinal);
                    echo ']';
                    echo '}';
                    echo ']';
                    echo '},';                   
                    echo 'options: {';
                    echo 'responsive: true,';
                    echo 'title: {';
                    echo 'display: true,';
                    echo '},';
                    echo 'hover: {';
                    echo 'mode: "dataset"';
                    echo '},';
                    echo 'scales: {';
                    echo 'xAxes: [{';
                    echo 'display: true,';
                    echo 'scaleLabel: {';
                    echo 'show: true,';
                    echo 'labelString: "Hora"';
                    echo '}';
                    echo '}],';
                    echo 'yAxes: [{';
                    echo 'display: true,';
                    echo 'scaleLabel: {';
                    echo 'show: true,';
                    echo 'labelString: "Valor"';
                    echo '},';
                    echo 'ticks: {';
                    echo 'suggestedMin: 0,';
                    echo 'suggestedMax: 50,';
                    echo '}';
                    echo '}]';
                    echo '}';
                    echo '}';
                    echo '};';
                    echo 'window.onload = function () {';
                    echo 'var ctx = document.getElementById("GraficoLine").getContext("2d");';
                    echo 'window.myLine = new Chart(ctx, config);';
                    echo '};';


                    echo '</script>';
                    echo '</div>';
                } else {

                    echo '<h4>Sensor da PCD não Selecionado!</h4>';
                }
                ?>

                    <!--                    <div class="box-chart" style="width: 100%;">
                    
                    <h4>Temperatura do Ar - Gráfico Linear</h4>
                    <canvas id="GraficoLine" style="width:100%"></canvas>
                    
                    <script type="text/javascript">
                        var config = {
                            type: 'line',
                            data: {
                                labels: ["1h", "6h", "12h", "18h", "24h"],
                                datasets: [
                                {
                                    label: "PCD 1",
                                    fill: true,
                                    lineTension: 0.1,
                                    backgroundColor: "rgba(151,187,205,0.2)",
                                    borderColor: "rgba(45, 159, 193, 0.6)",
                                    borderDash: [],
                                    borderDashOffset: 0.0,
                                    borderJoinStyle: 'miter',
                                    pointBorderColor: "rgba(45, 159, 193, 0.6)",
                                    pointColor: "45, 159, 193, 0.6)",
                                    pointBackgroundColor: "#fff",
                                    pointBorderWidth: 1,
                                    pointHoverRadius: 5,
                                    pointHoverBackgroundColor: "rgba(58, 72, 87, 1)",
                                    pointHoverBorderColor: "rgba(58, 72, 87, 1)",
                                    pointHoverBorderWidth: 2,
                                    pointRadius: 5,
                                    pointHitRadius: 10,
                                    data: [
                                    <?php
//$pcds->gerarDadosGraficoLinear(1, 1);
                                    ?>
                                    ]
                                },
                                ]
                            },
                            options: {
                                responsive: true,
                                title: {
                                    display: true,
                                },
                                hover: {
                                    mode: 'dataset'
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            show: true,
                                            labelString: 'Hora'
                                        }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            show: true,
                                            labelString: 'Valor'
                                        },
                                        ticks: {
                                            suggestedMin: 0,
                                            suggestedMax: 50,
                                        }
                                    }]
                                }
                            }
                        };
                        window.onload = function () {
                            var ctx = document.getElementById("GraficoLine").getContext("2d");
                            window.myLine = new Chart(ctx, config);
                        };


                    </script>
                </div>-->

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
    <script src="../../js/plugin/formValidation.min.js"></script>
    <script src="../../js/plugin/formValidation-bootstrap.min.js"></script>
    <script src="../../js/custom/mod04/validationNovoGraficoLinha.js" type="text/javascript"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../../js/custom/mod04/classie.js"></script>
    <script src="../../js/custom/mod04/cbpAnimatedHeader.js"></script>
    <script src="../../js/custom/mod04/jquery.maskedinput.js" type="text/javascript"></script>

    <!-- Contact Form JavaScript -->
    <script src="../../js/custom/mod04/jqBootstrapValidation.js"></script>
    <script src="../../js/custom/mod04/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/plugin/freelancer.js"></script>        

</body>

</html>