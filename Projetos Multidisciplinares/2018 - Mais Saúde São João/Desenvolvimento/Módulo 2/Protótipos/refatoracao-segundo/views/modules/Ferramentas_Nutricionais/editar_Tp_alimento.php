<?php
session_start();
require_once("dao/TiposAlimentosDAO.php");
require_once("modelo/TiposAlimentos.php");


if (!empty($_POST["nome"]) && !empty($_POST["id"])) {
 $NtiposAlimentos = new TiposAlimentos();
 $editar_Tp_alimento = new TiposAlimentosDAO();

    
    $select = $editar_Tp_alimento->listarTodos();

    $variavel = $select->fetchAll();
    $controle = 0;
    foreach ($variavel as $edita) {
        if ($edita['TPA_NOME'] == $_POST['nome']) {
            $controle = 1;
        }
    }


    if ($controle == 0) {
    
    $NtiposAlimentos->setNome($_POST["nome"]);
    $NtiposAlimentos->setidTipoAlimento($_POST["id"]);
    $editar_Tp_alimento = $editar_Tp_alimento->update($NtiposAlimentos);
       
    $emodal=4;
    $_SESSION['emodal']=$emodal;
    header ("location:?mod=fnutricionais&sub=tipo_alimento");
    } else {

        $emodal=5;
        $_SESSION['emodal']=$emodal;
        header ("location:?mod=fnutricionais&sub=tipo_alimento"); 
        
    }

} else {

        $emodal=6;
        $_SESSION['emodal']=$emodal;
        header ("location: ?mod=fnutricionais&sub=tipo_alimento");
    
    
    
}
?>
