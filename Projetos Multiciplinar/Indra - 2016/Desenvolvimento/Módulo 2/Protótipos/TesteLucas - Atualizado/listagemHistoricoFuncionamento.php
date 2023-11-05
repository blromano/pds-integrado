<?php
include 'class/alteracaoDAO.php';

$alteracaoDAO =  new alteracaoDAO();

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
                          <h1>Historico de Mudança de Status de PCDS</h1><br><br>
                          <table id="lista-historico-funcionamento" class="table table-condensed" style="width:100%;margin-left:0%;">
                              <thead>
                                  <tr bgcolor="#3a4857">
					                                   <th style="width:20%">Id PCD</th>
                                             <th style="width:20%">Id Administrador</th>
									                           <th style="width:20%">Data - Hora Alteração</th>
	                                           <th style="width:20%">Status Alterado</th>
									                           <th style="width:20%">Motivo da alteração</th>

                                  </tr>
                              </thead>
                              <tbody>
  							<?php
                $historico = $alteracaoDAO->Listar();
                foreach($historico as $value):
                                  ?>
                                  <tr>
                    									<td class="valortiposensor"><?php echo $value->getPcdId()?></td>
                    									<td  class="tipomed" ><?php echo $value->getUsuarioId()?></td>
                    									<td class="unimed"><?php echo $value->getDataHoraAlteracao()?></td>
                                      <td class="desc"><?php echo $value->getStatusAlterado()?></td>
                    									<td class="unimed"><?php echo $value->getJustificativa()?></td>
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

          <!-- imports -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
  		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  		<script src="js/classie.js"></script>
  		<script src="js/cbpAnimatedHeader.js"></script>
  		<script src="js/jqBootstrapValidation.js"></script>
  		<script src="js/contact_me.js"></script>
  		<script src="js/freelancer.js"></script>
  		<script src="js/formValidation.min.js"></script>
  		<script src="js/formValidation-bootstrap.min.js"></script>
  		<script src="js/listagemHistoricoFuncionamento.js"></script>
  		<script src="js/jquery.dataTables.js"></script>
  		<script src="js/dataTables.bootstrap.min.js"></script>
  		<script src="js/dataTables.buttons.min.js"></script>
      <script src="js/jquery.mask.min.js"></script>

      </body>

  </html>
