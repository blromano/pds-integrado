<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Marcar Consulta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">     
    <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>
        
        <section onclick="closeNav()">
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
<div class="container corpovisualizarperfil" role="main" >
            <br/>
            <br/>
<div class="tabcontent p-md-4">
    <h3>Pesquisar Educador Físico</h3> 
<form action="solicitareducador.php" method="post" class="container my-4">
    <div class="row form-group">
      <div class="col">
        <h4>Nome</h4>
        <input class="form-control inputformperfileducador" type="text" name="nomeeducador">
      </div>
      <div class="col">
       <h4>Faixa Etária</h4>
        <select id="options" onchange="optionCheck()" name="filto_dois" class="form-control inputformperfileducador">
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
        <select id="options" onchange="optionCheck()" name="filto_tres" class="form-control inputformperfileducador">
                    <option value="1">Geral</option>
                    <option value="2">Ganho de massa muscular</option>
                    <option value="3">Condicionamento Físico</option>
                    <option value="4">Bem Estar</option>
                    <option value="5">Emagrecimento</option>
        </select>
      </div>
      <div class="col">
        <h4>Gênero</h4>   
        <select id="options" name="filto_um" class="form-control inputformperfileducador">
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

            <div class="footer-main footerperfileducador">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018. | <br></span> 
                            <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo Campus São João da Boa Vista</a></span>                 
                        </div>

                        <div id="go-top" class="footerbaixoperfileducador">
                            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                        </div>         
                    </div>

                </div> <!-- /footer-bottom -->      

            </div>
</div> 
        </footer>  
        </section>
    </body>
</html>




