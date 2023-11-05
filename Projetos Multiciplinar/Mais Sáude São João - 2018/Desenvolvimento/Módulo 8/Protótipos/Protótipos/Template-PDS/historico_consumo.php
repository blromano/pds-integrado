<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diário de Bordo</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        <link href="css/bootstrap-datepicker3.standalone.css" rel="stylesheet" type="text/css"/>

        <!-- script
        ================================================== -->
        <script src="js/modernizr.js"></script>


        <!-- favicons
             ================================================== -->
        <link rel="icon" type="image.png" href="favicon.png">

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
                    <h1 style='color:#104999'>Histórico de Consumo de Calorias e Nutrientes</h1>
                </div>
                <form class="form-inline" action="historico_consumo.php">
                    <div class="form-group">
                        <label for="email">Data inicial:</label>
                        <div class="input-group date" data-provide="datepicker" id="datai">
                            <input type="text" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="width: 20px">
                    </div> 
                    <div class="form-group">
                        <label for="email">Data final:</label>
                        <div class="input-group date" data-provide="datepicker" id="dataf">
                            <input type="text" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="width: 20px">
                    </div> 
                    <div class="form-group">
                        <br>
                        <div class="input-group date" data-provide="datepicker" id="dataf">
                            <button type="submit" class="btn btn-default">Enviar</button>  
                        </div>
                    </div>           
                </form>
                <div class="page-header"> 
                </div>
                <div>
                    <h2 style='color:#002a80'>Histórico de Consumo de Calorias</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive table-striped" >
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Quantidade Total (kcal)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20/12/2017</td>
                                <td>2000</td>
                            </tr>
                            <tr>
                                <td>09/03/2018</td>
                                <td>3000</td>
                            </tr>
                            <tr>
                                <td>24/03/2018</td>
                                <td>1500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="page-header"> 
                </div>
                <div>
                    <h2 style='color:#002a80'>Histórico de Consumo de Nutrientes</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive table-striped" >
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo Nutriente</th>
                                <th scope="col">Quantidade do Nutriente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20/12/2017</td>
                                <td>Gordura Trans</td>
                                <td>35%</td>
                            </tr>
                            <tr>
                                <td>09/03/2018</td>
                                <td>Proteína</td>
                                <td>45%</td>
                            </tr>
                            <tr>
                                <td>09/03/2018</td>
                                <td>Carboidrato</td>
                                <td>65%</td>
                            </tr>
                            <tr>
                                <td>24/03/2018</td>
                                <td>Carboidrato</td>
                                <td>20%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="width: 100%;height: 50%;text-align:end;clear:both">
                    <a href="relatorio_dado_historico.php"><button type="button" class="btn btn-info">Voltar</button></a>
                </div>
            </div>


            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>

            <script type="text/javascript">
                $('#datai').datepicker({
                    format: 'mm/dd/yyyy',
                    language: "pt-BR",
                });
                $('#dataf').datepicker({
                    format: 'mm/dd/yyyy',
                    language: "pt-BR",
                });
            </script>
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



