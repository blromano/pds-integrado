<?php

require_once  '../../modelo/Localizacao.php';
require_once  '../../controle/LocalizacaoDAO.php';

include '../../modelo/Usuario.php';
include '../../controle/UsuarioDAO.php';

include '../../modelo/Consumidor.php';
include '../../controle/ConsumidorDAO.php';

$localizacao = new Localizacao();
$localizacaoDAO = new LocalizacaoDAO();

$localizacao->setEstado($_POST['estado']);
$localizacao->setRua($_POST['rua']); 
$localizacao->setBairro($_POST['bairro']);
$localizacao->setCep($_POST['cep']);
$localizacao->setCidade($_POST['cidade']);
$idLocalizacao = $localizacaoDAO->inserirLocalizacao($localizacao);

$localizacao->setIdLocalizacao($idLocalizacao);



$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setNome_Completo($_POST['nome_completo']);
$usuario->setEmail($_POST['email']);
$usuario->setFoto_perfil($_POST['foto_perfil']);
$usuario->setTelefone($_POST['telefone']);
$usuario->setSenha($_POST['senha']);
$idUsuario = $usuarioDAO->inserirUsuario($usuario);

$usuario->setIdUsuario($idUsuario);



$consumidor = new Consumidor();
$consumidorDAO = new ConsumidorDAO();

$consumidor->setNumero($_POST['numero']);
$consumidor->setComplemento($_POST['complemento']);
$consumidor->setTelefone2($_POST['telefone2']);
$consumidor->setData_nascimento($_POST['data_nascimento']);
$consumidor->setCpf($_POST['cpf']);
$id = $consumidorDAO->inserirConsumidor($consumidor);

$consumidor->setId($id);


header("location:../../../php/mod01/mod01-loginUsuario.php"); 

?>
