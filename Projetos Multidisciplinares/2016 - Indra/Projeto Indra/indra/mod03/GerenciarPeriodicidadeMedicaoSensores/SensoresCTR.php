<?php

include_once '../../../dao/mod03/ConectarBD.php';
include_once '../../../dao/mod03/SensoresDAO.php';
include_once '../../../dao/mod03/SensoresInstaladosSensores.php';
include_once '../../../modelo/mod03/Sensores.php';
include_once '../../../modelo/mod03/Justificativa.php';
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

if (isset($_GET['id_pcd'])) {
    
   
    $_SESSION['idPcd'] = $_GET['id_pcd'];
    
    header("location: GerenciarSensores.php");
}

if ((isset($_POST['id-sensor']))&&(isset($_POST['botao']))) {
    if(($_POST['botao']) == "atualizar"){
        ?>
            
            <div class="modal-body" >
                <form id="formAS" method="POST" action="SensoresCTR.php">
                    <div class="form-group">
                        <label>Periodicidade</label>
                        <input type="text" class="form-control input" name="periodicidade" value="<?php echo SensoresDAO::BuscaPeriodicidade($_POST['id-sensor'])[0] ?>">
                        <input type="hidden" name="operacao" value="atualizar">
                        <input type="hidden" name="id-sensor" value="<?=$_POST['id-sensor']?>">
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
            <script src="../../../js/custom/mod03/sensoresValidation.js"></script>
        <?php
        } else if (($_POST['botao']) == "habilitar"){
        ?>
            <div class='modal-body'>
                <form id="formH" method="POST" action="SensoresCTR.php">
                    <div class="form-group">
                        <label>Periodicidade</label>
                        <input type="text" class="form-control input" name="periodicidadeInicial" value="<?php echo SensoresDAO::BuscaPeriodicidade($_POST['id-sensor'])[0] ?>">
                        <br />
                        <label>Justificativa</label>
                        <input type="text" class="form-control justificativa-sensor input-lg" rows="3" name="justificativaHabilitar" value="">
                        <input type="hidden" name="operacao" value="habilitar">
                        <input type="hidden" name="id-sensor" value="<?=$_POST['id-sensor']?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Habilitar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
            
                        
            <!-- formValidation.io javaScript -->
            <script src="../../../js/plugin/formValidation.min.js"></script>
            <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>
            <!-- js sensores -->
            <script src="../../../js/custom/mod03/sensoresValidation.js"></script>

        <?php    
        } else if (($_POST['botao']) == "desabilitar"){
        ?>
            <div class='modal-body'>
                <form id="formD" method="POST" action="SensoresCTR.php">
                    <div class="form-group">
                        <label>Justificativa</label>
                        <input type="text" class="form-control justificativa-sensor input-lg" rows="3" name="justificativaDesabilitar" value="">
                        <input type="hidden" name="operacao" value="desabilitar">
                        <input type="hidden" name="id-sensor" value="<?=$_POST['id-sensor']?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Desabilitar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
            
            
            <!-- formValidation.io javaScript -->
            <script src="../../../js/plugin/formValidation.min.js"></script>
            <script src="../../../js/plugin/formValidation-bootstrap.min.js"></script>
            <!-- js sensores -->
            <script src="../../../js/custom/mod03/sensoresValidation.js"></script>

        <?php    
        }
}

if (isset($_POST['operacao'])) {
    date_default_timezone_set('America/Sao_Paulo');
    if ($_POST['operacao'] == "atualizar"){
        
        SensoresDAO::AlterarPeriodicidadeSensor(new Sensores($_SESSION['idPcd'], SensoresInstaladosSensores::BuscarSensoresInstaladosSensores($_SESSION['idPcd'])[1], $_POST['periodicidade'], $_POST['id-sensor'], SensoresInstaladosSensores::BuscarSensoresInstaladosSensores($_SESSION['idPcd'])[2] ));
        
    } else if ($_POST['operacao'] == "habilitar"){

        SensoresDAO::AlterarEstadoSensor(new Sensores($_SESSION['idPcd'], SensoresInstaladosSensores::BuscarSensoresInstaladosSensores($_SESSION['idPcd'])[1], $_POST['periodicidadeInicial'], $_POST['id-sensor'], 1));
        SensoresDAO::JustificativaAlteracao(new Justificativa(0, 1, $_POST['justificativaHabilitar'], $_POST['id-sensor']));
            
        
    }else if ($_POST['operacao'] == "desabilitar"){

        SensoresDAO::AlterarEstadoSensor(new Sensores($_SESSION['idPcd'], SensoresInstaladosSensores::BuscarSensoresInstaladosSensores($_SESSION['idPcd'])[1], 0, $_POST['id-sensor'], 0));
        SensoresDAO::JustificativaAlteracao(new Justificativa(0, 0, $_POST['justificativaDesabilitar'], $_POST['id-sensor']));
        
    }
    
   header('location: GerenciarSensores.php');
    
}




function GerarTabelaSensores($id_pcd) {
        
    $estado = "";
        
        foreach (SensoresDAO::ListarSensores($id_pcd) as $value):
            
            if($value['estado'] == 1){
                $estado = 'Habilitado';
            }else if($value['estado'] == 0){
                $estado = 'Desabilitado';
            }
        ?>
        <tr>
            <td><?php echo $value["id_sensor"] ?></td>
            <td><?php echo $value["tipo_sensor"] ?></td>
            <td><?php echo $value["period_medicao"] ?></td>
            <td><?php echo $estado ?></td>
            <?php   
                if($value['estado'] == 0){
                ?>  
                    <td class="elemento-escondido"> Nada de importante aqui</td>
                    <td><button class="btn btn-primary btn-table"  data-toggle="modal" data-target="#modal-habilitar" sensor="<?php echo $value['id_sensor'] ?>" botao="habilitar">Alterar Estado</button></td>
                    
                <?php
                }else if($value['estado'] == 1){
                ?>
                    <td><button class="btn btn-primary btn-table"  data-toggle="modal" data-target="#modal-edit" sensor="<?php echo $value['id_sensor'] ?>" botao="atualizar">Alterar Periodicidade</button></td>
                    <td><button class="btn btn-primary btn-table"  data-toggle="modal" data-target="#modal-desabilitar" sensor="<?php echo $value['id_sensor'] ?>" botao="desabilitar">Alterar Estado</button></td>
                <?php
                }
            ?>
        </tr>
        <?php
        endforeach;
    
}



 