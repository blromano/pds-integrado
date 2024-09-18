<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Relatório de Nutrientes</title>
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
            <h1 style='color:#104999'> Nutrientes</h1>
            </div>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
            <script type="text/javascript">
		//carregando modulo visualization
      google.load("visualization", "1", {packages:["corechart"]});
      
	  //função de monta e desenha o gráfico
      function drawChart() {
	//variavel com armazenamos os dados, um array de array's 
	//no qual a primeira posição são os nomes das colunas
	var data = google.visualization.arrayToDataTable([
          ['Nutrientes', 'Quantidade'],
          ['Ferro',     40],
          ['Gordura',      30],
          ['Carboidrato',  25],
          ['Vitamina', 5],
          
        ]);
		//opções para exibição do gráfico
        var options = {
          		title: 'Nutrientes',//titulo do gráfico
		is3D: true // false para 2d e true para 3d o padrão é false
        };
		//cria novo objeto PeiChart que recebe 
		//como parâmetro uma div onde o gráfico será desenhado
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		//desenha passando os dados e as opções
        chart.draw(data, options);
      }
	//metodo chamado após o carregamento
	 google.setOnLoadCallback(drawChart);
    </script>
    <h2>Gráfico Nutrientes</h2>
    <div id="chart_div" style="margin-left: 200px;width: 840px; height: 600px;float: center" ></div>                
    <div class="container">
        <h2>Tabela Nutrientes</h2>
        <table class="table">
        <thead>
            <tr>
                <th>Nutrientes</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ferro</td>
                <td>40%</td>
            </tr>
            <tr>
                <td>Gordura</td>
                <td>35%</td>
            </tr>
            <tr>
                <td>Carboidrato</td>
                <td>20%</td>
            </tr>
            <tr>
                <td>Vitamina</td>
                <td>5%</td>
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
