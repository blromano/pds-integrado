<?php
include '..\..\dao\mod02\pcdDAO.php';

$DAO = new pcdDAO();

$lista = $DAO->Listar();

require_once '../../modelo/mod01/Usuario.php';
require_once '../../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() !=4) {
       
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

        <meta charset="iso-8859-1">
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
        <!--<link href="css/buttons.bootstrap.min.css" rel="stylesheet">-->
        <link href="../../css/plugin/fileinput.min.css" rel="stylesheet" type="text/css" />

        <!-- formVailidatior.io CSS -->
        <link href="../../css/plugin/formValidation.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="../../css/custom/mod02/style.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/plugin/buttons.dataTables.css" rel="stylesheet" type="text/css"/>

        




    </head>

    <body id="page-top" class="index">

        <div id="background-modal" class="elemento-escondido"></div>

       

        <!--MODAL EDIÇÃO REALIZADA COM SUCESSO-->
            <div class="modal fade" id="sucesso-edicao-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" >Informação</h4>
                        </div>
                        <div class="modal-body">
                            <label>Edição realizada com sucesso!</label>
                        </div>
                        <div class="modal-footer">
                        <form >
                            <input type="button"  role="button" value = "OK" class="btn btn-primary"  data-dismiss="modal">

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

        <!--MODAL EXCLUIR-->
            <div class="modal fade multi-step" id="excluir-pcd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title step-1" id="myModalLabel" data-step="1">Excluir PCD</h4>
							<h4 class="modal-title step-2" id="myModalLabel" data-step="2">Falha ao Excluir</h4>
                        </div>
                        <div class="modal-body step-1" data-step="1">
                            <label>Você realmente deseja excluir a PCD selecionada?</label>
                        </div>
						<div class="modal-body step-2" data-step="2">
							<label>O Sensor não pode ser deletado, pois seus dados então sendo ultilizados em outras partes do sistema!</label>                       
						</div>
                        <div class="modal-footer step-1" data-step="1">
                        <form >
                             <input name="ide" value="" type="hidden" class = "valor-identificacao" id="input-id-excluir-modal"></input>
                            <input type="button"  role="button" value = "Sim" class="btn btn-primary" id="input-sim-excluir-modal" >
                            <input type="button" role="button" value="Não" class="btn btn-primary" data-dismiss="modal">
                        </form>


                        </div>
						<div class="modal-footer step-2" data-step="2">
                        
                             
                            <input type="button" role="button" value="OK" class="btn btn-primary"id="input-ok-excluir-pcd">
                        


                        </div>
                    </div>
                </div>
            </div>



            <!--MODAL CADASTRAR-->
            <div class="modal fade" id="cadastra-pcd-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="formPCD" id="form-cadastrar-pcd">
                        <div class="modal-header">
                             <h3>Cadastro de PCD</h3>
                        </div>
                        <div class="modal-body">

                        <div class="form-group">
                                <label>Estado em que a PCD estará localizada</label>
                                <div>
                                    <select name="estado" class="form-control" id="select-estado-cadastro-modal" required>
                                        <option value="">  </option>
                                        <option value="SP">SP</option>
                                        <option value="MG">MG</option>
                                        <option value="RJ">RJ</option>
                                        <option value="SC">SC</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Cidade em que a PCD estará localizada</label>
                            <div>
                                <select name="cidade" class="form-control" id="select-cidade-cadastro-modal" required>
                                    <option value="">  </option>
                                    <option value="São João da Boa Vista">São João da Boa Vista</option>
                                    <option value="Aguaí">Aguaí</option>
                                    <option value="Águas da Prata">Águas da Prata</option>
                                    <option value="Casa Branca">Casa Branca</option>
                                </select>
                            </div>
                        </div>


                    <div class="form-group">
                        <label>Descrição:</label>
                        <input name="descricao" id="input-descricao-cadastro-modal"type="text" class="form-control" placeholder="Descrição" required>
                    </div>

                    <div class="form-group">
                        <label>Localização (Latitude):</label>
                        <input name="latitude" id="input-latitude-cadastro-modal" type="text" class="form-control"placeholder="Latitude" required>
                    </div>
                    <div class="form-group">
                        <label>Localização (Longitude):</label>
                        <input name="longitude" id="input-longitude-cadastro-modal" type="text" class="form-control"placeholder="Longitude" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fotos:</label>
                        <input id="input-1" type="file" class="file">
                    </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" role="button" id="input-salvar-cadastro-modal" value="Salvar" class="btn btn-primary" ></input>
                            <input type="button" role="button" id="input-cancelar-cadastro-modal" value="Cancelar" class="btn btn-primary" ></input>
                        </div>

                    </form>
                    </div>
                </div>
            </div>

            <!--MODAL EDITAR-->
            <div class="modal fade" id="editar-pcd-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="formPCD"  id="form-editar-pcd" >
                        <div class="modal-header">
                             <h3>Editar PCD</h3>
                        </div>
                        <div class="modal-body">
                        <div class="form-group " >

                        <input name="ide" value="" type="hidden" class="form-control valor-identificacao" placeholder="Identificação">
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
                            <input type="button" role="button" value="Salvar" class="btn btn-primary btn-salvar" id="input-salvar-edicao-modal" ></input>
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
                                    <td ><?php echo $id; ?></td>
                                    <td ><?php echo $value->getCidade(); ?></td>
                                    <td ><?php echo $value->getEstado(); ?></td>
                                    <td ><?php echo ("".$value->getLatitude()." / ".$value->getLongitude());  ?></td>

                                    <td ><?php echo $value->getDescricao(); ?></td>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

     <script type="text/javascript">

        $(document).ready(function () {

            $.getJSON('js/estados_cidades.json', function (data) {
                var items = [];
                var options = '<option value="">escolha um estado</option>';
                $.each(data, function (key, val) {
                    options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
                });
                $("#select-estado-cadastro-modal").html(options);

                $("#select-estado-cadastro-modal").change(function () {

                    var options_cidades = '';
                    var str = "";

                    $("#select-estado-cadastro-modal option:selected").each(function () {
                        str += $(this).text();
                    });

                    $.each(data, function (key, val) {
                        if(val.nome == str) {
                            $.each(val.cidades, function (key_city, val_city) {
                                options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                            });
                        }
                    });
                    $("#select-cidade-cadastro-modal").html(options_cidades);

                }).change();

            });

        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {

            $.getJSON('js/estados_cidades.json', function (data) {
                var items = [];
                var options = '<option value="">escolha um estado</option>';
                $.each(data, function (key, val) {
                    options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
                });
                $("#select-estado-editar-modal").html(options);



                    var options_cidades = '';
                    var str = "";



                    $.each(data, function (key, val) {

                            $.each(val.cidades, function (key_city, val_city) {
                                options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                            });

                    });
                    $("#select-cidade-editar-modal").html(options_cidades);









            });

        });

    </script>

        <script src="../../js/plugin/jquery.js"></script>
        
        <script src="../../js/plugin/formValidation.min.js"></script>
		<script src="../../js/plugin/formValidation-bootstrap.min.js"></script>

        <!-- Data Tables JQuery -->
        <script src="../../js/plugin/jquery.dataTables.min.js"></script>
		<script src="../../js/plugin/dataTables.bootstrap.min.js"></script>
        <script src="../../js/custom/mod02/tables.js"></script>
       
        

        <!-- Data Tables Buttons -->
		<script src="../../js/plugin/dataTables.buttons.min.js"></script>
        
        
        
        
        <!--- Multi Step Modal -->
		<script src="../../js/plugin/multi-step-modal.js"></script>
       
        
        <!--- formValidation.io jQuery -->

        <script src="../../js/custom/mod02/validatorPCD.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../js/plugin/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../js/plugin/freelancer.js"></script>
        <script src="../../js/plugin/fileinput.min.js"></script>
        <script src="../../js/plugin/fileinput_locale_pt-BR.js"></script>
        
    </body>

</html>
