<?php
include 'class/Usuario.php';
include 'class/UsuarioDAO.php';
include 'class/usuarioEspecialista.php';
include 'class/usuarioEspecialista.php';
include 'class/usuarioInstituicao.php';
include 'class/usuarioInstituicaoDAO.php';

//Dados do Usuario
$usuario = new usuario();
$usuarioEspecialista = new usuarioEspecialista();
$usuarioInstituicao = new usuarioInstituicao();

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

//cadastro usuario instituicao
$usuarioInstituicao->setNomeFantasia($_POST['INS_NOME_FANTASIA']);
$usuarioInstituicao->setRazaoSocial($_POST['INS_RAZAO_SOCIAL']);
$usuarioInstituicao->setCnpj($_POST['INS_CNPJ']);

$usuarioInstituicaoDAO = new usuarioInstituicaoDAO();
$usuarioInstituicaoDAO->criarUsuario($usuarioInstituicao);

//cadastro usuario Especialista
$usuarioEspecialista->setEspecializacao($_POST['ESP_ESPECIALIZACAO']);
$usuarioEspecialista->setRg($_POST['ESP_RG']);
$usuarioEspecialista->setCpf($_POST['ESP_CPF']);

$usuarioEspecialistaDAO = new usuarioEspecialistaDAO();
$usuarioEspecialistaDAO->criarUsuario($usuarioEspecialista);

echo "teste";
header("location: index1.php");
?>