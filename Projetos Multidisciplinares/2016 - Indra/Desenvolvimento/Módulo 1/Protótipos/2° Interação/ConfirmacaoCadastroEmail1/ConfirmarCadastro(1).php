<?php

include_once "class/UsuarioDAO.php";
$usuConfirma = new UsuarioDAO();

$codigo = $_GET['cod'];
$data = date('y/m/d');
$status = 2;

$usuConfirma->AtivarCadastro($codigo, $data, $status);
  
$codigo = false;
$data = false;
$sataus = false; 

 Header("location:InserirCodigoCadastro.php");