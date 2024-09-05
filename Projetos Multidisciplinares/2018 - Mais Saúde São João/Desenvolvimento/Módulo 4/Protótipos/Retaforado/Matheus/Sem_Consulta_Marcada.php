<!DOCTYPE html>
<html lang="pt-br">
    <head>
          <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
	<script src="bower_components/popper.js/dist/popper.js" charset="utf-8"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
	<script src="scripts/animations.js" charset="utf-8"></script>
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">    
        <link href="Cssmatheus.css" rel="stylesheet" type="text/css"/>
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
                        <li><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="att.php" title="">Atualizar</a></li>
                        <li class="current"><a class="smoothscroll"  href="att.php" title="">Marcar Consulta</a></li>
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 
                        <li><a class="smoothscroll"  href="PesquisarEducador.php" title="">Pesquisar Educador</a></li>
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>
            </div>   	

        </header>
        <div class="container-fixed">

        <!--Corpo do texto ---> 
<div class="container semconsulta" role="main" style="" >
            <br/>
            <br/>
            <div id="quadro" class="col-md-4 col-md-offset-4 quadrosemconsulta">              
                Parece que você não tem uma consulta marcada. 
                
                
            </div>
                  <div class="col-md-1  marcarconsulta">
                    <button class="btn btn-danger marcarconsultabotao">Marcar consulta</button>
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


    <!-- footer
        ================================================== -->
    <footer>

            <div class="footer-main footermarcarconsulta">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018. | <br></span> 
                            <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo Campus São João da Boa Vista</a></span>		         	
                        </div>

                        <div id="go-top footermarcarconsultapartedebaixo">
                            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                        </div>         
                    </div>

                </div> <!-- /footer-bottom -->     	

            </div>
</div> 
        </footer>  
    </body>
</html>



