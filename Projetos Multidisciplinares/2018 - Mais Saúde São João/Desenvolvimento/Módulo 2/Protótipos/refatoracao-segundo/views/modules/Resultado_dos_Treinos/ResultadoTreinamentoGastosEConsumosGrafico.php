<html lang="pt-br" class=" js "><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
        <!--- basic page needs
  ================================================== -->
        <meta charset="utf-8">
        <title>Mais Saúde São João</title>

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
   ================================================== -->
        <link rel="stylesheet" href="css/base.css">  
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vendor.css">     

        <!-- script
        ================================================== -->
        <script src="js/modernizr.js"></script>

        <!-- favicons
             ================================================== -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="icon" type="image.png" href="favicon.png">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Calorias consumidas (em Cal)', 'Calorias gastas (em Cal)'],
          ['03/04/2018',  500,      600],
          ['05/04/2018',  500,      1200],
          ['08/04/2018',  750,       1120],
          ['18/04/2018',  900,      1500]
        ]);

        var options = {
          title: 'Gastos calóricos vs. Consumos calóricos',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/loader.js"></script>
    <link id="load-css-0" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/45.2/css/core/tooltip.css"><link id="load-css-1" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/45.2/css/util/util.css"><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/js/jsapi_compiled_format_module.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/js/jsapi_compiled_default_module.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/js/jsapi_compiled_ui_module.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/js/jsapi_compiled_corechart_module.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/js/jsapi_compiled_fw_module.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/third_party/dygraphs/dygraph-tickers-combined.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/third_party/webfontloader/webfont.js"></script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/js/jsapi_compiled_line_module.js"></script></head>
    <body style="background-color:white">
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li><a class="smoothscroll" href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll" href="lista.php" title="">Lista de Usuários</a></li> 	
                        <div class="dropdown">
                                <li class="current"><a href ="#" class="main-navigation smoothscroll" title="">Treinamentos</a></li>
                                <div class="dropdown-content">
                                    <a href="ResultadoTreinamentoHistorico.php">Meu histórico</a>
                                    <a href="ResultadoTreinamentoVincular.php">Treinamentos prontos</a>
                                    <a href="ResultadoTreinamentoHistoricoProgramas.php">Meus programas de treinamento</a>
                                    <a href="ResultadoTreinamentoDesempenho.php">Desempenho</a>
                                    <a href="ResultadoTreinamentoCaloricos.php">Gastos calóricos</a>
                                    <a href="ResultadoTreinamentoGastosEConsumos.php">Consumos calóricos vs Gastos calóricos</a>
                                    <a href="ResultadoTreinamentoDobras.php">Dobras cutâneas</a>
                                    <a href="ResultadoTreinamentoGordura.php">Taxa de gordura</a>
                                    <a href="ResultadoTreinamentoMedidas.php">Medidas corporais</a>
                                </div>
                            </div> 
                        <li><a href="#" title="">Rede Social</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>

        <!--Corpo do texto ---> 
        <div class="container" role="main" style="height: 100%;width: 100%; padding:5%">

            <div class="page-header">
                <h1 style="color:#104999">Gastos calóricos vs. Consumos calóricos
                    </h1>
            </div>


            <h1> 
                <form class="form">
                        <div class="form-group">
                            <label for="dataini">Data de início:</label>
                            <input type="date" class="form-control" id="dataini" placeholder="dd/mm/aaaa" name="data">
                        </div>
                        <div class="form-group">
                            <label for="datafim">Data de término:</label>
                            <input type="date" class="form-control" id="datafim" placeholder="dd/mm/aaaa" name="data">
                        </div> 
                </form>
                <a href="ResultadoTreinamentoGastosEConsumosTabela.php"><button>Visualizar Tabela</button></a>
                <div id="curve_chart" style="width: 100%; height: 400px"></div>
            </h1>
        </div>







        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


                    <script>
                $(document).ready(function () {
                    $('#myModal').modal('show');
                });
            </script>
        



        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir sua conta?</h4>
                    </div>
                    <div style="font-family: Verdana" class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-danger">Sim, desejo excluir!</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 1  -->
        
    <!-- footer
        ================================================== -->
        <footer>

            <div class="footer-main">

                <div class="row">  

                    <div class="col-four tab-full mob-full footer-info">            





                    </div> <!-- /footer-info -->

                    <div class="col-two tab-1-3 mob-1-2 site-links">

                        <h4>Links do site</h4>

                        <ul>
                            <li><a href="#">Sobre nós</a></li>
                            <li><a href="#">Pagina 1</a></li>
                            <li><a href="#">Página 2</a></li>
                            <li><a href="#">Página 3</a></li>
                        </ul>

                    </div> <!-- /site-links -->  

                    <div class="col-two tab-1-3 mob-1-2 social-links">

                        <h4>Redes Sociais</h4>

                        <ul>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Google+</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>

                    </div> <!-- /social --> 

                    <div class="col-four tab-1-3 mob-full footer-subscribe">

                        <h4>Receba notificações!</h4>

                        <p>Informe o seu email abaixo e o manteremos informados sobre todas as novidades do site!</p>

                        <div class="subscribe-form">

                            <form id="mc-form" class="group" novalidate="true">

                                <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Informe seu email e aperte enter!" required=""> 

                                <input type="submit" name="subscribe">

                                <label for="mc-email" class="subscribe-message"></label>

                            </form>

                        </div>	      		

                    </div> <!-- /subscribe -->         

                </div> <!-- /row -->

            <!-- /footer-main -->


            <div class="footer-bottom">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018.</span> 
                            <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo Campus São João da Boa Vista</a></span>		         	
                        </div>

                        <div id="go-top" style="display: block;">
                            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                        </div>         
                    </div>

                </div> <!-- /footer-bottom -->     	

            </div>
</div> 
        </footer>  
    
</body></html>