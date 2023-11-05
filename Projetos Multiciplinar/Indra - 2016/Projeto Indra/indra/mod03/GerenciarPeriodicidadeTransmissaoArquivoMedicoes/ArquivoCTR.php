<?php

include_once "../../../dao/mod03/PcdDao.php";
include_once "../../../modelo/mod03/Pcd.php"; 
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

if ((isset($_POST['pcd']))&&(isset($_POST['botao']))) {
    if($_POST['botao'] == "atualizar"){
        

        ?>
            
            <div class="modal-body" >
                <form id="formAAP" method="POST" action="ArquivoCTR.php">
                    <div class="form-group">
                        <label>Periodicidade</label>
                        <input type="text" class="form-control input" name="periodicidade" value="">
                        <input type="hidden" name="operacao" value="atualizar">
                        <input type="hidden" name="pcd" value="<?=$_POST['pcd']?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Alterar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
            
            <!-- formValidation.io javaScript -->
            <script src="../../../js/plugin/formValidation.min.js"></script>
            <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>
            <!-- js sensores -->
            <script src="../../../js/custom/mod03/arquivoValidation.js"></script> 

            
        <?php
        } else if ($_POST['botao'] == "atualizar2"){
        ?>
            <div class='modal-body'>
                <form id="formAAP2" method="POST" action="ArquivoCTR.php">
                    <div class="form-group">
                        <label>Periodicidade</label>
                        <input type="text" class="form-control input" name="periodicidade2" value="">
                        <input type="hidden" name="operacao" value="atualizar2">
                        <input type="hidden" name="pcd" value="<?=$_POST['pcd']?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Alterar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
            
                        
            <!-- formValidation.io javaScript -->
            <script src="../../../js/plugin/formValidation.min.js"></script>
            <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>
            <!-- js sensores -->
            <script src="../../../js/custom/mod03/arquivoValidation.js"></script> 

        <?php 
        } else if ($_POST['botao'] == "excluir"){
        ?>
            <div class='modal-body'>
                <form id="formE" method="POST" action="ArquivoCTR.php">
                    <div class="form-group">
                        <label>Você realmente deseja excluir a periodicidade de transmissão?</label>
                        <br />
                        <input type="hidden" name="operacao" value="excluir">
                        <input type="hidden" name="pcd" value="<?=$_POST['pcd']?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Excluir</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
            
                        
           <!-- formValidation.io javaScript -->
            <script src="../../../js/plugin/formValidation.min.js"></script>
            <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>
            <!-- js sensores -->
            <script src="../../../js/custom/mod03/arquivoValidation.js"></script> 

        <?php 
        
    }
    
}

if (isset($_POST['operacao'])) {
 
    if ($_POST['operacao'] == "atualizar"){
        
        PcdDao::AlterarPeriodicidadeArquivo(new Pcd($_POST['pcd'], $_POST['periodicidade']));
        
    } else if ($_POST['operacao'] == "atualizar2"){

        PcdDao::AlterarPeriodicidadeArquivo(new Pcd($_POST['pcd'], $_POST['periodicidade2']));
               
    }else if ($_POST['operacao'] == "excluir"){

        PcdDao::AlterarPeriodicidadeArquivo(new Pcd($_POST['pcd'], 0));
         
    }
    
   header('location: PeriodicidadeArquivo.php');
    
}



function GerarTabelaArquivos(){

    foreach (PcdDao::Listar() as $pcd):
        $estado = '';
        if ($pcd['PCD_STATUS_FUNCIONAMENTO'] == 1){
            $estado = "Habilitado";
        }else if($pcd['PCD_STATUS_FUNCIONAMENTO'] == 0){
            $estado = "Desabilitado";
        }
        ?>
        <tr>
            <td><?php echo $pcd['PCD_ID'] ?></td>
            <td><?php echo $pcd['PCD_LATITUDE'] ?></td>
            <td><?php echo $pcd['PCD_LONGITUDE'] ?></td>
            <td><?php echo $estado ?></td>
            <td><?php echo $pcd['PCD_PERIODICIDADE_ARQUIVO'] ?></td>
            
            <?php
                if(($estado == "Habilitado")&&($pcd['PCD_PERIODICIDADE_ARQUIVO'] >= 1)){
            ?>
                <td><button class="btn btn-primary " data-toggle="modal"  data-target="#modal-edit" pcd="<?php echo $pcd['PCD_ID'] ?>" botao="atualizar">Editar</button></td>
                <td><button class="btn btn-primary " data-toggle="modal" data-target="#modal-exc" pcd="<?php echo $pcd['PCD_ID'] ?>" botao="excluir">Excluir</button></td>
            <?php
                }else if(($estado == "Habilitado")&&($pcd['PCD_PERIODICIDADE_ARQUIVO'] == 0)){
            ?>
                <td class="elemento-escondido">Nada de Importante aqui</td>
                <td><button class="btn btn-primary btn-table " data-toggle="modal" data-target="#modal-edit2" pcd="<?php echo $pcd['PCD_ID'] ?>" botao="atualizar2">Criar Priodicidade</button></td>
            <?php
                }else if($estado == "Desabilitado"){
            ?> 
              <td >A PCD está desativada.</td>
              <td >Para ativá-la, <a href=""> clique aqui. </a></td>
            <?php
                }
            ?>
        </tr>

        <?php
    endforeach;
                               
}

