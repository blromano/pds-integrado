<?php

    $routes['listarmodalidades'] = array(
        'route' => '/dashboard/modalidades/listar',
        'controller' => 'ModalidadesController',
        'action' => 'listar'
    );

    $routes['adicionarmodalidade'] = array(
        'route' => '/dashboard/modalidades/adicionar',
        'controller' => 'ModalidadesController',
        'action' => 'adicionar'
    );

    $routes['inserirmodalidades'] = array(
        'route' => '/dashboard/modalidades/inserir',
        'controller' => 'ModalidadesController',
        'action' => 'inserir'
    );

    $routes['editarmodalidades'] = array(
        'route' => '/dashboard/modalidades/editar',
        'controller' => 'ModalidadesController',
        'action' => 'editar'
    );

    $routes['alterarmodalidades'] = array(
        'route' => '/dashboard/modalidades/alterar',
        'controller' => 'ModalidadesController',
        'action' => 'alterar'
    );

    $routes['excluirmodalidades'] = array(
        'route' => '/dashboard/modalidades/excluir',
        'controller' => 'ModalidadesController',
        'action' => 'excluir'
    );
     
?>