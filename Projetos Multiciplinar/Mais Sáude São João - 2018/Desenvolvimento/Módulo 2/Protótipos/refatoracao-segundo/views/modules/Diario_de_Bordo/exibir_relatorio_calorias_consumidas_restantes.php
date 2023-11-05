<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="hover.css">
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
        <link href="mod08.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
        </script>      
    </head>
    <body>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  //montando o array com os dados
        var data = google.visualization.arrayToDataTable([
          ['Hora', 'Calorias Consumidas','Calorias Restantes'],
          ['6:00',  0, 2000],
          ['9:00',  300, 1700],
          ['12:00',  700, 1300],
          ['15:00',  1200, 800],
          ['21:00',  1350, 650],
          ['18:00',  1500, 500]
        ]);
		
		//opções para o gráfico linhas
		var options1 = {
          title: 'Calorias',
		  hAxis: {title: 'Hora',  titleTextStyle: {color: 'red'}}//legenda na horizontal
        };
		//instanciando e desenhando o gráfico linhas
        var linhas = new google.visualization.LineChart(document.getElementById('linhas'));
        linhas.draw(data, options1);
		
      }
    </script>    
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-collapse w-100 ">

            </div>
            <div class="mx-auto order-0 navbar-collapse w-100 col-md-4">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <span><a class="nav-link" >Rede Social</a></span>
                    </li>
                    <li class="nav-item">
                        <span><a class="nav-link "onclick="openNav()">Treinamento</a></span>
                    </li>
                    <li class="nav-item">
                        <span><a class="nav-link nav-item active border-bottom border-danger" onclick="openNav2()">Nutrição - Diário de Bordo</a></span>
                    </li>

                </ul>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png" style="width: 40px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="#">perfil</a>
                            <div class="dropdown-divider"></div>
                            <a   class="dropdown-item btn-danger"  href="#">Sair</a>

                        </div>
                    </li>

                </ul>

            </div>
        </nav>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
        <div id="mySidenav2" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
            <a href="#">AAA</a>
            <a href="#">AAA</a>
            <a href="#">AAAA</a>
            <a href="#">Contact</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="container text-center p-5">
                    <div class="atualizar_diario">
                        <a href="calcular_peso_ideal_imc.php"><button class="btn btn-primary botao"> Calcular Peso Ideal e IMC</button></a>
                        <a href="atualizar_peso_altura.php"><button class="btn btn-primary botao"> Atualizar Peso e Altura</button></a>
                        <a href="gerir_alimentos_favoritos.php"><button class="btn btn-primary botao"> Visualizar Alimentos Favoritos</button></a>
                        <a href="#"><button class="btn btn-primary  botao"> Relatórios Diários</button></a>
                        <a href="#"><button class="btn btn-primary botao"> Relatórios de Dados Históricos</button></a>

                        <hr>
                        <div class="page-header esquerda">
                            <h1 class="total_refeicao">Relatório de Calorias Consumidas e Calorias Restantes</h1>
                        </div>
                        <div class="container">
                            <h2>Gráfico de Calorias Consumidas e Calorias Restantes</h2>
                            
                            <div id="linhas"></div>
                            <br>
                            <h2>Tabela Calorias Consumidas e Calorias Restantes</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Calorias Consumidas</th>
                                        <th>Colorias Restantes</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0 kcal</td>
                                        <td>2000 kcal</td>
                                        <td>6:00</td>
                                    </tr>
                                    <tr>
                                        <td>300 kcal</td>
                                        <td>1700 kcal</td>
                                        <td>9:00</td>
                                    </tr>
                                    <tr>
                                        <td>400 kcal</td>
                                        <td>1300 kcal</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>500 kcal</td>
                                        <td>800 kcal</td>
                                        <td>15:00</td>
                                    </tr>
                                    <tr>
                                        <td>150 kcal</td>
                                        <td>650 kcal</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>150 kcal</td>
                                        <td>500 kcal</td>
                                        <td>21:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

        <div class='bg-darker py-2 text-center text-light container-fluid text-sm'>
            <div class="row">
                <div class="container mx-auto">
                    <small>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</small>
                    <br>
                    <small>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></small>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        
    
    </body>
</html>