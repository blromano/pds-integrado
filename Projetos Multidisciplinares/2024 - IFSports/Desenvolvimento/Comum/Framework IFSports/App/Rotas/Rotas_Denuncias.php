<?php
//Rota para área de criar denuncia
$routes['criardenuncia_'] = array(
    'route' => '/dashboard/denuncias/cadastrar',
    'controller' => 'DenunciasController',
    'action' => 'criardenuncia'
);

$routes['listardenuncia_OE'] = array(
    'route' => '/dashboard/denuncias/listar_OE',
    'controller' => 'DenunciasController',
    'action' => 'listar'
);

$routes['listardenuncia_SE'] = array(
    'route' => '/dashboard/denuncias/listar_SE',
    'controller' => 'DenunciasController',
    'action' => 'listardenuncia_SE'
);

//Rota para área de criar denuncia
$routes['InserirDenuncia'] = array(
    'route' => '/denuncias/inserir',
    'controller' => 'DenunciasController',
    'action' => 'inserir'
);

$routes['ExcluirDenuncia_'] = array(
    'route' => '/denuncias/excluir',
    'controller' => 'DenunciasController',
    'action' => 'excluir'
);

$routes['AtualizarStatusDenuncia'] = array(
    'route' => '/denuncias/atualizar',
    'controller' => 'DenunciasController',
    'action' => 'atualizar'
);

$routes['EditarDenuncia'] = array(
    'route' => '/denuncias/editar',
    'controller' => 'DenunciasController',
    'action' => 'editar'
);


$routes['FiltrarDenuncias'] = array(
    'route' => '/denuncias/filtrar',
    'controller' => 'DenunciasController',
    'action' => 'filtrar'
);

$routes['EditarDenuncia'] = array(
    'route' => '/denuncias/editarDenuncia',
    'controller' => 'DenunciasController',
    'action' => 'editarDenuncia'
);


