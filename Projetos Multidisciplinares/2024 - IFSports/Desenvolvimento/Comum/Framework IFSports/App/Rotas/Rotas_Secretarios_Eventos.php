<?php

$routes['listarsecretarioevento'] = array(
    'route' => '/dashboard/secretarios_eventos/listar',
    'controller' => 'Secretarios_EventosController',
    'action' => 'listarSec'
);

$routes['cadastrarsecretarioevento'] = array(
    'route' => '/dashboard/secretarios_eventos/cadastrar',
    'controller' => 'Secretarios_EventosController',
    'action' => 'cadastrarSec'

);



$routes['restringirsecretario'] = array(
    'route' => '/dashboard/secretarios_eventos/restringir',
    'controller' => 'Secretarios_EventosController',
    'action' => 'restringir'
);


$routes['mudarstatussecretario'] = array(
    'route' => '/dashboard/secretarios_eventos/status',
    'controller' => 'Secretarios_EventosController',
    'action' => 'statusSec'
);



$routes['inserirsecretarioevento'] = array(
    'route' => '/dashboard/secretarios_eventos/inserir',
    'controller' => 'Secretarios_EventosController',
    'action' => 'inserir'
);



$routes['mudarsenhasecretario'] = array(
    'route' => '/dashboard/secretarios_eventos/mudarsenha',
    'controller' => 'Secretarios_EventosController',
    'action' => 'mudarsenhasec'
);

$routes['atualizarsenhasecretario'] = array(
    'route' => '/dashboard/secretarios_eventos/atualizarsenhasec',
    'controller' => 'Secretarios_EventosController',
    'action' => 'atualizarsenhasec'
);






$routes['editarsecretario'] = array(
    'route' => '/dashboard/secretarios_eventos/editar',
    'controller' => 'Secretarios_EventosController',
    'action' => 'editarSec'
);

$routes['atualizarsecretario'] = array(
    'route' => '/dashboard/secretarios_eventos/atualizar',
    'controller' => 'Secretarios_EventosController',
    'action' => 'editar'
);

$routes['gerarcrachase'] = array(
    'route' => '/dashboard/secretarios_eventos/crachasec',
    'controller' => 'Secretarios_EventosController',
    'action' => 'cracha'
);

?>