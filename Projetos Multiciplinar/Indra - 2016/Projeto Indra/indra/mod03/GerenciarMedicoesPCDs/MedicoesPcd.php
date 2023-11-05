<?php
include_once "./MedicoesCTR.php";
include_once "../../../dao/mod03/MedicaoDAO.php";
include_once '../../../modelo/mod03/Medicao.php';
include_once '../../../dao/mod03/ConectarBD.php';

require_once '../../../modelo/mod01/Usuario.php';
require_once '../../../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../../mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() != 4) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 1:
            header('Location: ../../mod01/indexNivel1.php');
            break;
        case 2:
            header('Location: ../../mod01/indexNivel2.php');
            break;
        case 3:
            header('Location: ../../mod01/indexNivel3.php');
            break;
        case 4:
            header('Location: ../../mod01/indexNivel4.php');
            break;      
        default:
            unset($_SESSION['user']); 
            session_destroy();
            header('location:../../mod01/index1.php'); 
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

        <title>Gerenciamento de Periodicidade de Medição dos Sensores</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../../../css/plugin/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="../../../css/plugin/freelancer.css" rel="stylesheet">
        <link href="../../../css/custom/mod03/style.css" rel="stylesheet" type="text/css"/>

        <!-- Data Tables CSS -->
        <link href="../../../css/plugin/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../../../css/plugin/buttons.dataTables.css" rel="stylesheet">
        
        <!-- Custom Fonts -->
        <link href="../../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        

 

    </head>

    <body id="page-top" class="index">

        

        <!-- modal alterar -->
        <div class="modal fade" id="modal-edit" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alterar Medição</h4>
                    </div>
                    <div class="modal-body" id='form-atualizar'>

                    </div>
                </div>
            </div>
        </div>

        <!-- modal excluir -->
        <div class="modal fade" id="modal-del" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Excluir Medição</h4>
                    </div>
                    <div class="modal-body">
                        <label>Você realmente deseja excluir esta medição?</label>
                        <div class="modal-footer">
                            <form action="MedicoesCTR.php" method="POST" id="formEM">
                                <input type="hidden" name="operacao" value="excluir">
                                <input type="hidden" name="id" id="medicao">
                                <button type="submit" class="btn btn-default" >Excluir</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal criar -->
        <div class="modal fade" id="modal-new" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Inserir Medição</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="formIM" action="MedicoesCTR.php">

                            <div class="form-group">
                                <label>Dado</label>
                                <input type="text" class="form-control input" name="dado" required>
                            </div>

                            <div class="form-group">
                                <label>Data e Hora</label>
                                <input type="text" class="form-control input data-mascara"  name="data_hora" required>
                            </div>

                            <div class="form-group">
                                <label>Tipo Medição</label>
                                <select class="form-control" name="tipo_medicao" id="lista-medicoes">
                                    <option value="">Selecione um Tipo de Medição</option>
                                    <?php
                                    $tiposMedicoes = MedicaoDAO::TipoMedicao($_SESSION['idPcd']);
                                    
                                    foreach ($tiposMedicoes as $tipoMedicao):
                                        ?>
                                        <option value="<?php echo $tipoMedicao[2] ?>"><?php echo $tipoMedicao[0] ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>

                                <input type="hidden" name="operacao" value="inserir">

                            </div>

                            <div class="form-group elemento-escondido" id="lista-sensores">
                                <label>Tipo de Sensor</label>
                                <div>
                                    <div id="sensores"></div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" id="btn-new">Criar</button>
                                <input type="button" value="Cancelar" class="btn btn-default" data-dismiss="modal"> 
                            </div>
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
                    <a href="#page-top" class="page-scroll icone-menu-container">
                        <img  class="img-responsive" src="../../../img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="../../../ferramentas/ferramenta3.php">Ferramenta 3</a>
                        </li>
						<li class="page-scroll">
                            <a href="../../../indra/mod01/index1.php">Página Principal</a>
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

            <div class="container">
                <br /> <br />

                <div class="panel panel-body">

                    <h2>Gerenciamento de Medições - PCD <?php echo ExibirValorFormularioData('idPcd') ?></h2>
                    <br /><br />
                    

                    <div class="panel panel-body">
                        <form class="form-inline" id="form-data" action="MedicoesCTR.php" method="POST">

                            <div class="form-group col-xl-3">
                                <label>Data Inicial</label>
                                <input type="text" name="dataInicial" class="form-control" id="dataInicial" value="<?php echo ExibirValorFormularioData('dataInicial') ?>"/>
                            </div>

                            <div class="form-group col-xl-3">
                                <label>Data Final</label>
                                <input type="text" name="dataFinal" class="form-control" id="dataFinal" value="<?php echo ExibirValorFormularioData('dataFinal') ?>"/>
                            </div>

                            <input type="hidden" name="idPcd" id="idpcd" value="<?php echo ExibirValorFormularioData('idPcd') ?>"/>
                            <input type="hidden" name="gerarTabela" />

                            <div class="form-group col-xl-3">
                                <input class="btn btn-primary" type="submit" id="buscarBtn"  value="Buscar "> 
                            </div>
                            
                            <div class="form-group col-xl-3">
                                <a class="btn btn-primary" href="SelecionarPCD.php"> Selecionar PCD</a>
                            </div>

                        </form>
                    </div>
                    <div>
                        <table id="gerenciamento" class="table table-condensed">
                            <thead>
                                <tr bgcolor="#3a4857">
                                    <th width="18%">Data e Hora</th>
                                    <th width="18%">Tipo de Medição</th>
                                    <th width="18%">Tipo de Sensor</th>
                                    <th width="18%">Medição</th>
                                    <th width="18%">Unidade de Medida</th>
                                    <th width="5%"></th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody id="conteudo-tabela">
                                <?php GerarTabela() ?>
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
        <script src="../../../js/plugin/jquery.js"></script>

        <!-- JavaScript Masks -->
        <script src="../../../js/plugin/jquery.maskedinput.min.js"></script>
        <script src="../../../js/plugin/jquery.mask.min.js" type="text/javascript"></script>

        <!-- Data Tables JQuery -->
        <script src="../../../js/plugin/jquery.dataTables.min.js"></script>
        <script src="../../../js/plugin/dataTables.bootstrap.min.js"></script>
        <script src="../../../js/plugin/dataTables.buttons.min.js"></script>
        <script src="../../../js/custom/mod03/tables.js"></script>
        
        
        <script src="../../../js/custom/mod03/medicoes.js" type="text/javascript"></script>

        <!-- formValidation.io javaScript -->
        <script src="../../../js/plugin/formValidation.min.js"></script>
        <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../js/plugin/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../../js/plugin/freelancer.js"></script>

    </body>

</html>
