<?php 

$routes['fotos-enviar'] = array(
    'route' => '/dashboard/fotos/enviar',
    'controller' => 'FotosController',
    'action' => 'enviar'
);

$routes['fotos-validar'] = array(
    'route' => '/dashboard/fotos/validar',
    'controller' => 'FotosController',
    'action' => 'validar',
    'params' => ['status']
);


$routes['fotos-alterar-status'] = array(
    'route' => '/dashboard/fotos/alterar-status',
    'controller' => 'FotosController',
    'action' => 'alterarStatus'
);

