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
        <script>google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Data');
      data.addColumn('number', 'Centimetros');

      data.addRows([
        ['03/04/2018', 90],   ['05/04/2018', 92], 
        ['08/04/2018', 89],  ['12/04/2018', 95], 
        ['18/04/2018', 95]
      ]);

      var options = {
      curveType: 'function',
        hAxis: {
          title: 'Data'
        },
        vAxis: {
          title: 'Medidas (em cm)'
        }
      };
      

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script><script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/45.2/loader.js"></script>
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
                <h1 style="color:#104999">Medidas corporais
                    </h1>
            </div>


            <h1> 
                <form class="form">
                    <div class="form-group">
                            <label for="sel1">Parte do corpo:</label>
                            <select class="form-control" id="sel1">
                                <option>Escolha uma parte do corpo...</option>
                                <option>Bíceps</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dataini">Data de início:</label>
                            <input type="date" class="form-control" id="dataini" placeholder="dd/mm/aaaa" name="data">
                        </div>
                        <div class="form-group">
                            <label for="datafim">Data de término:</label>
                            <input type="date" class="form-control" id="datafim" placeholder="dd/mm/aaaa" name="data">
                        </div> 
                </form>
                <a href="ResultadoTreinamentoMedidasTabela.php"><button>Visualizar Tabela</button></a>
                  <div id="chart_div"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 1520px; height: 200px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="1520" height="200" aria-label="A chart." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_0"><rect x="138" y="38" width="1244" height="124"></rect></clipPath></defs><rect x="0" y="0" width="1520" height="200" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="1397" y="38" width="108" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="1397" y="38" width="108" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="1433" y="50.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">Minutos</text></g><path d="M1397,45.5L1427,45.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g><rect x="138" y="38" width="1244" height="124" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://localhost/Template-PDS/FichaTreinamentoDesemGraf.php#_ABSTRACT_RENDERER_ID_0)"><g><rect x="138" y="161" width="1244" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="138" y="130" width="1244" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="138" y="100" width="1244" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="138" y="69" width="1244" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="138" y="38" width="1244" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><path d="M262.8,130.75C262.8,130.75,428.53333333333336,153.8125,511.4,146.125C594.2666666666667,138.4375,677.1333333333334,84.625,760,84.625C842.8666666666667,84.625,925.7333333333332,148.6875,1008.6,146.125C1091.4666666666667,143.5625,1257.2,69.25,1257.2,69.25" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="middle" x="262.8" y="177.41666666666666" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">03/04/2018</text></g><g><text text-anchor="middle" x="511.4" y="177.41666666666666" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">05/04/2018</text></g><g><text text-anchor="middle" x="760" y="177.41666666666666" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">08/04/2018</text></g><g><text text-anchor="middle" x="1008.6" y="177.41666666666666" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">12/04/2018</text></g><g><text text-anchor="middle" x="1257.2" y="177.41666666666666" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">18/04/2018</text></g><g><text text-anchor="end" x="123" y="166.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">8</text></g><g><text text-anchor="end" x="123" y="136" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">10</text></g><g><text text-anchor="end" x="123" y="105.25" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">12</text></g><g><text text-anchor="end" x="123" y="74.5" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">14</text></g><g><text text-anchor="end" x="123" y="43.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">16</text></g></g></g><g><g><text text-anchor="middle" x="760" y="195.08333333333331" font-family="Arial" font-size="15" font-style="italic" stroke="none" stroke-width="0" fill="#222222">Data</text><rect x="138" y="182.33333333333331" width="1244" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><text text-anchor="middle" x="59.25" y="100" font-family="Arial" font-size="15" font-style="italic" transform="rotate(-90 59.25 100)" stroke="none" stroke-width="0" fill="#222222">Tempo (em minutos)</text><path d="M46.5,162L46.50000000000001,38L61.50000000000001,38.00000000000001L61.5,162Z" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></path></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Data</th><th>Minutos</th></tr></thead><tbody><tr><td>03/04/2018</td><td>10</td></tr><tr><td>05/04/2018</td><td>9</td></tr><tr><td>08/04/2018</td><td>13</td></tr><tr><td>12/04/2018</td><td>9</td></tr><tr><td>18/04/2018</td><td>14</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 210px; left: 1530px; white-space: nowrap; font-family: Arial; font-size: 15px;">Minutos</div><div></div></div></div>
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