<?php
session_start();
require_once('../conexao/request.class.php');

$conexao = new Receita();


if (isset($_POST['email']) AND isset($_POST['senha'])) {


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($email != "" AND $senha != "") {

        $info = $conexao->userLogin($email, $senha);
        if ($info != false) {

            $_SESSION['id'] = $info->USU_ID;
            header("Location: menu.php?sucess=1");

        } else {
            $mensagem = "Usuário e/ou senha incorretos!";
            header("Location: login.php?sucess=0");
        }
    } else {
        $mensagem = "Preencha os dois campos para continuar!";
    }
}

?>