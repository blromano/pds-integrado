<?php

include 'class/Usuario.php';
include 'class/UsuarioDAO.php';
//Dados do Usuario
$usuario = new Usuario();
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$data = $ano . '-' . $mes . '-' . $dia;
echo $data;


$usuario->setNome($_POST['USU_NOME']);
$usuario->setCep($_POST['USU_CEP']);
$usuario->setSenha($_POST['USU_SENHA']);
$usuario->setCidade($_POST['USU_CIDADE']);
$usuario->setCodigoAtivacao(false);
$usuario->setDataAtivacao(date('y/m/d'));
$usuario->setDataNascimento($data);
$usuario->setEmail($_POST['USU_EMAIL']);
$usuario->setEstado($_POST['USU_ESTADO']);
$usuario->setNumeroResidencia($_POST['USU_NUMERO_RESIDENCIA']);
$usuario->setComplemento($_POST['USU_COMPLEMENTO']);
$usuario->setPoderesAdministradores(false);
$usuario->setRua($_POST['USU_RUA']);
$usuario->setStatusAtivacao(false);
echo "teste";
$usuarioDAO = new UsuarioDAO();

$usuarioDAO->criarUsuario($usuario);

echo "teste";
header("location: index1.php");
?>