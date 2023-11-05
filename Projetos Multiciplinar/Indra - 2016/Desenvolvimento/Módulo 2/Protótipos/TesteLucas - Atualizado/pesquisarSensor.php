<?php
include 'class/sensorDAO.php';

$DAO = new sensorDAO();

$lista = $DAO->Listar();

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
        
        <!--MODAL EXCLUIR SENSOR-->
             <div class="modal fade" id="excluir-sensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Sensor</h4>
                        </div>
                        <div class="modal-body">
                            <label>Você realmente deseja excluir o Sensor selecionado?</label>                       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            <!--MODAL VINCULAR SENSOR-->
            <div class="modal fade" id="cadastrar-sensor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="formSensor">
                        <div class="modal-header">
                            <h3>Cadastrar Sensor</h3>
                        </div>
                        <div class="modal-body">                            
                            <div class="form-group">
                                <label>ID da PCD</label>
                                <div>
                                    <select name="id_pcd" class="form-control">
                                        <option value="">  </option>
                                        <option value="">000001</option>
                                        <option value="">000002</option>
                                        <option value="">000003</option>
                                        <option value="">000004</option>
                                    </select>
                                </div>
                            </div> 
                                <div class="form-group">
                                <label>ID Tipo</label>
                                   <div>
                                    <select name="id_tipo" class="form-control">
                                        <option value="">  </option>
                                        <option value="">000001</option>
                                        <option value="">000002</option>
                                        <option value="">000003</option>
                                        <option value="">000004</option>
                                    </select>
                                   </div>
                                </div>
                            <div class="form-group">
                                   <label>Data</label>
                                   <input name="data" type="date" class="form-control"></input>                                
                            </div>
                            <div class="form-group">
                                   <label>Hora</label>
                                   <input name="hora" type="time" class="form-control"></input>                                
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <input type="submit" role="button" value="Salvar" class="btn btn-primary"></input>
                            <input type="button" role="button" value="Cancelar" class="btn btn-primary" data-dismiss="modal"></input>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            
            <!--MODAL EDITAR VINCULAÇÃO-->
           <div class="modal fade" id="editar-sensor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h3>Editar Sensor</h3>
                        </div>
                        <div class="modal-body">
                           
                            <div class="form-group">
                                <label>ID Sensor</label>
                                <div>
                                    <input type="text" class="form-control"placeholder="ID Sensor" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>ID da PCD</label>
                                <div>
                                    <select class="form-control">
                                        <option value="">  </option>
                                        <option value="">000001</option>
                                        <option value="">000002</option>
                                        <option value="">000003</option>
                                        <option value="">000004</option>
                                    </select>
                                </div>
                                <label>ID Tipo</label>
                                <div>
                                    <select class="form-control">
                                        <option value="">  </option>
                                        <option value="">000001</option>
                                        <option value="">000002</option>
                                        <option value="">000003</option>
                                        <option value="">000004</option>
                                    </select>
                                </div>
                            </div> 
                            
                        </div>
                        <div class="modal-footer">
                            <input type="submit" role="button" value="Salvar" class="btn btn-primary"></input>
                            <input type="button" data-dismiss="modal" role="button" value="Cancelar" class="btn btn-primary"></input>
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
                        <h2>Listagem de Sensores</h2><br><br>
                        <table id="lista-sensores" class="table table-condensed">
                            <thead>
                                <tr bgcolor="#3a4857">
                                    <th style="width:20%">ID do Sensor</th>
                                    <th style="width:20%">ID do PCD</th>
                                    <th style="width:20%">ID Tipo</th>
                                    <th style="width:25%">Periodicidade de Medição</th>
                                    <th style="width:20%">Estado</th>
                                    <th style="width:2%"></th>
                                    <th style="width:2%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($lista as $value):                               
                                
                                ?>
                                <tr>
                                <?php $id = $value->getId(); ?>
                                    <td ><?php echo $id; ?></td>
                                    <td ><?php echo $value->getIdPcd(); ?></td>
                                    <td ><?php echo $value->getIdTipo(); ?></td>
                                    <td ><?php echo $value->getPeriodicidadeMed(); ?></td>
                                    <td ><?php echo $value->getEstado(); ?></td>
                                    
                                    <td><button class="btn btn-primary btn-table btn-editar" data-toggle="modal" data-target="#editar-pcd-modal">Editar</button></td>     
                                    <td><button class = "btn btn-primary btn-table btn-excluir" data-toggle = "modal" data-target = "#excluir-pcd">Excluir</button></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                               
                            </tbody>
                        </table>
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

        <!-- Data Tables JQuery -->
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>        
        <script src="js/Listagem sensores Reformulado.js"></script>
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
        <script src="js/validatorSensor.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/freelancer.js"></script>

    </body>

</html>