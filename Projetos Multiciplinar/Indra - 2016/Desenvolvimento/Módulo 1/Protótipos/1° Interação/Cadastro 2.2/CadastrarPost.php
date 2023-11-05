<?php
include 'class/Usuario.php';
include 'class/UsuarioDAO.php';
//Dados do Usuario
$usuario = new usuario();
echo "teste";
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$data = $ano . '-' . $mes . '-' . $dia;
echo 'teste de data: ' .$data;


$usuario->setNome($_POST['USU_NOME']);
$usuario->setCep($_POST['USU_CEP']);
$usuario->setCidade($_POST['USU_CIDADE']);
$usuario->setEmail($_POST['USU_EMAIL']);
$usuario->setEstado($_POST['USU_ESTADO']);
$usuario->setNumeroResidencia($_POST['USU_NUMERO_RESIDENCIA']);
$usuario->setPoderesAdministradores(false);
$usuario->setRua($_POST['USU_RUA']);
$usuario->setId($_POST['USU_ID']);
$usuario->setDataNascimento($data);
$usuario->setStatusAtivacao(false);
$usuario->setDataAtivacao(date('y/m/d'));
$usuario->setCodigoAtivacao(false);
$usuario->setDataRecuperacaoSenha($_POST['USU_DATA_RECUPERACAO_SENHA']);


$usuarioDAO = new usuarioDAO();

$usuarioDAO->criarUsuario($usuario);
echo "teste";
header("location: index1.php");
?>