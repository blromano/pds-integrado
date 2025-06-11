<?php

    //Rota para área de cadastro de novo aluno  
    $routes['cadastrar-aluno'] = array(
        'route' => '/cadastrar/aluno',
        'controller' => 'AlunosController',
        'action' => 'cadastraraluno'
    );

    $routes['cadastrar-aluno-inserir'] = array(
        'route' => '/cadastrar/aluno/inserir',
        'controller' => 'AlunosController',
        'action' => 'inserir'
    );

    $routes['editarinfo-buscarPorId'] = array(
        'route' => '/aluno/editarinfo/editar',
        'controller' => 'AlunosController',
        'action' => 'editar'
    );