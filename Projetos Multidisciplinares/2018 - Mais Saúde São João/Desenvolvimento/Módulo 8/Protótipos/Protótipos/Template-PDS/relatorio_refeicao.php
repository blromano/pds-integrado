<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Relatório Calorias Consumidas por Refeição</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
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
        <link rel="icon" type="image.png" href="favicon.png">
        
        <!-- JavaScript
             ================================================= -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
        </script>
        
    </head>
    <body style="background-color:white">
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li class="current"><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="att.php" title="">Atualizar</a></li>
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 	
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li><a  href="diario_bordo.php" title="">Diário de Bordo</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
        <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >
            <div class="page-header">
            <h1 style='color:#104999'> Calorias por Refeição</h1>
            </div>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  //montando o array com os dados
        var data = google.visualization.arrayToDataTable([
          ['Nome da Refeição', 'Quantidade de Calorias'],
          ['Café da Manha', 450],
          ['Almoço',  500],
          ['Cafe da Tarde',  300],
          ['Janta',  350],
          ['Cafe da Noite',  150]
        ]);
		//opçoes para o gráfico barras
        var options = {
          title: 'Calorias por Refeição',
          vAxis: {title: 'Refeição',  titleTextStyle: {color: 'red'}}//legenda vertical
        };
		//instanciando e desenhando o gráfico barras
        var barras = new google.visualization.BarChart(document.getElementById('barras'));
        barras.draw(data, options);
		//opções para o gráfico linhas
		var options1 = {
          title: 'Performance',
		  hAxis: {title: 'Anos',  titleTextStyle: {color: 'red'}}//legenda na horizontal
        };
		//instanciando e desenhando o gráfico linhas
        var linhas = new google.visualization.LineChart(document.getElementById('linhas'));
        linhas.draw(data, options1);
		
      }
    </script>
    <h2>Gráfico de Calorias por Refeição</h2>
    <div id="barras" style="width: 900px; height: 500px;"></div>               
    <div class="container">
        <h2>Tabela de Calorias por Refeição</h2>
        <table class="table">
        <thead>
            <tr>
                <th>Refeição</th>
                <th>Quantidade de Calorias</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Café da manha</td>
                <td>450 kcal</td>
            </tr>
            <tr>
                <td>Almoço</td>
                <td>500 kcal</td>
            </tr>
            <tr>
                <td>Café da Tarde</td>
                <td>300 kcal</td>
            </tr>
            <tr>
                <td>Janta</td>
                <td>350 kcal</td>
            </tr>
            <tr>
                <td>Café da Noite</td>
                <td>150 kcal</td>
            </tr>
        </tbody>
        </table>
    </div>    
    <br>
    <a href="Relatorio_Diarios.php"><button class="btn btn-primary" responsive>Voltar</button></a> <br>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


        <?php
        $situacao_usuario = "logado";
        if ($situacao_usuario == "logado") {
            ?>
            <script>
                $(document).ready(function () {
                    $('#myModal').modal('show');
                });
            </script>
        <?php } ?>
        </div>
    <!-- footer
        ================================================== -->
    <footer>

            <div class="footer-main" style="text-align: center; clear: both; ">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018. | <br></span> 
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
    </body>
</html>

