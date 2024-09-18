<?php
				
    include "./classes/DAO/fichas_treinamento_dao.php";
    include "./classes/usuarios.php";
    //$obj_usuario = unserialize($_SESSION["usuario"]);
    //$obj_usuario->getUSU_CODIGO();
                        
    $ficha_treinamento = new fichas_treinamento_dao();
                        
    //$resultado = $ficha_treinamento->selecionar_usuario($obj_usuario);
    $resultado = $ficha_treinamento->selecionar_usuario(4);
                        
?>