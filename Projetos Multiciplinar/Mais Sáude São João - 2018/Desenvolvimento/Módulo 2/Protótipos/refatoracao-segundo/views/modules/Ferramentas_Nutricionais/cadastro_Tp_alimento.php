<?php
session_start();
require_once("dao/TiposAlimentosDAO.php");


$cadastro_Tp_alimento = new TiposAlimentosDAO();

if (!empty($_POST["nome"])) {

    $select = $cadastro_Tp_alimento->listarTodos();
    $variavel = $select->fetchAll();
    $controle = 0;
    foreach ($variavel as $edita) {
        if ($edita['TPA_NOME'] == $_POST['nome']) {
            $controle = 1;
        }
    }


    if ($controle == 0) {

        $cadastro_Tp_alimento = $cadastro_Tp_alimento->insert($_POST["nome"]);

        $emodal=1;
        $_SESSION['emodal']=$emodal;
        header ("location: ?mod=fnutricionais&sub=tipo_alimento");
        
        
        
        
    } else {
        //echo "<script>alert('Esse tipo de alimento já foi cadastrado')</script> <script>window.location='http://localhost/refatoracao-segundo/?mod=fnutricionais&sub=tipo_alimento';</script>";
    
        
        $emodal=2;
        $_SESSION['emodal']=$emodal;

        header ("location: ?mod=fnutricionais&sub=tipo_alimento");
        
    }
} else {

            //echo "<script>alert('Preencha o campo para cadastrar!')</script> <script>window.location='http://localhost/refatoracao-segundo/?mod=fnutricionais&sub=tipo_alimento';</script>"; 

    
        $emodal=3;
        $_SESSION['emodal']=$emodal;
        header ("location: ?mod=fnutricionais&sub=tipo_alimento");
    
    
}
?>

