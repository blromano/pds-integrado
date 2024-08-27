<?php
require_once("dao/UnidadeMedidaDAO.php");

$unidadesMedidas = new UnidadeMedidaDAO();
$unidades_medidas = $unidadesMedidas->listarTodos();
$row_count = $unidadesMedidas->verificarQuantidadeTiposAlimentos();
session_start();

?>

<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
                <div class="container-fluid">
                        <!-- <img class="position-absolute h-75 d-inline-block" src="resources/images/logo-texto.png" alt="logo_texto"> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <button class='btn btn-outline-light' onclick='openNav()'>Menu</button>
                        <ul class="navbar-nav ml-auto active-hover">
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Rede_Social"> Rede Social </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Treinos"> Treinamento </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Plano_Alimentar"> Nutrição </a>
                            </li>
                            <li class="nav-item clearfix border mx-2"></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png" style="width: 2rem">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">

                                    <a class="dropdown-item" href="./view.php?mod=Usuarios">perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btn-danger"  href="#">Sair</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <br>
        <h2 class="container"> Insira as Unidades de Medida! </h2>

        <br>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th hidden="true">#</th>
                        <th>Nome</th>
                        <th>Abreviação</th>

                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					if ($row_count > 0) {
                    while ($row = $unidades_medidas->fetch()) {
                        ?>
                        <tr>
                            <th hidden="true"><?= $row["UMN_CODIGO"] ?></th>
                            <td><?= $row["UMN_NOME"] ?></td>
                            <td><?= $row["UMN_ABREVIATURA"] ?></td>
                            <td> 
                                <button class="btn btn-link" type="button" data-toggle="modal" data-target="#editar<?= $row["UMN_CODIGO"] ?>"><i class="fa fa-pencil"></i></button>              
                                <button class="deleta btn btn-link" type="button" data-toggle="modal" data-target="#excluir<?= $row["UMN_CODIGO"] ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                    <!-- INICIO MODAL EDITA -->
                    <div class="modal fade" id="editar<?= $row["UMN_CODIGO"] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Unidade de Medida</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="?mod=fnutricionais&sub=unidade_edita" method="POST">
                                        <div class="form-group">
                                            Nome:
                                            <input type="text" class="form-control" id="nome" placeholder="" maxlength="50" required="true" name="nome" value="<?php if(isset( $_SESSION["nomeed"])){echo $_SESSION["nomeed"]; }else{ echo $row["UMN_NOME"];}?>">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $row["UMN_CODIGO"] ?>">
                                        </div>
                                        <div class="form-group">
                                            Abreviação:
                                            <input type="text" class="form-control" id="abreviatura" placeholder="" maxlength="10" required="true" name="abreviatura" value="<?php if(isset( $_SESSION["abreviaturaed"])){echo $_SESSION["abreviaturaed"]; }else{ echo $row["UMN_ABREVIATURA"];}?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM MODAL EDITA -->
                    
                <!-- INICIO MODAL EXCLUI -->
                <div class="modal fade" id="excluir<?= $row["UMN_CODIGO"] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Excluir Unidade de Medida</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="?mod=fnutricionais&sub=unidade_exclui" method="POST">
                                    <p>Deseja realmente excluir esta unidade de medida?</p>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $row["UMN_CODIGO"] ?>">
                                    
                                    <button type="submit" class="btn btn-primary">Sim</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div> 
				
                    <?php
                    }
                } else {
                    ?>

                    <script>
                        $(function () {
                            $('#vasio').modal('show');
                            
                        });
                    </script>

                    
                    <?php
                }
                ?>
                </tbody>
            </table>
			
			<!-- INICIO MODAL PARA NAO EXISTEM TIPOS DE ALIMENTOS CADASTRADOS-->
                <div class="modal fade" id="vasio">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Unidade de Medida</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                               <span> Não existe nenhuma unidade de medida cadastrada.</span>
								<span>Por favor, clique no botão "Cadastrar Unidade de Medida" 
								para cadastrar sua primeira unidade.</span>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- FIM MODAL PARA NAO EXISTEM TIPOS DE ALIMENTOS CADASTRADOS-->


            <button  type="button" class=" btn btn-primary pull-right" data-toggle="modal" data-target="#inserir">
                Cadastrar Unidade de Medida
            </button>

             <!-- Inicio modal CADASTRAR UNIDADE DE MEDIDA -->
            <div class="modal" tabindex="-1" id="inserir" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Inserir Unidade de Medida</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="?mod=fnutricionais&sub=unidade_cadastra" enctype="multipart/form-data">
				<div class="form-group">
                                    <label for="nomeunidade">Nome:</label>
                                    <input type="text" class="form-control" name="UMN_NOME" maxlength="50" id="UMN_NOME" value="<?php if(isset( $_SESSION["nome"])){echo $_SESSION["nome"]; }?>" required="true">
				</div>
				<div class="form-group">
                                    <label for="abrevunidade">Abreviaçao:</label>
                                    <input type="text" name="UMN_ABREVIATURA" maxlength="10" class="form-control" id="UMN_ABREVIATURA" value="<?php if(isset( $_SESSION["abreviatura"])){echo $_SESSION["abreviatura"]; }?>" required="true">
				</div>
                                    <input name="id" type="hidden" class="form-control" id="id-curso" value="">
                                <div class="modal-footer">
                                    <button type="submit" id="CadUMN" name="CadUMN" class="btn btn-primary" >Cadastrar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           <!-- FIM modal CADASTRAR UNIDADE DE MEDIDA -->
            
            <!-- INICIO AVISO EFETUAMENTO DE CADASTRO -->
            <div class="modal fade" id="cadastro">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Unidade de Medida</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                            
                           Unidade de medida cadastrada com sucesso.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM AVISO EFETUAMENTO DE CADASTRO -->

            <!-- INICIO AVISO DE CADASTRO JÁ EXISTENTE-->
            <div class="modal fade" id="existente">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Unidade de Medida</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                            
                           Essa unidade de medida já foi cadastrada.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM AVISO DE CADASTRO JÁ EXISTENTE-->
            
            <!-- INICIO AVISO DE CADASTRO JÁ EXISTENTE-->
            <div class="modal fade" id="existenteed">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Unidade de Medida</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                            
                           Essa unidade de medida já foi cadastrada.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM AVISO DE CADASTRO JÁ EXISTENTE-->			


            
            
            <!-- INICIO AVISO EFETUAMENTO DE EDIÇÃO -->
            <div class="modal fade" id="edicao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Unidade de Medida</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                           
                            Unidade de medida editada com sucesso.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM AVISO EFETUAMENTO DE EDIÇÃO -->
            
            
            

            
            
            <!-- INICIO AVISO EFETUAMENTO DE CADASTRO -->
            <div class="modal fade" id="exclusao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Unidade de Medida</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            Unidade de medida excluida com sucesso.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM AVISO EFETUAMENTO DE EXCLUSÃO -->
			
			            <?php
                 
            $emodal = 0;
            $emodal = isset($_SESSION["emodal"]) ? $_SESSION["emodal"] : "";
             
             if($emodal==1){
  
            ?>
  
              <script>
                        $(function () {
                            $('#cadastro').modal('show');
                        });
                    </script>  
               
                <?php
                session_destroy();
                $emodal = 0;
                 } else if($emodal==2){
               
                ?> 
                     <script>
                        $(function () {
                            $('#existente').modal('show');
                        });
                    </script>  
                    
                    
                    <?php
                    $emodal = 0;
                 } else if($emodal== 4){
  
            ?>
  
              <script>
                        $(function () {
                            $('#edicao').modal('show');
                        });
                    </script>  
               
                <?php
                    session_destroy();
                    $emodal = 0;
                 } else if($emodal==5){
               
                ?> 
                     <script>
                        $(function () {
                            $('#existenteed').modal('show');
                        });
                    </script>  
                    
                    
                    <?php
                    $emodal = 0;
                 } else if($emodal==7){
               
                ?> 
                     <script>
                        $(function () {
                            $('#exclusao').modal('show');
                        });
                    </script>  
                    
                    
                    <?php
                    $emodal = 0;
                 } 
                ?>
            
            
            
            
            
            

        </div>

    </div>



</body> 
</html>


