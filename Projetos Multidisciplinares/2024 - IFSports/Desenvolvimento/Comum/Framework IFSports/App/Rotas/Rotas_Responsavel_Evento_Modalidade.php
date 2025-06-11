<?php
    
    $routes['atribuir-evento-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe_evento_modalidade/atribuirresponsavel',
        'controller' => 'Responsavel_Evento_ModalidadeController',
        'action' => 'listar'
    );
    
    $routes['atribuir-modalidade-responsavel'] = array(
        'route' => '/dashboard/responsaveis_equipe_evento_modalidade/atribuirmodalidaderesponsavel',
        'controller' => 'Responsavel_Evento_ModalidadeController',
        'action' => 'AtribuirResponsavelEmModalidades'
    );

    $routes['inserir-responsavel-modalidade'] = array(
        'route' => '/dashboard/responsaveis_equipe_evento_modalidade/inserirresponsavelmodalidade',
        'controller' => 'Responsavel_Evento_ModalidadeController',
        'action' => 'inserir'
    );

    $routes['excluir-responsavel-modalidade'] = array(
        'route' => '/dashboard/responsaveis_equipe_evento_modalidade/excluirresponsavelmodalidade',
        'controller' => 'Responsavel_Evento_ModalidadeController',
        'action' => 'excluirResponsavelModalidade'
    );

?>