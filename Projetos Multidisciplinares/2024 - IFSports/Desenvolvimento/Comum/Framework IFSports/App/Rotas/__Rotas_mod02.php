<?php


    //Rota para Landingpage   
    $routes['listarEventos_mod02'] = array(
        'route' => '/listar_eventos',
        'controller' => 'Mod02Controller',
        'action' => 'listarEventos_mod02'
    );

    $routes['inscricao_mod02'] = array(
        'route' => '/listar_eventos/inscricao',
        'controller' => 'Mod02Controller',
        'action' => 'inscricao_mod02'
    );
    $routes['verificarInscricao_mod02'] = array(
        'route' => '/verificarInscricao_mod02',
        'controller' => 'Mod02Controller',
        'action' => 'verificarInscricao_mod02'
    );
    $routes['editarDocumentos'] = array(
        'route' => '/meus_eventos_aluno/editar_documentos',
        'controller' => 'Mod02Controller',
        'action' => 'editarDocumentos_mod0' 
    );
    $routes['cancelarInscricao_mod02'] = array(
        'route' => '/meus_eventos_aluno/cancelar_inscricao',
        'controller' => 'Mod02Controller',
        'action' => 'cancelarInscricao_mod02'
    );
    $routes['meusEventosAluno_mod02'] = array(
        'route' => '/meus_eventos_aluno',
        'controller' => 'Mod02Controller',
        'action' => 'meusEventosAluno_mod02'
    );
    $routes['meusEventosOS_mod02'] = array(
        'route' => '/meus_eventos_os',
        'controller' => 'Mod02Controller',
        'action' => 'meusEventosOS_mod02'
    );
    $routes['inscricaoModalidades_mod02'] = array(
        'route' => '/meus_eventos_aluno/inscricao_modalidades',
        'controller' => 'Mod02Controller',
        'action' => 'inscricaoModalidades_mod02'
    );
    $routes['homologacao_mod02'] = array(
        'route' => '/homologacao_mod02',
        'controller' => 'Mod02Controller',
        'action' => 'homologacao_mod02'
    );

    $routes['listarInscricaoDeAlunoEmEventos_mod02'] = array(
        'route' => '/listarInscricaoDeAlunoEmEventos_mod02',
        'controller' => 'Mod02Controller',
        'action' => 'listarInscricaoDeAlunoEmEventos_mod02'
    );
    $routes['homologar_mod02'] = array(
        'route' => '/verificarInscricaoDeAlunoEmModalidade_mod02',
        'controller' => 'Mod02Controller',
        'action' => 'verificarInscricaoDeAlunoEmModalidade_mod02'
    );
    $routes['imprimircracha_mod02'] = array(
        'route' => '/imprimircracha',
        'controller' => 'Mod02Controller',
        'action' => 'imprimircracha_mod02'
    );
    $routes['gerarCracha_mod02'] = array(
        'route' => '/meus_eventos_aluno/gerarcracha_mod02',
        'controller' => 'Mod02Controller',
        'action' => 'gerarCracha_mod02'
    );
    $routes['verificarPend_mod02'] = array(
        'route' => '/verificarPend_mod02',
        'controller' => 'Mod02Controller',
        'action' => 'verificarPend_mod02'
    );

    