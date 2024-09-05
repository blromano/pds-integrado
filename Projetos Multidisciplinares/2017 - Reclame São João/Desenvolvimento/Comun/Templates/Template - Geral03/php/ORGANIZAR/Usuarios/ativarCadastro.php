<?php

include '../../controle/UsuarioDAO.php';
include '../../controle/ConsumidorDAO.php';

$emailAtivacao = $_GET['email'];


$usuarioDAO = new UsuarioDAO();
$idUsuario = $usuarioDAO->buscarUsuario($emailAtivacao);

$consumidorDAO = new ConsumidorDAO();

$consumidorDAO->ativarCadastro($idUsuario);


session_start();
$_SESSION['cadastroValidado'] = "Cadastro Validado com Sucesso!";

header("location:../../../php/mod01/mod01-loginUsuario.php"); 


?>
