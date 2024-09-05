<?php

session_start();
require_once '../../../classes/DAO/usuariosDAO.php';
$objUSU = new usuariosDAO();
    if ($objUSU->queryInsert($_POST, $_FILES) == 'ok') { //vai fazer o insert de tudo do metodo POST(RECEBER OS DADOS DO POST E EXECUTAR A FUNCAO INSERT DA CLASSE USUARIO)
        $_SESSION['msg'] = "sucesso";
    header("location:../../../index.php?mod=usuarios&sub=login");
    } else {
          echo 'asdasdsad-naoentrou no if2';
         $_SESSION['msg'] = "<script> alert('Erro ao realizar o cadastro!'); </script>";
        header("location:../../../index.php?mod=usuarios&sub=login");
    }

?>