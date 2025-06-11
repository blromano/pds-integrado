<?php
$routes['inserir'] = array(
    'route' => '/welcome/inserir',
    'controller' => 'WelcomeController',
    'action' => 'inserir'
);

//Rota para Landingpage   
$routes['welcome'] = array(
    'route' => '/',
    'controller' => 'WelcomeController',
    'action' => 'index'
);

$routes['VisualizarFotosEventos'] = array(
    'route' => '/welcome/visualizar-fotos',
    'controller' => 'WelcomeController',
    'action' => 'VisualizarFotosEventos'
);

$routes['VisualizarResultadosFinais'] = array(
    'route' => '/welcome/resultados',
    'controller' => 'WelcomeController',
    'action' => 'visualizarresultadosfinais'
);