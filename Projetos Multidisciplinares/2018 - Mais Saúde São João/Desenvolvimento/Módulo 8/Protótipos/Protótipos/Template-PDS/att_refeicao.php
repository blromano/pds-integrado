<!DOCTYPE html>
<?php
$txt = $_GET["txt"];
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualizar <?php echo $txt; ?></title>
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

    </head>
    <body style="background-color:white">
        <script>
            function optionCheck() {
                var option = document.getElementById("alimentos_cadastrados").value;
                if (option == 'selecionar') {
                    alert("Selecione uma opção");
                }
                if (option == 'outro') {
                    location.href = "add_novo_alimento.php";
                }
            }
        </script>
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
                    <h1 style='color:#104999'>Atualizar <?php echo $txt; ?>
                        <?php
                        date_default_timezone_set('America/Sao_Paulo');
                        echo "<br>  Hora: " . date('H:i') . '<br />';
                        ?>
                    </h1>
                </div>
                <div class="form-group">
                    <select id="alimentos_cadastrados"  onchange="optionCheck()">
                        <option value="selecionar">-- Selecione Alimento --</option>
                        <option value="maca">Maça (30g = 200 kcal)</option>
                        <option value="chocolate">Chocolate (1100 kcal)</option>
                        <option value="macarrao">Macarrão (3100 kcal)</option>
                        <option value="lasanha">Lasanha (3400 kcal)</option>
                        <option value="arroz">Arroz (2000 kcal)</option>
                        <option value="outro">Adicionar Novo Alimento</option>
                    </select>
                    <select id="qtd_alimentos"  onchange="optionCheck()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <select id="qtd_alimentos"  onchange="optionCheck()">
                        <option value="1">1/4</option>
                        <option value="2">1/2</option>
                        <option value="3">3/4</option>
                    </select>
                    
                    <a href="#" data-toggle="modal" data-target="#myModal4">
                        <img src="images/icone mais novo.png" alt="Mais Informações"/>
                    </a>
                    
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome do Alimento</th>
                                <th scope="col">Total de Porções</th>
                                <th scope="col">Total de Calorias </th>
                            </tr>
                        </thead>
                        <tbody>
                        <th scope="row">1</th>
                        <td><a href="#" data-toggle="modal" data-target="#myModal2"><span style="color: red">X</span></a> Maça</td>
                        <td>2</td>
                        <td>200</td>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="#" data-toggle="modal" data-target="#myModal2"><span style="color: red">X</span></a> Chocolate</td>
                            <td>1</td>
                            <td>1100</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="#" data-toggle="modal" data-target="#myModal2"><span style="color: red">X</span></a> Arroz</td>
                            <td>1</td>
                            <td>2000</td>
                        </tr>
                        <tr>
                            <th scope="row">Total por Refeição</th>
                            <td  colspan="2"> </td>
                            <td>3300</td>
                        </tr>

                        </tbody>
                    </table>
                    <div style="width: 100%;height: 50%;text-align:center;clear:both">
                        <a href="#" data-toggle="modal" data-target="#myModal1"><button type="submit" class="btn btn-primary">Confirmar</button></a>
                    </div>
                </div>  

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
        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir o alimento?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="#"><button type="button" class="btn btn-danger">Sim, desejo excluir!</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 1-->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja enviar a refeição?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="diario_bordo.php"><button type="button" class="btn btn-success">Sim, desejo enviar!</button>

                        </a> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
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

