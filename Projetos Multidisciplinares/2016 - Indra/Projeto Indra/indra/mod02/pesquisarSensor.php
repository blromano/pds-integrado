<?php
include '../../dao/mod02/sensorDAO.php';

$DAO = new sensorDAO();

$lista = $DAO->Listar();
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

    <title>Projeto Indra</title>

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

    
	
	<!--MODAL GENERICO-->
	

	
	<div class="modal fade multi-step" id="generico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title step-1" id="myModalLabel" data-step="1">Falha em Excluir Sensor</h4>
					<h4 class="modal-title step-2" id="myModalLabel" data-step="2">Cadastro de sensor</h4>
					<h4 class="modal-title step-3" id="myModalLabel" data-step="3">Edição de sensor</h4>
                </div>
                <div class="modal-body step-1" data-step="1">
                    <label>O Sensor não pode ser excluido, pois suas medições estão sendo usados em outros lugares do sistema!</label>                       
                </div>
				<div class="modal-body step-2" data-step="2">
                    <label>O Sensor foi cadastro com sucesso!</label>                       
                </div>
				<div class="modal-body step-3" data-step="3">
                    <label>O Sensor foi editado com sucesso!</label>                       
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-default" data-dismiss="modal" id="button-falha-excluir-sensor-modal">OK</button>
                   
                </div>
            </div>
        </div>
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
                    <button id="button-sim-excluir-sensor-modal" type="button" class="btn btn-default" data-dismiss="modal">Sim</button>
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
                <form class="formSensor" id="form-vincular-sensor">
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
                        <input type="button" role="button" value="Salvar" class="btn btn-primary" id="input-salvar-vincular-sensor"></input>
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
            <form  class="formSensor" id="form-editar-sensor">
                <div class="modal-header">
                    <h3>Editar Sensor</h3>
                </div>
                <div class="modal-body">
                    <div >
                        <label>ID da PCD</label>
                        <div class="form-group">
                            <select id="select-id-editar-sensor-modal" name="id_pcd" class="form-control" >
                                <option value="">  </option>
                                <?php 
                                    $DAO->ListarID_PCD();
                                ?>
                            </select>
                        </div>
                        <label>ID Tipo</label>
                        <div class="form-group">
                            <select id="select-tipo-editar-sensor-modal" name="id_tipo" class="form-control" >
                                <option value="">  </option>
                                <?php 
                                    $DAO->ListarID_Tipo();
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" val="" id="input-recebe-id-sensor">
                        <div class="form-group">
                            <label>Periodicidade de Medição</label>
                            <input id="input-periodicidade-editar-sensor-modal" type="text" name="periodicidade_med" class="form-control">
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="button" role="button" value="Salvar" class="btn btn-primary"  id="input-salvar-editar-vinculacao-sensor"></input>
                    <input type="button" role="button" value="Cancelar" class="btn btn-primary" id="input-cancelar-editar-vinculacao-sensor"></input>
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
<script src="../../js/plugin/jquery.js"></script>
<script src="../../js/plugin/multi-step-modal.js"></script>

<!-- Data Tables JQuery -->
        <script src="../../js/plugin/jquery.dataTables.min.js"></script>
		<script src="../../js/plugin/dataTables.bootstrap.min.js"></script>
        <script src="../../js/custom/mod02/tables.js"></script>
       
        

        <!-- Data Tables Buttons -->
		<script src="../../js/plugin/dataTables.buttons.min.js"></script>



<!--- formValidation.io jQuery -->
		<script src="../../js/plugin/formValidation.min.js"></script>
		<script src="../../js/plugin/formValidation-bootstrap.min.js"></script>
		<script src="../../js/custom/mod02/validatorSensor.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/plugin/bootstrap.min.js"></script>


<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../../js/plugin/freelancer.js"></script>

