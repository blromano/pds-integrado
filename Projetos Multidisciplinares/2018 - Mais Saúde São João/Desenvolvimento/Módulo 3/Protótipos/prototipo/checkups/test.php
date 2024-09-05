<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="icon" type="../image/png" href="favicon.png">
        <link href="../css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--- basic page needs
  ================================================== -->
        <meta charset="utf-8">
        <title>Mais Saúde São João</title>

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
   ================================================== -->
        <link rel="stylesheet" href="../css/base.css">  
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/vendor.css">     

        <!-- script
        ================================================== -->
        <script src="../js/modernizr.js"></script>

        <!-- favicons
             ================================================== -->
        <link rel="icon" type="image.png" href="../favicon.png">

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
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>

        
        <div class="container" role="main" style="width: 100%; padding:5%">

            <div class="page-header">
                <h1 style='color:#104999'> Checkups </h1>
            </div>

            <div class="container-fluid" style="border: 1px solid lightgray; border-radius: 20px; padding: 0.3em">
                <h1 class="text-center"> Índice de Massa Corpórea </h1>
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="sexo">Informe seu sexo</label>
                            <div class="form-group" id="sexo">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Masculino
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Feminino
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="peso">Insira seu peso</labe>
                                <input type="number" class="form-control" name="peso" id="peso">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="peso">Insira sua altura</labe>
                                <input type="number" class="form-control" name="peso" id="peso">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center" style="border:1px solid lightgray;  border-radius: 20px; padding: 0.3em"> 
                            IMC: 25
                            <span style="margin-left: 1em; color: #1BC617; border: 1px solid #1BC617; border-radius: 20px; padding: 0.2em">Saudável</span></h1>
                            <input type="submit" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <div class="container-fluid" style="border: 1px solid lightgray; border-radius: 20px; padding: 0.3em">
                <h1 class="text-center"> Taxa de Gordura </h1>
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="sexo">Informe seu sexo</label>
                            <div class="form-group" id="sexo">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Masculino
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Feminino
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="imc">Insira seu IMC</labe>
                                <input type="number" class="form-control" name="imc" id="imc">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="idade">Insira sua idade</labe>
                                <input type="number" class="form-control" name="idade" id="idade">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center" style="border:1px solid lightgray;  border-radius: 20px; padding: 0.3em"> Gordura: 18%<span style="margin-left: 1em; color: #1BC617; border: 1px solid #1BC617; border-radius: 20px; padding: 0.2em">Saudável</span></h1>
                            <input type="submit" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <div class="container-fluid" style="border: 1px solid lightgray; border-radius: 20px; padding: 0.3em">
                <h1 class="text-center"> Teste de Vista </h1>
                <form>
                    <div class="row">
                        <div class="col-md-3" >
                            <img src="./ishihara1.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                Que numero? kkkkkkkkk
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="./ishihara2.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                aff, se ta é me trollando
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-3" >
                            <img src="./ishihara3.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                To vendo umas bolinha ai man
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="./ishihara4.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                Namoral que era pra isso ser um numero?
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6" >
                            <img src="./miohiper.jpg" alt="teste daltonismo 1" width="512" height="256">
                        </div>
                        <div class="col-md-6">
                            <h3> Instruções </h3>
                            <p>
                                Faça o teste sem óculos. Fique a 2 metros de distância do monitor. Feche um dos olhos com a mão e com o olho aberto veja se as letras parecem mais pretas na metade vermelha ou na metade verde. Caso você veja melhor as letras na parte vermelha provavelmente tem miopia. Se for na parte verde provavelmente você apresenta hipermetropia. Se for parecido, ou você não tem grau ou o grau é bem pequeno. Agora teste o outro olho da mesma forma.
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center" style="border-top: 1px solid lightgray; margin-top: 5px">
                            <input type="radio" name="miohiper"> Enxergo melhor no fundo vermelho
                            <input type="radio" name="miohiper"> Enxergo melhor no fundo verde
                        </div>
                    </div>

                    <div class="row">
                        <h1 class="text-center" style="border:1px solid lightgray;  border-radius: 20px; padding: 0.3em"> Os testes não detectaram imperfeições <span style="margin-left: 1em; color: #1BC617; border: 1px solid #1BC617; border-radius: 20px; padding: 0.2em">Saudável</span></h1>
                        <input type="submit" value="Enviar">
                    </div>
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
        <!-- Modal 1  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title" id="myModalLabel"> Seja bem vindo!</h1>
                    </div>
                    <div class="modal-body">
                        <?php
                        if ($_POST["login_usuario"] == 1) {

                            echo "<h2 style='color:#104999'>Usuário</h3>";
                        }

                        if ($_POST["login_usuario"] == 2) {

                            echo "<h2 style='color:#104999'>Nuticionista</h2>";
                        }

                        if ($_POST["login_usuario"] == 3) {

                            echo "<h2 style='color:#104999'>Educador Físico </h2>";
                        }
                        ?>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    
        
        <footer>

            <div class="footer-main">

                <div class="row">  

                    <div class="col-four tab-full mob-full footer-info">            





                    </div> 

                    <div class="col-two tab-1-3 mob-1-2 site-links">

                        <h4>Links do site</h4>

                        <ul>
                            <li><a href="#">Sobre nós</a></li>
                            <li><a href="#">Pagina 1</a></li>
                            <li><a href="#">Página 2</a></li>
                            <li><a href="#">Página 3</a></li>
                        </ul>

                    </div> 

                    <div class="col-two tab-1-3 mob-1-2 social-links">

                        <h4>Redes Sociais</h4>

                        <ul>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Google+</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>

                    </div> 

                    <div class="col-four tab-1-3 mob-full footer-subscribe">

                        <h4>Receba notificações!</h4>

                        <p>Informe o seu email abaixo e o manteremos informados sobre todas as novidades do site!</p>

                        <div class="subscribe-form">

                            <form id="mc-form" class="group" novalidate="true">

                                <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Informe seu email e aperte enter!" required=""> 

                                <input type="submit" name="subscribe" >

                                <label for="mc-email" class="subscribe-message"></label>

                            </form>

                        </div>	      		

                    </div>

                </div>

            


            <div class="footer-bottom">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018.</span> 
                            <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo Campus São João da Boa Vista</a></span>		         	
                        </div>

                        <div id="go-top" style="display: block;">
                            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                        </div>         
                    </div>

                </div> 

            </div>
</div> 
        </footer> 

    </body>
</html>



