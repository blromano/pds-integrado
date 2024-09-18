<?php
session_start();
require_once '../../../classes/DAO/usuariosDAO.php';
$objUSU = new usuariosDAO();

$email = $_POST["email_recu_senha"];
$nova_senha= $_POST["nova_senha"];
$chave = $_POST["chave"];


$result = $objUSU->CheckChave($email,$chave); //pegar o ID do usuário

if($result){
    $result = $objUSU->setNovaSenha($nova_senha,$result);
    $_SESSION['msg'] = "<script> alert('Senha alterada com sucesso!'); </script>";
     header("location:../../../index.php?mod=usuarios&sub=login");
}
else if ($result == false){
   $_SESSION['msg'] = "<script> alert('E-mail não encontrado!'); </script>";
   header("location:../../../index.php?mod=usuarios&sub=login");
}




?>

