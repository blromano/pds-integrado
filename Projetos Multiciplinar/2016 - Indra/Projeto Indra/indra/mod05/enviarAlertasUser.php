<?php

require_once '../../modelo/mod01/Usuario.php';
require_once '../../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() <= 0) {
       
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

    <title>Projeto Indra - Manipulação de Alertas</title>


    <!-- formVailidatior.io CSS -->
    <link href="../../css/plugin/formValidation.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../../css/plugin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/plugin/freelancer.css" rel="stylesheet">
    <link href="../../css/plugin/fileinput.min.css" rel="stylesheet">
    <link href="../../css/custom/mod05/carrosel.css" rel="stylesheet">
    <link href="../../css/custom/mod05/style.css" rel="stylesheet" type="text/css"/>

    <!-- Data Tables CSS -->
    <link href="../../css/plugin/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../css/plugin/buttons.dataTables.css" rel="stylesheet">
    
    

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    


</head>

<body id="page-top" class="index">

	<input type="hidden" value=<?php echo $_SESSION['user']->getId(); ?> id="idUser">

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
                <a href="page-top" class="page-scroll icone-menu-container">
                    <img class="img-responsive" src="../../img/icone.png" id="icone-menu" alt="icone"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="../mod01/indexNivel1.php">P&aacute;gina Principal</a>
                    </li>
                    <li id="btn-login">
						<a href="../../class/mod01/logout.php"> Logout </a>
					</li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Imagens -->
    <div class="modal fade multi-step" id="modalImagens">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title step-1" data-step="1">Imagens do Alerta</h4>
                    <h4 class="modal-title step-2" data-step="2">Exlusão realizada com sucesso</h4>
                    <h4 class="modal-title step-3" data-step="3">Upload realizado com sucesso</h4>
                    <h4 class="modal-title step-4" data-step="4">Falha</h4>
                </div>
                <div id="corpoImagens" class="modal-body step step-1">

                </div>
                <div id="footerImagens" class="modal-footer" >
                    <form id="formImg" method="post" class="step step-1">
                        <input name="caminho" id="caminhoPasta" type="hidden">
                        <input name="id" id="idAlertaImg" type="hidden">
                        <input name="numImgs" id="numImgs" type="hidden">
                        <label id="numImgLivres" class="step step-1" style="margin-top: 2%; margin-right: 2%"></label>
                        <!-- <input id="input-1" type="file" class="file"> -->
                        <div class="form-group">
                            <input id="inputImagens" type="file" class="file-loading" accept="image/*" multiple name="image[]" data-show-preview="false">              
                        </div>   
                    </form>
                    <div style="margin-top: 1%; float: right">
                        <button id="botaoEnviar" type="button" class="btn btn-default step step-1">Enviar imagens</button>
                        <button id="delImg" type="button" class="btn btn-default step step-1">Excluir imagem</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal deletar -->
    <div class="modal fade multi-step" id="modalDeletar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title step-1" data-step="1">Excluir Alerta</h4>
                    <h4 class="modal-title step-2" data-step="2">Exlusão realizada com sucesso</h4>
                    <h4 class="modal-title step-3" data-step="3">Falha</h4>
                </div>
                <div class="modal-body step step-1" align="center">
                    Deseja mesmo exluir?
                </div>

                <div class="modal-footer">
                    <input value="Sim" type="button" class="btn btn-default step step-1" data-step="1" id="deletar-sim">
                    <button type="button" class="btn btn-default step step-1" data-step="1" data-dismiss="modal">Não</button>
                    <button class="btn btn-primary step step-2" data-step="2" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-primary step step-3" data-step="3" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL Editar-->
    <div class="modal fade multi-step" id="modalEditar" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title step-1" data-step="1">Atualizar Alerta</h4>
                    <h4 class="modal-title step-2" data-step="2">Atualização realizada com sucesso</h4>
                    <h4 class="modal-title step-3" data-step="3">Falha</h4>
                </div>
                <form id="formEditar" method="POST" class="formAlertUser">
                    <div class="modal-body step step-1" data-step="1">

                        <div class="form-group has-feedback" value="teste">
                            <label>Descrição:</label>     					
                            <textarea class="form-control"; style="width: 555px; margin: 0px; height: 130px;resize: none;"  rows="5" placeholder="Breve descrição do alerta" id="descTextEditar" name="desc" required></textarea>

                        </div>
                        
                        <div class="form-group">
                            <label>Tipo de Alerta:</label><br>
                            <select id="tipoAlertaEditar" name="tipoAlerta" class="form-control select tipoAlerta" >

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cidade:</label>
                            <input id="cidadeEditar" style="width: 100%" type="text" maxlength="30" class="form-control input" placeholder="Cidade onde está acontecendo" name="cidade">
                        </div>
                        <div class="form-group">
                            <label>Bairro:</label>
                            <input style="width: 100%" class="form-control" maxlength="50" placeholder="Bairro" id="bairroEditar" name="bairro"></input>
                        </div>
                        <div class="form-group">
                            <label>Rua:</label>
                            <input style="width: 100%" class="form-control" maxlength="50" placeholder="Rua" id="ruaEditar" name="rua"></input>

                        </div>

                        <input id="id" name="id" type="hidden" value="">
                        
                    </div>                   
                    <div class="modal-footer">
                        <button id="simEditar" type="button" class="btn btn-default step step-1" data-step="1">Confirmar</button>
                        <button type="button" class="btn btn-default step step-1" data-step="1" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary step step-2" data-step="2" data-dismiss="modal">Fechar</button>
                        <button class="btn btn-primary step step-3" data-step="3" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <!-- Modal Cadastrar-->
    <div class="modal fade multi-step" id="modalCadastrar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title step-1" data-step="1">Novo Alerta</h4>
                    <h4 class="modal-title step-2" data-step="2">Cadastro realizado com sucesso</h4>
                    <h4 class="modal-title step-3" data-step="3">Falha</h4>
                </div>
                <form id="formCriar" method="post" class="formAlertUser" enctype="multipart/form-data">
                    <div class="modal-body step step-1" data-step="1">
                        <div class="form-group">
                            <label>Descrição:</label>
                            <input id="status" type="hidden" name="status" value="Em validação">
                            <input id="idUsuario" type="hidden" name="idUsuario" value=<?php echo $_SESSION['user']->getId(); ?>>                            
                            <textarea style="width:100%; resize: none;" class="form-control" rows="5" placeholder="Breve descrição do alerta" name="desc" id="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fotos:</label>
                            <!-- <input type ="file" name="image" /> -->
                            <input id="fileCadastrar" type="file" class="file-loading" accept="image/*" multiple name="image[]" data-show-preview="false">
                        </div>
                        

                        <div class="form-group">
                            <label>Tipo de Alerta:</label><br>
                            <select id="tipoAlerta" name="tipoAlerta" class="form-control select tipoAlerta" >
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Cidade:</label>
                            <input style="width: 100%;" type="text" maxlength="30" class="form-control input" placeholder="Cidade onde está acontecendo" name="cidade">
                        </div>

                        <div class="form-group">
                            <label>Bairro:</label>
                            <input style="width: 100%;" class="form-control" maxlength="50" placeholder="Bairro" name="bairro"></input>
                        </div>

                        <div class="form-group">
                            <label>Rua:</label>
                            <input style="width: 100%;" class="form-control" maxlength="50" placeholder="Rua" name="rua"></input>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input id="simCadastrar" type="button" value="Cadastrar" class="btn btn-default step step-1" data-step="1">
                        <button type="button" class="btn btn-default step step-1" data-step="1" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary step step-2" data-step="2" data-dismiss="modal">Fechar</button>
                        <button class="btn btn-primary step step-3" data-step="3" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div>
                <h2>Manipulação de Alertas</h2><br>
                <table id="tableUser" class="table table-condensed">
                    <thead>
                        <tr bgcolor="#3a4857">
                            <th>Status</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Cidade</th>
                            <th>Alerta</th>
                            <th style="width:5%"></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="corpoTabela">

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

    <!--- formValidation.io jQuery -->
    <script src="../../js/plugin/formValidation.min.js"></script>
    <script src="../../js/plugin/formValidation-bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/plugin/bootstrap.min.js"></script>


    <!-- Data Tables JQuery -->
    <script src="../../js/plugin/jquery.dataTables.min.js"></script>
    <script src="../../js/plugin/dataTables.bootstrap.min.js"></script>
    <script src="../../js/plugin/dataTables.buttons.min.js"></script>

    <!-- Data Tables Buttons -->
    <script src="../../js/plugin/dataTables.buttons.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/plugin/freelancer.js"></script>

    <script src="../../js/plugin/fileinput.min.js" ></script>    
    <script src="../../js/plugin/locales/pt-BR.js"></script>

    <script src="../../js/custom/mod05/enviarAlertasUser.js"></script>
    <script src="../../js/plugin/multi-step-modal.js"></script>

</body>
</html>
