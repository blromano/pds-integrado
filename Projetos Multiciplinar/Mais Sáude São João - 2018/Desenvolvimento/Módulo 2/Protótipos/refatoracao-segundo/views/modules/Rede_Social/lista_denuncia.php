<?php 
        require_once "Denunciados.php";
       
?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
                <link rel="icon" type="imagem/png" href="assets/images/icone_preto.png"/>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
        <link rel="stylesheet" href="<?=$_ROOT_PATH?>/styles/scss/rede_social.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
        <title>+ Saúde São João - Rede Social</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
                <div class="container-fluid">
                                        <img style="padding-left:50px;" class="position-absolute h-75 d-inline-block" src="assets/images/logo-texto.png" alt="logo_texto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ml-auto active-hover">
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Rede_Social"> Rede Social </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Treinos"> Treinamento </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Plano_Alimentar"> Nutrição </a>
                            </li>
                            <li class="nav-item clearfix border mx-2"></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?=$_ROOT_PATH?>/assets/images/rede_social/perfil/1.jpg" class="w3-circle" style="width: 2rem">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="./view.php?mod=Usuarios">perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btn-danger"  href="#">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <!-- Page Container -->
                        <div class="w3-container w3-content" style="max-width:1400px">    
                                <!-- The Grid -->
                                <div class="w3-row">
                                     
		
        <div class="container-fluid"> 
				 <?php
				 date_default_timezone_set('America/Sao_Paulo');
        if (isset($_POST["pub_texto"]))
        {
				 
				 $texto = $_POST['pub_texto'];
				 echo $texto;
				 
		}
                                                        $den = new Denunciados();
                                                    
                                                        foreach($den->inner() as $publication)
                                                        {										
                                                                echo'
                                                                <table style="color:black;" class="table-striped table-bordered">
																<tr>
																<tr>
																					<th><center>#</center></th>
																					<th><center>Nome do Usuário denunciado</center></th>
																					<th><center>Nome de quem realizou a denúncia</center></th>
																					<th><center>Mensagem denunciada</center></th>
																					<th><center>Motivo</center></th>
																					<th><center>Ação</center></th>
																				</tr>
																<tr>
                                                                     <th>  '.$publication['DEN_CODIGO'].'</th>
                                                                     <th>  '.$publication['NOME_DENUNCIOU'].'</th>
																	  <th>  '.$publication['NOME_DENUNCIADO'].'</th>
																	   <th>  fgfd</th>
																	    <th>  '.$publication['DEN_CODIGO'].'</th>
																		<th><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#banModal">Banir</button> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#excModal">Excluir</button></center></th>

                                                                        <br>									
                                                                </tr>    
                                                                       </table> ';
                                                                       
																		
																		
																		
															
														} 
														
														
														?>


								</div>
								</div>
								</div>


   




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



