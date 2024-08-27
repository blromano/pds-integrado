<?php

include_once "../../dao/mod01/UsuarioDAO.php";
$usuConfirma = new UsuarioDAO();

$codigo = $_GET['cod'];
$data = date('y/m/d');
$status = 2;

$usuConfirma->AtivarCadastro($codigo, $data, $status);
  
$codigo = false;
$data = false;
$sataus = false; 

 Header("location:../../indra/mod01/InserirCodigoCadastro.php");