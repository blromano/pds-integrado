<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pesquisar Educador Físico</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
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
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 
                        <li class="current"><a class="smoothscroll"  href="PesquisarEducador.php" title="">Pesquisar Educador</a></li>
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>
            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
<div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >
            <br/>
            <br/>
<div class="tabcontent p-md-4">
    <h3>Pesquisar Educador Físico</h3> 
<form action="solicitareducador.php" method="post" class="container my-4">
    <div class="row form-group">
      <div class="col">
        <h4>Nome</h4>
        <input class="form-control" type="text" name="nomeeducador" style="height: 30%; font-size: 12px;">
      </div>
      <div class="col">
       <h4>Faixa Etária</h4>
        <select id="options" onchange="optionCheck()" name="filto_dois" class="form-control" style="height: 30%;font-size: 12px;">
            <option value="1">Indiferente</option>
            <option value="2">20-30</option>
            <option value="3">30-40</option>
            <option value="4">40-50</option>
            <option value="5">Acima de 50 Anos</option>
        </select>
      </div>
    </div>
    
    <div class="row form-group">
      <div class="col">
        <h4>Foco</h4>
        <select id="options" onchange="optionCheck()" name="filto_tres" class="form-control" style="height: 30%;font-size: 12px;">
                    <option value="1">Geral</option>
                    <option value="2">Ganho de massa muscular</option>
                    <option value="3">Condicionamento Físico</option>
                    <option value="4">Bem Estar</option>
                    <option value="5">Emagrecimento</option>
        </select>
      </div>
      <div class="col">
        <h4>Gênero</h4>   
        <select id="options" name="filto_um" class="form-control" style="height: 30%;font-size: 12px;">
            <option value="1">Indiferente</option>
            <option value="2">Feminino</option>
            <option value="3">Masculino</option>
            <option value="4">Não Especificado</option>
        </select>
      </div>
    </div>
        <input type="submit" value="Pesquisar">
    </form>
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



