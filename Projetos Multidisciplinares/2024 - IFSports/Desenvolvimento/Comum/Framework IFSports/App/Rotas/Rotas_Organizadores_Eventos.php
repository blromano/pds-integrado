<?php

$routes['listarorganizadorevento'] = array(
        'route' => '/dashboard/organizadores_eventos/listar',
        'controller' => 'Organizadores_EventosController',
        'action' => 'listarorg'
    );

$routes['cadastrarorganizadorevento'] = array(
        'route' => '/dashboard/organizadores_eventos/cadastrar',
        'controller' => 'Organizadores_EventosController',
        'action' => 'cadastrarOrg'
    );

    $routes['inserirorganizadorevento'] = array(
        'route' => '/dashboard/organizadores_eventos/inserir',
        'controller' => 'Organizadores_EventosController',
        'action' => 'inserirOrganizadorEvento'
    );


    $routes['mudarsenhaorganizador'] = array(
        'route' => '/dashboard/secretarios_eventos/mudarsenha',
        'controller' => 'Secretarios_EventosController',
        'action' => 'mudarsenhaore'
    );
    
    $routes['atualizarsenhaorganizador'] = array(
        'route' => '/dashboard/secretarios_eventos/atualizarsenhaore',
        'controller' => 'Secretarios_EventosController',
        'action' => 'atualizarsenhaore'
    );


    $routes['restringirorganizador'] = array(
        'route' => '/dashboard/secretarios_eventos/restringir',
        'controller' => 'Secretarios_EventosController',
        'action' => 'restringir'
    );
    
    
    $routes['mudarstatusorganizador'] = array(
        'route' => '/dashboard/secretarios_eventos/status',
        'controller' => 'Secretarios_EventosController',
        'action' => 'statusOre'
    );


    $routes['editarorganizadorevento'] = array(
        'route' => '/dashboard/organizadores_eventos/editar',
        'controller' => 'Organizadores_EventosController',
        'action' => 'editarorg'
    );

    $routes['alterarorganizadorevento'] = array(
        'route' => '/dashboard/organizadores_eventos/alterar',
        'controller' => 'Organizadores_EventosController',
        'action' => 'alterar'
    );

    $routes['gerarcrachaoe'] = array(
        'route' => '/dashboard/organizadores_eventos/crachaorg',
        'controller' => 'Organizadores_EventosController',
        'action' => 'cracha'
    );
