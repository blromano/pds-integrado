<?php
include 'class/pcdDAO.php';

$DAO = new pcdDAO();

$lista = $DAO->Listar();


?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Projeto Indra - Orgãos e Colaboradores</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/freelancer.css" rel="stylesheet">

        <!-- Data Tables CSS -->
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="css/fileinput.min.css" rel="stylesheet" type="text/css" />

        <!-- formVailidatior.io CSS -->
        <link href="css/formValidation.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link href="css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
		
		<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
 
   	


    </head>

    <body id="page-top" class="index">

        <div id="background-modal" class="elemento-escondido"></div>

        <div id="modal-login" class="elemento-escondido">

            <form name="sentMessage" id="form-login" novalidate>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label> Email </label>
                        <input type="email" class="form-control entrada-texto" placeholder="Email" required data-validation-required-message="Por favor, digite seu email.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label> Senha </label>
                        <input type="password" class="form-control entrada-texto" placeholder="Senha" required data-validation-required-message="Por favor, digite uma senha válida.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12" id="cadastrar">
                        <button type="submit" class="btn btn-primary"> Login </button>
                        <div  class="btn btn-danger" id="btn-cancelar"> Cancelar </div>
                    </div>
                </div>
            </form>

        </div>


        <!--MODAL CONFIRMAR-->
            <div class="modal fade" id="confirmar-pcd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" >Cancelar Cadastro</h4>
                        </div>
                        <div class="modal-body">
                            <label>Você realmente deseja cancelar o cadastro?</label>                       
                        </div>
                        <div class="modal-footer">
                        <form >
                            <input type="button"  role="button" value = "Sim" class="btn btn-primary" id="input-sim-confirmar-modal" data-dismiss="modal">
                            <input type="button" role="button" value="Não" class="btn btn-primary"  id="input-nao-confirmar-modal" data-dismiss="modal" data-toggle="modal" >
                        </form> 
                        
                            
                        </div>
                    </div>
                </div>
            </div>
		
		
		
		<!--MODAL CONFIRMAR EDIÇÃO-->
            <div class="modal fade" id="confirmar-edicao-pcd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" >Cancelar Edição</h4>
                        </div>
                        <div class="modal-body">
                            <label>Deseja realmente cancelar? Todas as edições feitas serão perdidas!</label>                       
                        </div>
                        <div class="modal-footer">
                        <form >
                            <input type="button"  role="button" value = "Sim" class="btn btn-primary" id="input-sim-confirmar-edicao-modal" data-dismiss="modal">
                            <input type="button" role="button" value="Não" class="btn btn-primary"  id="input-nao-confirmar-edicao-modal" data-dismiss="modal" data-toggle="modal" >
                        </form> 
                        
                            
                        </div>
                    </div>
                </div>
            </div>
		
		
		<!--MODAL EXCLUIR-->
            <div class="modal fade" id="excluir-pcd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Excluir PCD</h4>
                        </div>
                        <div class="modal-body">
                            <label>Você realmente deseja excluir a PCD selecionada?</label>                       
                        </div>
                        <div class="modal-footer">
						<form class="formPCD" action="class/excluirPCD.php" method="POST">
							 <input name="ide" value="" type="hidden" class = "valor-identificacao"></input>
                            <input type="submit"  role="button" value = "Sim" class="btn btn-primary" >
							<input type="button" role="button" value="Não" class="btn btn-primary" >
						</form>	
						
                            
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			<!--MODAL CADASTRAR-->
            <div class="modal fade" id="cadastra-pcd-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
					<form class="formPCD"  action="class/cadastrarPCD.php" method="POST" id="form-cadastrar-pcd">
						<div class="modal-header">
                             <h3>Cadastro de PCD</h3>
                        </div>
                        <div class="modal-body">
                        <div class="form-group">
							<label>Cidade em que a PCD estará localizada</label>
							<div>
								<select name="cidade" class="form-control " id="select-cidade-cadastrar-modal"required>
									<option value="">  </option>
									<option value="São João da Boa Vista">São João da Boa Vista</option>
									<option value="Aguaí">Aguaí</option>
									<option value="Águas da Prata">Águas da Prata</option>
									<option value="Casa Branca">Casa Branca</option>
								</select>
							</div>
						</div>
                        <div class="form-group">
								<label>Estado em que a PCD estará localizada</label>
								<div>
									<select name="estado" class="form-control" id="select-estado-cadastrar-modal" required>
										<option value="">  </option>
										<option value="SP">SP</option>
										<option value="MG">MG</option>
										<option value="RJ">RJ</option>
										<option value="SC">SC</option>
									</select>
								</div>
					    </div>
					
					
					<div class="form-group">
                        <label>Descrição:</label>
                        <input name="descricao" type="text" class="form-control" placeholder="Descrição" id="input-descricao-cadastrar-modal"required>
                    </div>
					
					<div class="form-group">
                        <label>Localização (Latitude):</label>
                        <input name="latitude" type="text" class="form-control"placeholder="Latitude" id="input-latitude-cadastrar-modal" required>
                    </div>
					<div class="form-group">
                        <label>Localização (Longitude):</label>
                        <input name="longitude" type="text" class="form-control"placeholder="Longitude" id="input-longitude-cadastrar-modal" required>
                    </div>
					<div class="form-group">
                        <label class="control-label">Fotos:</label>
						<input id="input-1" type="file" class="file">
                    </div>                       
                        </div>
                        <div class="modal-footer">
                            <input type="submit" role="button" value="Salvar" class="btn btn-primary"></input>
							<input type="button" role="button" value="Cancelar" id="input-cancelar-cadastro-modal" class="btn btn-primary"  ></input>
                        </div>
                        
					</form>
                    </div>
                </div>
            </div>
			
			<!--MODAL EDITAR-->
            <div class="modal fade" id="editar-pcd-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
					<form class="formPCD" action="class/editarPCD.php" method="POST" id="form-editar-pcd">
						<div class="modal-header">
                             <h3>Editar PCD</h3>
                        </div>
                        <div class="modal-body">
						<div class="form-group " >
                       
                        <input name="ide" value="" type="hidden" class="form-control valor-identificacao" placeholder="Identificação">
                    </div>
                    <div class="form-group">
											<label>Cidade em que a PCD estará localizada</label>
										<div>
											<select name = "cidade" class="form-control select-cidade" id="select-cidade-editar-modal">
												<option value="">  </option>
												<option value="São João da Boa Vista">São João da Boa Vista</option>
												<option value="Aguaí">Aguaí</option>
												<option value="Águas da Prata">Águas da Prata</option>
												<option value="Casa Branca">Casa Branca</option>
											</select>
										</div>
									</div>
                    <div class="form-group">
											<label>Estado em que a PCD estará localizada</label>
										<div>
											<select name = "estado" class="form-control select-estado" id="select-estado-editar-modal">
												<option value="">  </option>
												<option value="SP">SP</option>
												<option value="MG">MG</option>
												<option value="RJ">RJ</option>
												<option value="SC">SC</option>
											</select>
										</div>
									</div>
					<div class="form-group " >
                        <label>Descrição:</label>
                        <input name="descricao" type="text" class="form-control valor-descricao" placeholder="Descrição" id="input-descricao-editar-modal" required>
                    </div>
					<div class="form-group ">
                        <label>Localização (Latitude):</label>
                        <input name = "latitude" type="text" class="form-control valor-latitude"placeholder="Latitude" id="input-latitude-editar-modal">
                    </div>
					<div class="form-group ">
                        <label>Localização (Longitude):</label>
                        <input name= "longitude" type="text" class="form-control valor-longitude"placeholder="Longitude" id="input-longitude-editar-modal">
                    </div>
					                    
                        </div>
                        <div class="modal-footer">
                            <input type="submit" role="button" value="Salvar" class="btn btn-primary btn-salvar"></input>
						    <input type="button"  role="button" value="Cancelar" class="btn btn-primary" id="input-cancelar-edicao-modal"></input>
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
                    <a href="index.html" class="page-scroll icone-menu-container">
                        <img class="img-responsive" src="img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="index.html">P&aacute;gina Principal</a>
                        </li>
                        <li id="btn-login">
                            <a> Login </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contact Section -->
        <section id="contact">
            <div class="container elemento-expandido"><br><br>                           
                    <div>
                        <h2>Listagem de PCD's</h2><br><br>
                        <table id="lista-pcd" class="table table-condensed">
                            <thead>
                                <tr bgcolor="#3a4857">
                                    <th style="width:10%">ID da PCD</th>
                                    <th style="width:7%">Cidade</th>
                                    <th style="width:4%">Estado</th>
									<th style="width:7%">Localização</th>
									<th style="width:7%">Descrição</th>
                                    <th style="width:5%"></th>
                                    <th style="width:5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach ($lista as $value):                               
								
								?>
                                <tr>
								<?php $id = $value->getId(); ?>
                                    <td><?php echo $id; ?></td>
                                    <td class = "cidade" ><?php echo $value->getCidade(); ?></td>
                                    <td class = "estado"><?php echo $value->getEstado(); ?></td>
                                    <td class = "localizacao"><?php echo ("".$value->getLatitude()." / ".$value->getLongitude());  ?></td>
								
                                    <td class = "descricao"><?php echo $value->getDescricao(); ?></td>
                                    
                                    <td><button class="btn btn-primary btn-table btn-editar" data-toggle="modal" data-target="#editar-pcd-modal" value = <?php echo $id;?>>Editar</button></td>     
                                    <td><button class = "btn btn-primary btn-table btn-excluir" data-toggle = "modal" data-target = "#excluir-pcd" value = <?php echo $id;?>>Excluir</button></td>
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
        <script src="js/jquery.js"></script>
		<script src="//cdn.datatables.net/plug-ins/1.10.12/api/fnReloadAjax.js"></script>

        <!-- Data Tables JQuery -->
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>        
        <script src="js/table/tables.js"></script>
        <script src="js/dataTables.responsive.min.js"></script>
		<script src="js/dataTables.buttons.min.js"></script>

        <!-- Data Tables Buttons -->
        <script src="js/buttons.colVis.min.js"></script>
        <script src="js/buttons.bootstrap.min.js"></script>
        <script src="js/buttons.html5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>
        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/jszip.min.js"></script>
        <script src="js/pdfmake.min.js"></script>
        <script src="js/vfs_fonts.js"></script>

        <!--- formValidation.io jQuery -->
        <script src="js/formValidation.min.js"></script>
        <script src="js/formValidation-bootstrap.min.js"></script>
        <script src="js/validatorPCD.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/freelancer.js"></script>
		<script src="js/fileinput.min.js"></script>
		<script src="js/fileinput_locale_pt-BR.js"></script>
		<script src="js/Modulo_02.js"></script>
    </body>

</html>