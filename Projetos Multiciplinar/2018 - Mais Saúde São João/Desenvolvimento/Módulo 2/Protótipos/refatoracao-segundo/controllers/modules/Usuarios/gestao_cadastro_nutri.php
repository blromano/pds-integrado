<?php

session_start();
require_once '../../../classes/DAO/nutricionistaDAO.php';
$objNutri = new nutricionistaDAO();
    if ($objNutri->queryInsert($_POST, $_FILES) == 'ok') { //vai fazer o insert de tudo do metodo POST(RECEBER OS DADOS DO POST E EXECUTAR A FUNCAO INSERT DA CLASSE USUARIO)
        $_SESSION['msg'] = "sucesso";
   header("location:../../../index.php?mod=usuarios&sub=login");
    } else {
          $_SESSION['msg'] = "<script> alert('Erro ao realizar cadastro!'); </script>";
          header("location:../../../index.php?mod=usuarios&sub=login");
    }

?>