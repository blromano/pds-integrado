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

    <title>Projeto Indra</title>

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
                    <button id="excluir-sim" type="button" class="btn btn-default" data-dismiss="modal">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL CONFIRMAR CANCELAMENTO-->
    <div class="modal fade" id="confirmar-sensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <input type="button"  role="button" value = "Sim" class="btn btn-primary" id="input-confirmar-cancelamento" data-dismiss="modal">
                        <input type="button" role="button" value="Não" class="btn btn-primary"  id="input-nao-confirmar-cancelamento" data-dismiss="modal" data-toggle="modal" >
                    </form>                

                </div>
            </div>
        </div>
    </div>


    <!--MODAL VINCULAR SENSOR-->
    <div class="modal fade" id="cadastrar-sensor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="formSensor" action="class/cadastrarSensor.php" method="POST" id="form-vincular-sensor">
                    <div class="modal-header">
                        <h3>Cadastrar Sensor</h3>
                    </div>
                    <div class="modal-body">                                
                        <div class="form-group">
                            <label>ID da PCD</label>
                            <div>
                                <select id="select-id-vincular-sensor-modal" name="id_pcd" class="form-control">
                                    <option value=""></option>
                                    <?php 
                                    $DAO->ListarID_PCD();
                                    ?>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label>ID Tipo</label>
                            <div>
                                <select id="select-tipo-vincular-sensor-modal" name="id_tipo" class="form-control">
                                    <option value=""></option>
                                    <?php 
                                    $DAO->ListarID_Tipo();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Periodicidade de Medição</label>
                            <input id="input-periodicidade-vincular-sensor-modal" type="text" name="periodicidade_med" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" role="button" value="Salvar" class="btn btn-primary"></input>
                        <input id="input-cancelar-vincular-sensor-modal" type="button" role="button" value="Cancelar" class="btn btn-primary" ></input>
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
            <form action="class/editarSensor.php" method="POST" class="formSensor">
                <div class="modal-header">
                    <h3>Editar Sensor</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID da PCD</label>
                        <div>
                            <select id="select-id-editar-sensor-modal" class="form-control" name="id_pcd_editar">
                                <option value="">  </option>
                                <?php 
                                    $DAO->ListarID_PCD();
                                ?>
                            </select>
                        </div>
                        <label>ID Tipo</label>
                        <div>
                            <select id="select-tipo-editar-sensor-modal" class="form-control" name="id_tipo_editar">
                                <option value="">  </option>
                                <?php 
                                    $DAO->ListarID_Tipo();
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" name="id_sensor_editar" val="" id="input-recebe-id-sensor">
                        <div class="form-group">
                            <label>Periodicidade de Medição</label>
                            <input id="input-periodicidade-editar-sensor-modal" type="text" name="periodicidade_med_editar" class="form-control">
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

<!--MODAL CONFIRMAR EDIÇÃO-->
            <div class="modal fade" id="confirmar-edicao-sensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Cancelar Edição</h4>
                        </div>
                        <div class="modal-body">
                            <label>Deseja realmente cancelar? Todas as edições feitas serão perdidas!</label>
                        </div>
                        <div class="modal-footer">
                        <form >
                            <input type="button"  role="button" value = "Sim" class="btn btn-primary" id="input-sim-confirmar-edicao-modal-sensor" data-dismiss="modal">
                            <input type="button" role="button" value="Não" class="btn btn-primary"  id="input-nao-confirmar-edicao-modal-sensor" data-dismiss="modal" data-toggle="modal" >
                        </form>        
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
<section id="contact">
    <div class="container elemento-expandido"><br><br>                           
        <div>
            <h2>Listagem de Sensores</h2><br><br>
            <table id="lista-sensores" class="table table-condensed">
                <thead>
                    <tr bgcolor="#3a4857">
                        <th style="width:20%">ID do Sensor</th>
                        <th style="width:20%">ID da PCD</th>
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
                        <td  class="id-sensor-table"><?php echo $id; ?></td>
                        <td class="id-pcd-table"><?php echo $value->getIdPcd(); ?></td>
                        <td class="id-tipo-sensor-table"><?php echo $value->getIdTipo(); ?></td>
                        <td class="periodicidade-medicao"><?php echo $value->getPeriodicidadeMed(); ?></td>
                        <td ><?php echo $value->getEstado(); ?></td>

                        <td><button class="btn btn-primary btn-table btn-editar" data-toggle="modal" data-target="#editar-sensor-modal">Editar</button></td>     
                        <td><button id="<?php echo $id; ?>" class="btn btn-primary btn-table btn-excluir" data-toggle="modal" data-target="#excluir-sensor">Excluir</button></td>
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

<script>
    $(document).ready(function(){
      $('#lista-sensores tbody').on('click', 'button.btn-excluir', function(){
        var idSensor = this.id;
        $('#excluir-sim').on('click', function(){
            window.location="class/excluirSensor.php?id=" + idSensor;
        });
    });
      $("#input-cancelar-vincular-sensor-modal").click(function(){

        if($("#select-id-vincular-sensor-modal").val() != "" && $("#select-tipo-vincular-sensor-modal").val() != "" && $("#input-periodicidade-vincular-sensor-modal").val() != ""){
            $("#confirmar-sensor").css('zIndex', '9999'); 
            $("#confirmar-sensor").modal();
        }else{
            $("#cadastrar-sensor-modal").modal('toggle');

        }
    });
      $("#input-nao-confirmar-cancelamento").click(function(){

        $("#cadastrar-sensor-modal").modal();
    });
      $("#input-confirmar-cancelamento").click(function(){
        $("#select-id-vincular-sensor-modal").val("");
        $("#select-tipo-vincular-sensor-modal").val("");
        $("#input-periodicidade-vincular-sensor-modal").val("");
        
        $('#form-vincular-sensor').data('formValidation').resetForm();
        $("#cadastrar-sensor-modal").modal('toggle');
    });

      $('#lista-sensores tbody').on('click', 'button.btn-editar', function(){       
        $('#select-id-editar-sensor-modal').val($(this).parent().siblings('.id-pcd-table').html());
        $('#select-tipo-editar-sensor-modal').val($(this).parent().siblings('.id-tipo-sensor-table').html());
     
        $('#input-periodicidade-editar-sensor-modal').val($(this).parent().siblings('.periodicidade-medicao').html());
         $('#input-recebe-id-sensor').val($(this).parent().siblings('.id-sensor-table').html());



    });    
  });
</script>

</body>

</html>