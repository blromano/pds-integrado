<?php
	
include_once "class/UsuarioDAO.php";
include_once "class/UsuarioLogin.php";
$usuConfirma = new UsuarioDAO();

$codigo = $_GET['cod'];
$data = date('y/m/d');
$status = 2;

$usuConfirma->AtivarCadastro($codigo, $data, $status);

echo" <script> window.location='InserirCodigoCadastro.php' </script>";
 