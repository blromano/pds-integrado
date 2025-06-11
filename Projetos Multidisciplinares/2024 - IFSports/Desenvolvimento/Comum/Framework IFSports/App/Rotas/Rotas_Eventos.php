<?php

    $routes['listareventos'] = array(
        'route' => '/dashboard/eventos/listar',
        'controller' => 'EventosController',
        'action' => 'listarEventos'
    );

    $routes['cadastrareventos'] = array(
        'route' => '/dashboard/eventos/cadastrar',
        'controller' => 'EventosController',
        'action' => 'cadastrarEventos'
    );

    $routes['inserireventos'] = array(
        'route' => '/dashboard/eventos/inserir',
        'controller' => 'EventosController',
        'action' => 'inserirEventos'
    );

    $routes['editarEventos'] = array(
        'route' => '/dashboard/eventos/editar',
        'controller' => 'EventosController',
        'action' => 'editar'
    );

    $routes['alterarEventos'] = array(
        'route' => '/dashboard/eventos/alterar',
        'controller' => 'EventosController',
        'action' => 'alterar'
    );

    $routes['filtrareventos'] = array(
        'route' => '/dashboard/eventos/filtrar',
        'controller' => 'EventosController',
        'action' => 'filtrar'
    );

    $routes['excluireventos'] = array(
        'route' => '/dashboard/eventos/excluir',
        'controller' => 'EventosController',
        'action' => 'excluir'
    );

    //listagem para atribuir secretarios no evento
    $routes['atribuirseceventos'] = array(
        'route' => '/dashboard/eventos/atribuirsec',
        'controller' => 'Secretarios_EventosController',
        'action' => 'atribuirSec'
    );

    $routes['eventos-secretarios'] = array(
        'route' => '/dashboard/eventos/secretarios',
        'controller' => 'SecretariosController',
        'action' => 'modalidades'
    );

    //precisa ver o que vai ser restringido para que a rota funcione corretamente e saibamos qual controller usar
    $routes['restricoeseventos'] = array(
        'route' => '/dashboard/eventos/restricoes',
        'controller' => 'EventosController',
        'action' => 'restricoes'
    );

    // mod 05
    $routes['VisualizarEvento_mod05'] = array(
        'route' => '/dashboard/eventos/visualizarevento',
        'controller' => 'VisualizarEventoController',
        'action' => 'visualizarevento'
    );


    //mod02 ------  Apenas para testes, vai ser removido depois

    $routes['listarEventosAluno'] = array(
        'route' => '/listar_eventos_aluno',
        'controller' => 'EventosController',
        'action' => 'listarEventosAluno'
    );

    // -----------
    
    // mod01

