<?php

    //Rota para área de certificado do aluno
    $routes['certificadoaluno'] = array(
        'route' => '/certificado/aluno',
        'controller' => 'CertificadoController',
        'action' => 'certificadoaluno'
    );
    //Rota para área de certificado do responsavel
    $routes['certificadoresponsavel'] = array(
        'route' => '/certificado/responsavel',
        'controller' => 'CertificadoController',
        'action' => 'certificadoresponsavel'
    );
    //Rota para área de gerenciar certificado 
    $routes['gerenciar'] = array(
        'route' => '/certificado/gerenciar',
        'controller' => 'CertificadoController',
        'action' => 'gerenciar'
    );
