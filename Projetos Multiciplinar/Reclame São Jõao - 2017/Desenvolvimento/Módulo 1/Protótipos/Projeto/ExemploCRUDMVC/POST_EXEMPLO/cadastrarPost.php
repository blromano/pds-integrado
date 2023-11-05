<?php

include '../modelo/Usuario.php';
include '../controle/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setNome($_POST['nome']);
$usuario->setSobrenome($_POST['sobrenome']);
$usuario->setEmail($_POST['email']);
$usuario->setData_nascimento($_POST['data_nascimento']);
$usuario->setComplemento($_POST['complemento']);
$usuario->setCpf($_POST['cpf']);
$usuario->setNumero($_POST['numero']);
$usuario->setFoto_perfil($_POST['foto_perfil']);
$usuario->setTelefone1($_POST['telefone1']);
$usuario->setTelefone2($_POST['telefone2']);
$usuario->setSenha($_POST['senha']);
$usuario->setConfirmar_senha($_POST['confirmar_senha']);
$usuario->setEstado($_POST['estado']);
$usuario->setRua($_POST['rua']);
$usuario->setBairro($_POST['bairro']);
$usuario->setCep($_POST['cep']);
$usuario->setCidade($_POST['cidade']);

$usuarioDAO->inserirUsuario($usuario);


header("location:index.php"); 




?>
