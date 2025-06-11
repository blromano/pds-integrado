<?php


    //Rota para Landingpage   
    $routes['everton-cadastrar'] = array(
        'route' => '/everton/cadastrar',
        'controller' => 'EvertonController',
        'action' => 'cadastrar'
    );

    $routes['everton-editar'] = array(
        'route' => '/everton/editar',
        'controller' => 'EvertonController',
        'action' => 'editar'
    );
    $routes['everton-alterar'] = array(
        'route' => '/everton/alterar',
        'controller' => 'EvertonController',
        'action' => 'alterar'
    );

    $routes['everton-listar'] = array(
        'route' => '/everton/listar',
        'controller' => 'EvertonController',
        'action' => 'listar'
    );

    $routes['everton-inserir'] = array(
        'route' => '/everton/inserir',
        'controller' => 'EvertonController',
        'action' => 'inserir'
    );