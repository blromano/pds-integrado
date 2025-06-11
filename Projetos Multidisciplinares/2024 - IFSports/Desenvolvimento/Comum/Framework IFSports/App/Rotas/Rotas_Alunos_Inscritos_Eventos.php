<?php

    $routes['pdf_lista-alunosinscritoseventos'] = array(
        'route' => '/dashboard/alunos_inscritos_eventos/pdf',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'pdf_aluno'
    );
    

    $routes['gerar-lista-PDF'] = array(
        'route' => '/dashboard/alunos_inscritos_eventos/pdf_lista',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'pdf_lista'
    );

    //Para acesar essa rota vá para modalidades listar em eventos listar 
    $routes['listar-alunosinscritoseventos'] = array(
        'route' => '/dashboard/alunos_inscritos_eventos/listar',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'listar'
    );

    
    $routes['inscricaoEvento'] = array(
        'route' => '/listar_eventos/inscricao',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'inscricaoEvento'
    );
    
    $routes['inserirInscricaoEvento'] = array(
        'route' => '/listar_eventos/inscricao/inserir',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'inserir'
    );

    $routes['cancelarInscricao'] = array(
        'route' => '/meus_eventos_aluno/cancelar_inscricao',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'cancelarInscricao'
    );
    $routes['desativarInscricao'] = array(
        'route' => '/meus_eventos_aluno/cancelar_inscricao/excluir',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'desativarInscricao'
    );

    $routes['editarDocumentos'] = array(
        'route' => '/meus_eventos_aluno/editar_documentos',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'editarDocumentos' 
    );

    $routes['inserirDocumentos'] = array(
        'route' => '/meus_eventos_aluno/editar_documentos/inserir',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'inserirDocumentos' 
    );
    
    $routes['baixarDocumento'] = array(
        'route' => '/documentos/baixar/{file}',  // A URL agora recebe o nome do arquivo
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'baixarDocumento'
    );

    $routes['verificarInscricaoAluno'] = array(
        'route' => '/dashboard/aluno/listar',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'verificarInscricaoAluno'
    );
    $routes['homologarInscricaoAluno'] = array(
        'route' => '/dashboard/aluno/verificar',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'homologarInscricaoAluno'
    );
    $routes['naoHomologarAluno'] = array(
        'route' => '/dashboard/aluno/naoHomologarAluno',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'naoHomologarAluno'
    );
    $routes['inserir-Justificativa'] = array(
        'route' => '/dashboard/aluno/justificativa',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'justificativa'
    );

    $routes['listarmeuseventos'] = array(
        'route' => '/dashboard/listarmeuseventos',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'listarmeuseventos'
    );

    $routes['meuseventos'] = array(
        'route' => '/listarmeuseventos/meuseventos',
        'controller' => 'Alunos_Inscritos_EventosController',
        'action' => 'meuseventos'
    );
?>