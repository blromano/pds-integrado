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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                        <li><a class="smoothscroll"  href="../att.php" title="">Atualizar</a></li>
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="../lista.php" title="">Lista de Usuários</a></li> 	
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li class="highlight with-sep"><a href="../index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="../index.php" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
        <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >            
            <div class="page-header">
                <h1 style='color:#104999'><center>Lista de Denunciados</center></h1>
            </div>
			<table style="color:black;" class="table-striped table-bordered">				
				<tr>
					<th><center>#</center></th>
					<th><center>Nome do Usuário</center></th>
					<th><center>Comentário / Post Denunciado</center></th>
					<th><center>Motivo da Denuncia</center></th>
					<th><center>Ação</center></th>
				</tr>
				<tr>
					<td><center>1</td>
					<td><center>Ramon Turati</center></td>
					<td><center>Inscrevam-se no meu canal - Ramon Plays</center></td>
					<td><center>Anuncio de canal do Youtube</center></td>
					<td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#banModal">Banir</button> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#excModal">Excluir</button></center></td>
				</tr>
				<tr>
					<td><center>2</td>
					<td><center>Breno Lisi Grego</center></td>
					<td><center>Festinha muito loka (VIDEOZINHO)</center></td>
					<td><center>Postagem sobre festa</center></td>
					<td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#banModal">Banir</button> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#excModal">Excluir</button></center></td>
				</tr>
				<tr>
					<td><center>3</td>
					<td><center>Maipe Boladão</center></td>
					<td><center>Lu Souza - Eu te amo!</center></td>
					<td><center>Declaração de Amor!</center></td>
					<td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#banModal">Banir</button> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#excModal">Excluir</button></center></td>
				</tr>
			</table>            
			<!-- Modal Banir -->
			<div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document"> 
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><center>Banir Usuário</center></h4>
						</div>
						<div class="modal-body modal-bordered">
							<input type="number" class="form-control" id="InputLastName" placeholder="Informe os Dias">						
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger">Banir</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal Excluir -->
			<div class="modal fade" id="excModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><center>Excluir Denuncia</center></h4>
						</div>
						<div class="modal-body">
							<p>Você realmente deseja excluir essa denuncia?</p>					
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger">Excluir</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
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



