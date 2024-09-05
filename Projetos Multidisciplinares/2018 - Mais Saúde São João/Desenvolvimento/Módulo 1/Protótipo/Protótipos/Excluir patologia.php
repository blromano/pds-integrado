<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Area Adm</title>
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
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li class="current"><a class="smoothscroll"  href="#intro" title="">Lista de administradores</a></li>

                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 	

                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight " data-toggle="modal" data-target="#myModal3"><a href="#" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>
        <div class="container-fluid">

            <!--Corpo do texto ---> 
            <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >

                <div class="container theme-showcase col-md-12" role="main">
                    <div class="page-header">
                        <h1>Patologias</h1>
                        <div style="text-align:right">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome das patologias</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ações</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> Diabetes</td>

                                        <td>10/10/2018  10:20:20</td>
                                        <td>

                                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#apagar_Adm">Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#apagar_Adm">Excluir</button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Hipertensão</td>

                                        <td>10/10/2018  10:20:20</td>
                                        <td>

                                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#apagar_Adm">Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#apagar_Adm">Excluir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>

                                        <td>Câncer</td>
                                        <td>10/10/2018  10:20:20</td>
                                        <td>



                                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#apagar_Adm">Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#apagar_Adm">Excluir</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <br><br><br>
                    <h1>Medicações contínuas:</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome da medicação</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ações</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> Insulina</td>

                                        <td>10/10/2018  10:20:20</td>
                                        <td>

                                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#apagar_Adm">Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#apagar_Adm">Excluir</button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Anti-Hipertensivo</td>

                                        <td>10/10/2018  10:20:20</td>
                                        <td>

                                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#apagar_Adm">Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#apagar_Adm">Excluir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>

                                        <td>Quimioterapia</td>
                                        <td>10/10/2018  10:20:20</td>
                                        <td>



                                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#apagar_Adm">Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#apagar_Adm">Excluir</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>



                </div>
            </div>



            <div class="modal fade" id="apagar_Adm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="myModalLabel">Deseja mesmo excluir essa Patologia ou Medicação Contínua</h4>
                        </div>
                        <div style="font-family: Verdana"class="modal-footer">
                            <a href="index.php"><button type="button" class="btn btn-danger">Continuar e Exclui-lo</button>

                            </a> 
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar e Mantê-lo</button>
                        </div>
                    </div>
                </div>
            </div>







            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>


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



