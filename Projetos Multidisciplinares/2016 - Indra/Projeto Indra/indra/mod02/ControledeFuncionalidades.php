<?php
    include "..\..\dao\mod02\pcdDAO.php";

    $PcdDao = new pcdDAO();
    $value  = $PcdDao->Listar_Funcionamento();
	
	require_once '../../modelo/mod01/Usuario.php';
	require_once '../../modelo/mod01/UsuarioLogin.php';


	session_start();

	if(!isset($_SESSION['user'])){
		session_destroy();
		header('location:../mod01/index1.php');
		} else{
		if($_SESSION['user']->getNivelAcesso() != 4) {
		   
		   switch ($_SESSION['user']->getNivelAcesso()) {
		  
			case 2:
				header('Location: ../mod01/indexNivel3.php');
				break;
			case 3:
				header('Location: ../mod01/indexNivel3.php');
				break;
			case 4:
				header('Location: ../mod01/indexNivel4.php');
				break;      
			default:
				unset($_SESSION['user']); 
				session_destroy();
				header('location:../mod01/index1.php'); 
				break;
			}

		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Projeto Indra - Orgãos e Colaboradores</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../../css/plugin/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../css/plugin/freelancer.css" rel="stylesheet">

        <!-- Data Tables CSS -->
        <link href="../../css/plugin/dataTables.bootstrap.css" rel="stylesheet">
        

        <!-- Custom Fonts -->
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="../../css/custom/mod02/style.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/plugin/buttons.dataTables.css" rel="stylesheet" type="text/css"/>

		<style media="screen" type="text/css">
    		#lista-pcd{
				max-width: 10px;
      	 		white-space: nowrap;
				text-overflow: ellipsis;
    		 }
    	</style>


    </head>

    <body id="page-top" class="index">

        <div id="background-modal" class="elemento-escondido"></div>

        

		<!--MODAL certeza-cancelar-->
            <div class="modal fade" id="certeza-cancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <label>Você realmente deseja cancelar?</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="cancelar-controlefunc" data-dismiss="modal">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#controle-defuncionalidade-modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>

			<!--MODAL CONTROLE DE FUNCIONALIDADE-->
            <div class="modal fade" id="controle-defuncionalidade-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <form class="formControleFunc" id="formControleFunc" method="POST" >
      						        <div class="modal-header">
                                      <h3>Alterar Status de funcionamento</h3>
                          </div>
                          <div class="modal-body">
                                <div class="form-group">
    											           <label>Jutificativa</label>
    										                    <div>
    											                      <textarea name="justificativa" id="justificativa" class="form-control" rows="5" cols="35" required="required"></textarea>
    										                    </div>
    										             <div>
    											                  <input type="checkbox" id="valida_alteracao" required="required">Tem certeza que deseja alterar o status da pcd?<br>
    									               </div>
                                     <div>
                           							<input type="hidden" id="input-id-pcd" name="input-id">
                           							<input type="hidden" id="input-status-pcd" name="input-status">
                                     </div>
    									         </div>
                           </div>
                           <div class="modal-footer">
                                <input type="button" id="salvaralteracao" role="button" value="Salvar" class="btn btn-primary form-control" data-dismiss="modal">
    						                <input type="button" role="button" value="Cancelar" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#certeza-cancelar">
                          </div>
			                 </form>
                    </div>
                </div>
            </div>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" id="menu">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="../mod01/index1.php" class="page-scroll icone-menu-container">
                        <img class="img-responsive" src="../../img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="../mod01/index1.php">P&aacute;gina Principal</a>
                        </li>
                        <li id="btn-login">
                            <a href="../../class/mod01/logout.php"> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contact Section -->
        <section id="contact" >
            <div class="container elemento-expandido" ><br><br>
                    <div>
                        <h2>Controle de Funcionalidade</h2><br><br>
                        <table id="lista-status" class="table table-condensed" style="width:100%;">
                            <thead>
                                <tr bgcolor="#3a4857">
                                    <th style="width:30%">ID da PCD</th>
                                    <th style="width:2%">Status</th>

                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach ($value as $value):
							?>
                                <tr>
                                    <td><?php echo $value->getid() ?></td>

								<?php	if($value->getPCD_STATUS_FUNCIONAMENTO() > 0){?>
											<td><button class="btn btn-primary btn-table" teste="0" data-toggle="modal" data-target="#controle-defuncionalidade-modal" value ="<?php echo $value->getid() ?>"> Desativar </button></td>
										<?php
										}

										else{ ?>
                      <td>
                      <button value="<?php echo $value->getid() ?>" class="btn btn-primary btn-table" data-toggle="modal" data-target="#controle-defuncionalidade-modal" >Ativar</button>
											</td>
											<?php } ?>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container ">
                    <div class="row">
                        <div class="footer-col col-md-6">
                            <h3>Local</h3>
                            <p>Instituto Federal de Educação, Ciência e Tecnologia de São Paulo<br>Campus São João da Boa Vista</p>
                        </div>
                        <div class="footer-col col-md-6">
                            <h3>Redes Sociais</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="https://www.facebook.com/ifspsaojoaodaboavista" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll visible-xs visible-sm">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- jQuery -->
        <script src="../../js/plugin/jquery.js"></script>


<script src="../../js/plugin/bootstrap.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
        
       <!-- Plugin JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="../../js/custom/mod02/classie.js"></script>
		<script src="../../js/custom/mod02/cbpAnimatedHeader.js"></script>

		<!-- Contact Form JavaScript -->
		<!--<script src="js/jqBootstrapValidation.js"></script>-->
		<!--<script src="js/contact_me.js"></script>-->

        <!-- Custom Theme JavaScript -->
		<script src="../../js/plugin/freelancer.js"></script>



        <!-- Data Tables Buttons -->
        

        <!-- Data Tables JQuery -->
		<script src="../../js/plugin/jquery.dataTables.min.js"></script>
		<script src="../../js/plugin/dataTables.bootstrap.min.js"></script>
		<script src="../../js/custom/mod02/tables.js"></script>
    
		<script src="../../js/plugin/dataTables.buttons.min.js"></script>
    <script src="../../js/plugin/jquery.mask.min.js"></script>

        <!-- imports específicos da pagina -->
		<script src="../../js/custom/mod02/Listagem funcionalidade.js"></script>

    </body>

</html>
