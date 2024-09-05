<?php
session_start();
include './../../../classes/DAO/fichas_treinamento_dao.php';
$obj_ft_dao = new fichas_treinamento_dao();
$nomepesquisado = $_POST['nomepesquisado'];
$resultado = $obj_ft_dao->selecionarPornome($nomepesquisado);
//var_dump($resultado);
if(!empty($resultado))
{
$_SESSION['listar_ficha_treinamento'] = $resultado;	
}
header('location:http://localhost/refatoracao-segundo/?mod=treinos&sub=listar_ficha_treinamento');
?>