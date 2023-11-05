<?php
	include "./classes/DAO/programas_de_treinamentos_prontos_dao.php";
    include "./classes/usuarios.php";

    $programas_treinamento = new programas_de_treinamentos_prontos_dao();

    $resultado = $programas_treinamento->selecionar_programas_de_treinamentos_prontos();
?>