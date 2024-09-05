<?php
$FTR_CODIGO = $_POST['ftrcodigo'];
$obj_ft_dao = new fichas_treinamento_dao();
$resultado = $obj_ft_dao->selecionarPorficha($FTR_CODIGO);
?>