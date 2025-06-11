<?php

    //Rota para área de cadastro de novo aluno  
    $routes['CadastrarAluno'] = array(
        'route' => '/cadastrar-aluno',
        'controller' => 'CadastrarAlunoController',
        'action' => 'cadastraraluno'
    );

    $routes['cadastrar-aluno-inserir'] = array(
        'route' => '/cadastrarAluno/inserir',
        'controller' => 'CadastrarAlunoController',
        'action' => 'inserir'
    );