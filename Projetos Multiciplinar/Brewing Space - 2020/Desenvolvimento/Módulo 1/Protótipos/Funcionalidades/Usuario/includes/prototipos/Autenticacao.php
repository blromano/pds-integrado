<?php
session_start();
require_once('../dao/UsuarioDAO.php');

$conexao = new UsuarioDAO();


if (isset($_POST['email']) AND isset($_POST['senha'])) {


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($email != "" AND $senha != "") {

        $info = $conexao->Login($email, $senha);
        if ($info != false) {

            $_SESSION['id'] = $info->USU_ID;
            header("Location: Enviar_Feedback.php?sucess=1");

        } else {
            header("Location: ../../index.php?sucess=0");
        }
    } else {
        $mensagem = "Preencha os dois campos para continuar!";
    }
}

?>