<script>
    $(document).ready(function(){
      var idSensor = 0;
	  var idPCD = null;
	  var idTipo = null;
	  var periodicidadeMed = null;
	  var copia = true;
	  
      $('#lista-sensores tbody').on('click', 'button.btn-excluir', function(){
        idSensor = this.id;		
		$("#button-sim-excluir-sensor-modal").click(function(){			
			$.ajax({
					url: "../../class/mod02/excluirSensor.php",
					type: "POST",
					dataType: "JSON",
					data: "id="+idSensor,					
					success: function (data){	
						copia = data;
						
					}
					
				}).done(function() {					
					if(copia == false){
						$('#generico').modal();
						$('#generico').trigger('next.m.1');
						
					}else {
						table_sensores.clear().draw();
						construirTabela(copia);
					}
				});
        
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
		idPCD = $(this).parent().siblings('.id-pcd-table').html();
		idTipo = $(this).parent().siblings('.id-tipo-sensor-table').html();
		periodicidadeMed = $(this).parent().siblings('.periodicidade-medicao').html();

    });
	
	$("#input-cancelar-editar-vinculacao-sensor").click(function(){

        if($("#select-id-editar-sensor-modal").val() != idPCD || $("#select-tipo-editar-sensor-modal").val() != idTipo || $("#input-periodicidade-editar-sensor-modal").val() != periodicidadeMed){
            $("#confirmar-edicao-sensor").css('zIndex', '9999'); 
            $("#confirmar-edicao-sensor").modal();
        }else{
			$("#editar-sensor-modal").data('formValidation').resetForm();
            $("#editar-sensor-modal").modal('toggle');

        }
    });
	
	$("#input-sim-confirmar-edicao-modal-sensor").click(function(){
       
        
        $('#form-editar-sensor').data('formValidation').resetForm();
        $("#editar-sensor-modal").modal('toggle');
    });
	
	var	table_sensores = $('#lista-sensores').DataTable({
        lengthChange: false,
        "language": {
        	"lengthMenu": "Mostrando _MENU_ itens por página",
        	"zeroRecords": "Nenhum item encontrado.",
        	"info": "Monstrando página _PAGE_ de _PAGES_",
        	"infoFiltered":   "(filtrado de _MAX_ total entries)",
        	"infoEmpty": "Nenhum item disponível ",
        	"infoFiltered": "(filtrado de _MAX_ itens)",
        	"search": "Procurar:",
        	"paginate": {
        		"first":      "Primeiro",
        		"last":       "Último",
        		"next":       "Próximo",
        		"previous":   "Anterior"
           },
       },
       "columnDefs": [ {
        "targets": [5,6],
        "orderable": false
    }], 
	dom: 'Bfrtip',
		buttons: [
            {
                text: 'Novo',
                action: function ( e, dt, node, config ) {
                   $("#cadastrar-sensor-modal").modal();
                }
				
            }
        ],
columns: [
    {
      
      className: 'id-sensor-table'
    },
	{
      
      className: 'id-pcd-table'
    },
	{
      
      className: 'id-tipo-sensor-table'
    },
	{
      
      className: 'periodicidade-medicao'
    }
  ]		
});
	
	function construirTabela($variavel){
		for ( var i = 0 ; i < $variavel.length; i++ ) {
							 
							table_sensores.row.add([

								$variavel[i]["id"],
								$variavel[i]["id_pcd"],
								$variavel[i]["id_tipo"],
								$variavel[i]["periodicidade_med"],
								$variavel[i]["estado"],
								//Botao Atualizar, com todas as informações do alerta em seu value;
								"<button class=\"btn btn-primary btn-table btn-editar\" data-toggle=\"modal\" data-target=\"#editar-sensor-modal\"  >Editar</button>",
								//Botao Excluir com o id e a pasta dos alertas do alerta armazenado em seu value;
								"<button id=\""+$variavel[i]["id"]+"\" class=\"btn btn-primary btn-table btn-excluir\"  data-toggle=\"modal\" data-target=\"#excluir-sensor\" >Excluir</button>"
								]).draw();
								
								
								
								
						}
						
						//table_sensores.columns.className(["id-sensor-table","id-pcd-table","id-tipo-sensor-table","periodicidade-medicao"])
		
	}

	
	$("#input-salvar-vincular-sensor").click(function(){
		$('#form-vincular-sensor').data('formValidation').resetForm();
		
        $("#cadastrar-sensor-modal").modal('toggle');
		
		var vincular_sensor = $("#form-vincular-sensor").serialize();
		

		$.ajax({
					url: "../../class/mod02/cadastrarSensor.php",
					type: "POST",
					dataType: "JSON",
					data: vincular_sensor,

					success: function (data) {	

					table_sensores.clear().draw();
					construirTabela(data);
					$('#form-vincular-sensor')[0].reset();
					$('#generico').modal();
					$('#generico').trigger('next.m.2');					
					}
				});
		

        
    });
	
	
	$("#input-salvar-editar-vinculacao-sensor").click(function(){
		
		
		var editar_sensor = $("#form-editar-sensor").serialize();
		

		$.ajax({
					url: "../../class/mod02/editarSensor.php",
					type: "POST",
					dataType: "JSON",
					data: editar_sensor,

					success: function (data) {
					
					

					table_sensores.clear().draw();
					construirTabela(data);
					$("#editar-sensor-modal").modal("toggle");
					$('#generico').modal();
					$('#generico').trigger('next.m.3');
					}
				});
		

        
    });
	
	
		
  });
</script>

</body>

</html>