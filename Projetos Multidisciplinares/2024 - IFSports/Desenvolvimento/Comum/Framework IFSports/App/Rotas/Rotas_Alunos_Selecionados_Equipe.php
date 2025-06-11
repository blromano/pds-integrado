<?php 

    $routes['selecionar-alunos'] = array(
        'route' => '/dashboard/alunos_selecionados/selecionar',
        'controller' => 'Alunos_Selecionados_EquipeController',
        'action' => 'selecionar'
    );

    $routes['listar-equipes'] = array(
        'route' => '/dashboard/alunos_selecionados/listar',
        'controller' => 'Alunos_Selecionados_EquipeController',
        'action' => 'listar'
    );

    $routes['vincular-equipes'] = array(
        'route' => '/dashboard/alunos_selecionados/vincular',
        'controller' => 'Alunos_Selecionados_EquipeController',
        'action' => 'vincular'
    );

    $routes['justificar-aluno'] = array(
        'route' => '/dashboard/alunos_selecionados/justificar',
        'controller' => 'Alunos_Selecionados_EquipeController',
        'action' => 'justificar'
    );

?>
