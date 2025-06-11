<?php

    $routes['adicionar-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe/adicionar',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'adicionar'
    );

    $routes['alterar-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe/alterar',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'alterar'
    );

    $routes['inserir-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe/inserir',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'inserir'
    );

    $routes['cadastrar-senha'] = array(
        'route' => '/dashboard/responsaveis_equipe/cadastrar_senha',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'cadastrarsenha'
    );

    $routes['gerar-cracha'] = array(
        'route' => '/dashboard/responsaveis_equipe/cracha',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'cracha'
    );

    $routes['editar-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe/editar',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'editar'
    );

    $routes['excluir-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe/excluir',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'excluir'
    );

    $routes['listar-responsaveis'] = array(
        'route' => '/dashboard/responsaveis_equipe/listar',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'listar'
    );

    $routes['pesquisar-responsaveis'] = array(
        'route' => '/dashboard/responsaveis_equipe/pesquisarresponsavel',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'pesquisarResponsavel'
    );

    $routes['visualizar-responsaveis'] = array(
        'route' => '/dashboard/responsaveis_equipe/visualizar',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'visualizar'
    );

    $routes['cadastrar-nova-senha-responsaveis'] = array(
        'route' => '/dashboard/responsaveis_equipe/cadastrar_nova_senha',
        'controller' => 'Responsaveis_EquipeController',
        'action' => 'novasenha'
    );


?>