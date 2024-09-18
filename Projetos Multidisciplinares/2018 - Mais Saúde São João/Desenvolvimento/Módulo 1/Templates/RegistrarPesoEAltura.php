<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
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
                        <li class="current"><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="RegistrarPesoEAltura.php" title="">Registrar peso e altura</a></li>
                       
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight " data-toggle="modal" data-target="#myModal3"><a href="#" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
        <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >

        
     
            <br><br>

        <h2>Registrar peso e altura</h2>
        <br><br>
            
            <div class="row">
               <div class="form-group">
      <label for="usr" text-align="left">Peso:</label>
      <input type="number" class="form-control" id="usr" style="width: 400px">
    </div>
                <div class="form-group">
      <label for="usr">Altura:</label>
      <input type="number" class="form-control" id="usr" style="width: 400px">
    </div>
              <button type="button" class="btn btn-success">Salvar</button>
              <button type="button" class="btn btn-danger">Sair</button>
                
                
            </div> <!-- /flex-container -->

  

  
  
            
        </div>







        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir sua conta?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-danger">Sim, desejo excluir!</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
         <!-- Modal 3-->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Deseja mesmo sair? </h4>
                    </div>
                    <div style="font-family: Verdana;text-align:center"class="modal-footer">
                        <a href="index.php"><button type="button" style="width: 150px"class="btn btn-danger">Sim</button>

                        </a> 
                        <button type="button" style="width: 150px" class="btn btn-success" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        <!-- Modal 1  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title" id="myModalLabel"> Seja bem vindo!</h1>
                    </div>
                    <div class="modal-body">
                       
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
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



