<?php
include 'conexaobancoteste.php';

$sqlsyntax = 'SELECT *(FTR_DATA_INICIO, FTR_CODIGO, FTR_DATA_ATUALIZACAO, FTR_NOME, FTR_DATA_TERMINO, FK_USUARIOS_USU_CODIGO);'
$consulta = $banco -> prepare ($sqlsyntax);
$consulta -> execute ();
$listagem = $consulta -> fetchAll();
?>