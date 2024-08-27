<?php
    include 'class\tipoSensorDAO.php';
	  include 'class\tipoMedicaoDAO.php';

	$tipoSensorDAO = new tipoSensorDao();
	$tipoMedicaoDAO = new tipoMedicaoDAO();
	$tiposMedicoes = $tipoMedicaoDAO->Listar();

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Projeto Indra </title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/freelancer.css" rel="stylesheet">

        <!-- Data Tables CSS -->
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">

		<link href="css/formValidation.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link href="css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>

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

        <!--MODAL certeza cancelar-->
                        <div class="modal fade multi-step" id="certezacancelar" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-tittle step-1" data-step="1" >Deseja realmente cancelar cadastro?</h4>
                                        <h4 class="step-2" data-step="2">Deseja realmente cancelar? Todas as edições feitas serão perdidas!</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" value="Sim" role="button" id="simcerteza-edicao" class="btn btn-default step-2" data-step="2" data-dismiss="modal">
                                        <input type="button" value="Sim" role="button" id="simcerteza-cadastro" class="btn btn-default step-1" data-step="1" data-dismiss="modal">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div>
                        </div>

			<!--MODAL CADASTRAR-->
            <div class="modal fade multi-step" id="cadastra-tiposensor-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
    						          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="step-1 step-3" data-step="1" >Cadastro de Tipo de Sensor</h3>
                              <h3 class="step-2" data-step="2">Cadastro realizado com sucesso!</h3>
                            </div>
				                  <form class="formTipoSensor" id="formCriar" method="POST" >
                                <div class="modal-body step-1" data-step="1">
                					             <div class="form-group">
                                          <label>Tipo de Sensor:</label>
                                          <input name="tipoSensor" id="tiposensor" type="text" class="form-control" placeholder="Tipo de sensor" required>
                                       </div>
  							                       <label>Tipo de medicao</label>
  							                       <div class="form-group">
                  								         <select name="tipo" class="form-control timed-cadastro" required>
                                             <option value=""></option>
                  									       <?php
                  									       foreach($tiposMedicoes as $timed){
                  									       echo '<option value="' . $timed->getId(). '">' . $timed->getTipoMedicao() . '</option>';
                  									       }
                  									       ?>
                  								         </select>
          							              </div>
        					                    <div class="form-group">
                                          <label>Unidade de medida:</label>
                                          <div>
                                          <input name="unidade" id="unidade" type="text" class="form-control" placeholder="Unidade de medida" required>
          							                  </div>
                                      </div>
          					                  <div class="form-group">
                                          <label>Descrição:</label>
                                          <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição" required></textarea>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <label class="step-3" data-step="3" >Deseja realmente cancelar o cadastro? </label>
                                    <input type="button" id="btnCriar" role="button" value="Salvar" class="btn btn-primary step step-1" data-step="1"></input>
      							                <input type="button" id="cancelar" role="button" value="Cancelar" class="btn btn-primary step step-1" data-step="1"></input>
                                    <button type="button" class="btn btn-primary step step-2" data-step="2" data-dismiss="modal">OK</button>
                                </div>
      					          </form>
                    </div>
                </div>
            </div>

            <!--MODAL EDITAR-->
                  <div class="modal fade multi-step" id="editar-tiposensor-modal">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="step-1 step-3" data-step="1" data-step="3">Edição de Tipo de Sensor</h3>
                                <h3 class="step-2" data-step="2">Tipo de Sensor editado com sucesso</h3>
                                </div>
                              <form class="formEditar" id="formEditar">
                              <div class="modal-body step-1 step-3" data-step="1" data-step="3">
                                <div>
                                  <input class="form-control idtiposensor-modal" name="idtiposensor-modal" type="hidden"></input>
                                </div>
                                <div class="form-group">
                                      <label>Tipo de Sensor:</label>
                                      <input name="tipoSensoreditar" id="tipoSensor-editar" type="text" class="form-control tipo-sensor" size="27" required>
                                </div>
                                <label>Tipo de medicao</label>
                                <div class="form-group">
                                  <option value="" ></option>
                                    <select name="tipoeditar" id="tipo-editar" class="form-control timed" required>
                                      <?php
                                      foreach($tiposMedicoes as $timed){
                                      echo '<option value="' . $timed->getId(). '">' . $timed->getTipoMedicao() . '</option>';
                                       }
                                      ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label>Unidade de medida:</label><div>
                                        <input name="unidadeeditar" id="unidade-editar" type="text" class="form-control unimed2" size="27" required>
                                </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição:</label>
                                        <textarea name="descricaoeditar" id="descricao-editar" class="form-control decricaotpsensor" cols="27" placeholder="Descrição" required></textarea>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <label class="step-3" data-step="3" >Deseja realmente cancelar a edição? </label>
                                        <input type="button" id="btnEditar" role="button" value="Salvar" class="btn btn-primary step-1" data-step="1"></input>
                                        <input type="button" id="cancelar-editar" role="button" value="Cancelar" class="btn btn-primary step-1" data-step="1"></input>
                                        <button type "button" class="btn btn-primary step-2" data-step="2" data-dismiss="modal">OK</button>
                                        <input type="button" value="Sim" role="button" id="simcerteza-editar" class="btn btn-primary step step-3" data-step="3" data-dismiss="modal">
                                        <input type="button" value="Não" role="button" id="nao-editar" class="btn btn-primary step-3" data-step="3">
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>

		<!--MODAL EXCLUIR-->
            <div class="modal fade multi-step" id="excluir-tiposensor-modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title step-1" data-step="1">Excluir tipo de sensor</h4>
                            <h4 class="modal-title step-2" data-step="2">Tipo de Sensor excluído com sucesso</h4>
                            <h4 class="step-3" data-step="3">Tipo de Sensor possui Sensor vinculado. Não é possível excluí-lo</h4>
                        </div>
                        <div class="modal-body step-1" data-step="1">
                            <label>Você realmente deseja excluir o tipo de sensor selecionado?</label>
                        </div>
                        <div class="modal-footer">
                          <input class="form-control idtiposensor-modal-excluir" name="idtiposensor-modal-excluir" type="hidden"></input>
                            <button type="button" id="btnExcluir" class="btn btn-default step-1" data-step="1">Sim</button>
                            <button type="button" class="btn btn-default step-1" data-step="1" data-dismiss="modal">Não</button>
                            <button type "button" class="btn btn-primary step-2" data-step="2" data-dismiss="modal">OK</button>
                            <button type "button" class="btn btn-primary step-3" data-step="3" data-dismiss="modal">OK</button>
                        </div>
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
        <section id="contact" >
            <div class="container elemento-expandido" ><br><br>
                    <div>
                        <h2>Tipo de Sensor</h2><br><br>
                        <table id="lista-tiposensor" class="table table-condensed" style="width:100%;margin-left:0%;">
                            <thead>
                                <tr bgcolor="#3a4857">
									<th style="width:20%">ID Tipo do Sensor</th>
									<th style="width:20%">Tipo de Sensor</th>
                                    <th style="width:20%">Tipo de Medicao</th>
									<th style="width:20%">Unidade de medida</th>
									<th style="width:20%">Descrição da unidade de medida</td>
									<th style="width:6%"></th>
									<th style="width:6%"></th>

                                </tr>
                            </thead>
                            <tbody>
							<?php

                            $value  = $tipoSensorDAO->Listagem_Tipo_Sensor();
                            for($i = 0;$i < count($value);$i++ ){

								            $tMedicaoPorId = $tipoMedicaoDAO->listarPorId($value[$i]->getTimid());
                                ?>
                                <tr>
                                    <td class="idtiposensor"><?php echo $value[$i]->getId() ?></td>
                  									<td class="valortiposensor"><?php echo $value[$i]->getTipo_sensor() ?></td>
                  									<td  class="tipomed" ><?php echo $tMedicaoPorId[0]->getTipoMedicao() ?></td>
                  									<td class="unimed"><?php echo $value[$i]->getUnidade_medida() ?></td>
                                    <td class="desc"><?php echo $value[$i]->getDescricao() ?></td>
                                    <td><button class="btn btn-primary btn-table btn-editarsensor" data-toggle="modal" data-target="#editar-tiposensor-modal">Editar</button></td>
                                    <td><button class="btn btn-primary btn-table btn-excluirsensor" >Excluir</button></td>
				                </tr>
                                <?php
                            };
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

        <!-- imports -->
    <script src="js/jquery.js"></script>
<script src="js/multi-step-modal.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpAnimatedHeader.js"></script>
		<script src="js/jqBootstrapValidation.js"></script>
		<script src="js/contact_me.js"></script>
		<script src="js/freelancer.js"></script>
		<script src="js/formValidation.min.js"></script>
		<script src="js/formValidation-bootstrap.min.js"></script>
		<script src="js/listagemTipoSensor.js"></script>
		<script src="js/jquery.dataTables.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/dataTables.buttons.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>

    </body>

</html>
