<?php

require_once("dao/UnidadeMedidaDAO.php");
$unidadesMedidas = new UnidadeMedidaDAO();
$unidades_medidas = $unidadesMedidas->listarTodos();

require_once("dao/MeuAlimentoDAO.php");
$meusAlimentos = new MeuAlimentoDAO();
$meus_alimentos = $meusAlimentos->listarTodos();
$Meus_Aimentos = $meusAlimentos->inner();
$row_count = $meusAlimentos->verificarQuantidadeMeusAlimentos();

require_once("dao/TiposAlimentosDAO.php");
$tiposAlimentos = new TiposAlimentosDAO();
$tipos_alimentos = $tiposAlimentos->listarTodos();
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
        <br>
        <h2 class="container"> Gerenciar Meus Alimentos! </h2>

        <br>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th hidden="true">#</th>
                        <th>Nome</th>
                        <th>Tipo Alimento</th>
                        <th>Informações Nutricionais</th>
                        <th>Porção</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($row_count > 0) 
                        {
                            while ($row = $Meus_Aimentos->fetch()) 
                            {                        
                                ECHO'<tr>
                                    <th hidden="true">'.$row["MEU_CODIGO"].'</th>
                                    <td>'.$row["MEU_NOME"].'</td>
                                    <td>'.$row["NOME_TPA"].'</td>
                                    <td>Proteina:'.$row["MEU_PROTEINAS"].'g. Calorias:'.$row["MEU_CALORIAS"].'kc. Sódio:'.$row["MEU_SODIO"].'mg. Gordura Trans:'.$row["MEU_GORDURA_TRANS"].'g. Gordura Total:'.$row["MEU_GORDURA_TOTAL"].'g. Gordura Saturada:'.$row["MEU_GORDURA_SATURADA"].'g. Carboidratos:'.$row["MEU_CARBOIDRATOS"].'g. Fibras:'.$row["MEU_FIBRAS"].'g.</td>
                                    <td>'.$row["MEU_PORCAO"].' Gramas</td>
                                    <td> 
                                        <button class="btn btn-link" type="button" data-toggle="modal" data-target="#editar" onclick="set(\''.$row['MEU_CODIGO'].'\',\''.$row['MEU_NOME'].'\', \''.$row['MEU_PROTEINAS'].'\', \''.$row['MEU_CALORIAS'].'\', \''.$row['MEU_SODIO'].'\', \''.$row['MEU_GORDURA_TRANS'].'\', \''.$row['MEU_GORDURA_TOTAL'].'\', \''.$row['MEU_GORDURA_SATURADA'].'\', \''.$row['MEU_CARBOIDRATOS'].'\', \''.$row['MEU_FIBRAS'].'\', \''.$row['MEU_PORCAO'].'\', \''.$row['FK_UNIDADES_MEDIDAS_NUTRICIONAIS_UMN_CODIGO'].'\', \''.$row['FK_TIPOS_ALIMENTOS_TPA_CODIGO'].'\')"><i class="fa fa-pencil"></i></button>              
                                        <button class="deleta btn btn-link" type="button" data-toggle="modal" data-target="#excluir" onclick="sett(\''.$row['MEU_CODIGO'].'\')" ><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>';
                            }
                        }
                        else 
                        {

                        ECHO"<script>
                        $(function () {
                            $('#vasio').modal('show');
                            
                        });
                    </script>";

                    
                }
                ?>
                     </tbody>
            </table>
                    <!-- INICIO MODAL EDITA -->
                    <div class="modal" tabindex="-1" id="editar" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Meu Alimento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="form-group" action="?mod=fnutricionais&sub=meu_edita" enctype="multipart/form-data"> 
                                        <table>
                                            <tr>
                                                <th colspan="4">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" id="id" name="id" value="">
                                                        <label for="nomeunidade">Nome:</label>
                                                        <input type="text" class="form-control" name="MEU_NOME" maxlength="100" id="MEU_NOME" value="<?php if(isset( $_SESSION["nomeed"])){echo $_SESSION["nomeed"];}else{}?>" required="true">
                                                    </div>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Proteínas:</label>
                                                        <input type="number" class="form-control" name="MEU_PROTEINAS" maxlength="10" id="MEU_PROTEINAS" value="<?php if(isset( $_SESSION["proteinased"])){echo $_SESSION["proteinased"];}else{}?>">
                                                    </div>
                                                </th> 

                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Calorias:</label>
                                                        <input type="number" class="form-control" name="MEU_CALORIAS" maxlength="10" id="MEU_CALORIAS" value="<?php if(isset( $_SESSION["caloriased"])){echo $_SESSION["caloriased"];} else{}?>">
                                                    </div>
                                                </th>

                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Sódio:</label>
                                                        <input type="number" class="form-control" name="MEU_SODIO" maxlength="10" id="MEU_SODIO" value="<?php if(isset( $_SESSION["sodioed"])){echo $_SESSION["sodioed"];} else{}?>">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Gordura Trans:</label>
                                                        <input type="number" class="form-control" name="MEU_GORDURA_TRANS" maxlength="10" id="MEU_GORDURA_TRANS" value="<?php if(isset( $_SESSION["gordura_transed"])){echo $_SESSION["gordura_transed"];} else{}?>">

                                                    </div>
                                                </th>
                                            </tr>

                                            <tr>        
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Gordura Total:</label>
                                                        <input type="number" class="form-control" name="MEU_GORDURA_TOTAL" maxlength="10" id="MEU_GORDURA_TOTAL" value="<?php if(isset( $_SESSION["gordura_totaled"])){echo $_SESSION["gordura_totaled"]; }else{}?>">

                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Gordura Satu.:</label>
                                                        <input type="number" class="form-control" name="MEU_GORDURA_SATURADA" maxlength="10" id="MEU_GORDURA_SATURADA" value="<?php if(isset( $_SESSION["gordura_saturadaed"])){echo $_SESSION["gordura_saturadaed"]; }else{}?>">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Carboidratos:</label>
                                                        <input type="number" class="form-control" name="MEU_CARBOIDRATOS" maxlength="10" id="MEU_CARBOIDRATOS" value="<?php if(isset( $_SESSION["carboidratosed"])){echo $_SESSION["carboidratosed"]; } else{}?>">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Fibras:</label>
                                                        <input type="number" class="form-control" name="MEU_FIBRAS" maxlength="10" id="MEU_FIBRAS" value="<?php if(isset( $_SESSION["fibrased"])){echo $_SESSION["fibrased"];}else{}?>">
                                                    </div>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="nomeunidade">Valor da Porção:</label>
                                                        <input type="number" class="form-control" name="MEU_PORCAO" maxlength="10" id="MEU_PORCAO" value="<?php if(isset( $_SESSION["porcaoed"])){echo $_SESSION["porcaoed"];} else{}?>">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Unidade Medida:</label>
                                                        <select class="form-control" name="UNIDADE_MEDIDA"id="UNIDADE_MEDIDA">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Tipo de Alimento:</label>
                                                        <select class="form-control" name="TIPO_ALIMENTO" id="TIPO_ALIMENTO">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                </th>
                                            </tr>
                                        </table>
                                            <div class="modal-footer">
                                                <button type="submit" id="CadUMN" name="CadMEU" class="btn btn-primary" >Editar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM MODAL EDITA -->
                    
                    
           
                <!-- INICIO MODAL EXCLUI -->
                <div class="modal fade" id="excluir">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Excluir Meu Alimento</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="?mod=fnutricionais&sub=meu_exclui" method="POST">
                                    <p>Deseja realmente excluir este Alimento?</p>
                                    <input type="hidden" class="form-control" id="viado" name="id" value="">
                                    
                                    <button type="submit" class="btn btn-primary">Sim</button>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> 
		<!-- FIM MODAL EXCLUI -->		


            <button  type="button" class=" btn btn-primary pull-right" data-toggle="modal" data-target="#inserir">
                Cadastrar Novo Alimento
            </button>
                
                        
                
                
                <!-- Inicio modal CADASTRAR MEUS ALIMENTOS -->
            <div class="modal" tabindex="-1" id="inserir" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Inserir Novo Alimento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form-group" action="?mod=fnutricionais&sub=meu_cadastra" enctype="multipart/form-data"> 
                                <table>
                                    <tr>
                                        <th colspan="4">
                                            <div class="form-group">
                                                <label for="nomeunidade">Nome:</label>
                                                <input type="text" class="form-control" name="MEU_NOME" maxlength="100" id="MEU_NOME" value="<?php if(isset( $_SESSION["nome"])){echo $_SESSION["nome"]; }?>" required="true">
                                            </div>
                                        </th>
                                    </tr>
                                    
                                    <tr>
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Proteínas:</label>
                                                <input type="number" class="form-control" name="MEU_PROTEINAS" maxlength="10" id="MEU_PROTEINAS" value="<?php if(isset( $_SESSION["proteinas"])){echo $_SESSION["proteinas"]; }?>">
                                            </div>
                                        </th> 
                                        
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Calorias:</label>
                                                <input type="number" class="form-control" name="MEU_CALORIAS" maxlength="10" id="MEU_CALORIAS" value="<?php if(isset( $_SESSION["calorias"])){echo $_SESSION["calorias"]; }?>">
                                            </div>
                                        </th>
                                        
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Sódio:</label>
                                                <input type="number" class="form-control" name="MEU_SODIO" maxlength="10" id="MEU_SODIO" value="<?php if(isset( $_SESSION["sodio"])){echo $_SESSION["sodio"]; }?>">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Gordura Trans:</label>
                                                <input type="number" class="form-control" name="MEU_GORDURA_TRANS" maxlength="10" id="MEU_GORDURA_TRANS" value="<?php if(isset( $_SESSION["gordura_trans"])){echo $_SESSION["gordura_trans"]; }?>">

                                            </div>
                                        </th>
                                    </tr>
                                    
                                    <tr>        
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Gordura Total:</label>
                                                <input type="number" class="form-control" name="MEU_GORDURA_TOTAL" maxlength="10" id="MEU_GORDURA_TOTAL" value="<?php if(isset( $_SESSION["gordura_total"])){echo $_SESSION["gordura_total"]; }?>">

                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Gordura Satu.:</label>
                                                <input type="number" class="form-control" name="MEU_GORDURA_SATURADA" maxlength="10" id="MEU_GORDURA_SATURADA" value="<?php if(isset( $_SESSION["gordura_saturada"])){echo $_SESSION["gordura_saturada"]; }?>">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Carboidratos:</label>
                                                <input type="number" class="form-control" name="MEU_CARBOIDRATOS" maxlength="10" id="MEU_CARBOIDRATOS" value="<?php if(isset( $_SESSION["carboidratos"])){echo $_SESSION["carboidratos"]; }?>">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Fibras:</label>
                                                <input type="number" class="form-control" name="MEU_FIBRAS" maxlength="10" id="MEU_FIBRAS" value="<?php if(isset( $_SESSION["fibras"])){echo $_SESSION["fibras"]; }?>">
                                            </div>
                                        </th>
                                    </tr>
                                    
                                    <tr>
                                        <th>
                                            <div class="form-group">
                                                <label for="nomeunidade">Valor da Porção:</label>
                                                <input type="number" class="form-control" name="MEU_PORCAO" maxlength="10" id="MEU_PORCAO" value="<?php if(isset( $_SESSION["porcao"])){echo $_SESSION["porcao"]; }?>">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Unidade Medida:</label>
                                                <select class="form-control" id="UNIDADE_MEDIDA" name="UNIDADE_MEDIDA">
                                                    <?php while ($show = $unidades_medidas->fetch()){?>
                                                    <option><?= $show["UMN_NOME"]; }?></option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Tipo de Alimento:</label>
                                                <select class="form-control" id="TIPO_ALIMENTO" name="TIPO_ALIMENTO">
                                                    <?php while ($wow = $Meus_Aimentos->fetch()){?>
                                                    <option><?= $wow["FK_TIPOS_ALIMENTOS_TPA_CODIGO"]; }?></OPTION><span><?= $wow["TPA_NOME"]?></span>
                                                </select>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                                        <input name="id" type="hidden" class="form-control" id="id-curso" value="">
                                    <div class="modal-footer">
                                        <button type="submit" id="CadUMN" name="CadMEU" class="btn btn-primary" >Cadastrar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           <!-- FIM modal CADASTRAR MEUS ALIMENTOS -->
           
           
             
            
            <!-- INICIO AVISO EFETUAMENTO DE CADASTRO -->
            <div class="modal fade" id="cadastro">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Meu Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                            
                           Alimento cadastrado com sucesso.
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
                            <h4 class="modal-title">Meu Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                            
                           Esse alimento já foi cadastrado.
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
                            <h4 class="modal-title">Meu Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                            
                           Esse alimento já foi cadastrado.
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
                            <h4 class="modal-title">Meu Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">                           
                            Alimento editado com sucesso.
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
                            <h4 class="modal-title">Meu Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            Alimento excluido com sucesso.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM AVISO EFETUAMENTO DE EXCLUSÃO -->
			
            
            			
		<!-- INICIO MODAL PARA NAO EXISTEM ALIMENTOS CADASTRADOS-->
                <div class="modal fade" id="vasio">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Meu Alimento</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                               <span> Não existe nenhum alimento cadastrado.</span>
                                <span>Por favor, clique no botão "Cadastrar Novo Alimento" 
                                para cadastrar seu primeiro Alimento.</span>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
		<!-- FIM MODAL PARA NAO EXISTEM ALIMENTOS CADASTRADOS-->

                
                
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

            <script>                        
                function set(ID, NOME, PROTEINA, CALORIA, SODIO, TRANS, TOTAL, SATURADA, CARBOIDRATO, FIBRA, PORCAO,UNIDADE, TIPO)
                {
                    document.getElementById('id').value = ID;
                    document.getElementById('MEU_NOME').value = NOME;	
                    document.getElementById('MEU_PROTEINAS').value = PROTEINA;
                    document.getElementById('MEU_CALORIAS').value = CALORIA;
                    document.getElementById('MEU_SODIO').value = SODIO;
                    document.getElementById('MEU_GORDURA_TRANS').value = TRANS;
                    document.getElementById('MEU_GORDURA_TOTAL').value = TOTAL;
                    document.getElementById('MEU_GORDURA_SATURADA').value = SATURADA;
                    document.getElementById('MEU_CARBOIDRATOS').value = CARBOIDRATO;
                    document.getElementById('MEU_FIBRAS').value = FIBRA;
                    document.getElementById('MEU_PORCAO').value = PORCAO;
                    document.getElementById('UNIDADE_MEDIDA').value = UNIDADE;
                    document.getElementById('TIPO_ALIMENTO').value = TIPO;
                }
                function sett(ID){
                    document.getElementById('viado').value = ID;
                }
            </script>
        </div>

    
  
    

        </header>
</body> 
</html>


