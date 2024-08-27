<?php
				
    include "./classes/DAO/usuarios_treinamentos_prontos_dao.php";
    include "./classes/usuarios.php";
    //$obj_usuario = unserialize($_SESSION["usuario"]);
    //$obj_usuario->getUSU_CODIGO();
                        
    $usuarios_treinamento_prontos = new usuarios_treinamentos_prontos_dao();
                        
    //$resultado = $usuarios_treinamento_prontos->selecionar_usuario($obj_usuario);
    $resultado = $usuarios_treinamento_prontos->selecionar_usuario(4);
                        
?>