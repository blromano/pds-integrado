<?php
/*  Dicionário de Rotas:
  (Coloque neste local o nome de cada rota que você utiliza em seu módulo juntamente com o caminho que ela executa)
    Nome da Rota             -     Caminho que executa
    ''                       -     '/'
    'sobre'                  -     '/sobre'
    'cadastrarPontoColeta'   -     '/cadastrarPontoColeta'
    'registrarDescarte'      -     '/registrarDescarte'
    'cadastrarResiduo'       -     '/cadastarResiduo'
    'listarResiduos'         -     '/listarResiduos'
    'editarResiduo'          -     '/editarResiduo'
    'listarDescartes'        -     '/listarDescartes'
    'listarResiduosPorPonto' -     '/listarResiduosPorPonto'
    'editarDescarteListado'  -     '/editarDescarteListado'
*/

// Início rotas resíduo

$routes['cadastrarResiduo'] = array(
	'route' => '/dashboard/cadastrarResiduo',
	'controller' => 'DashboardMod04Controller',
	'action' => 'cadastrarResiduo'
);

$routes['inserirResiduo'] = array(
	'route' => '/inserirResiduo',
	'controller' => 'Residuo_SolidoController',
	'action' => 'inserirResiduo'
);

$routes['listarResiduos'] = array(
	'route' => '/dashboard/listarResiduos',
	'controller' => 'Residuo_SolidoController',
	'action' => 'listarResiduo'
);

$routes['editarResiduo'] = array(
	'route' => '/dashboard/editarResiduo',
	'controller' => 'Residuo_SolidoController',
	'action' => 'formEditarResiduo'
);

$routes['alterarResiduo'] = array(
	'route' => '/dashboard/alterarResiduo',
	'controller' => 'Residuo_SolidoController',
	'action' => 'alterarResiduo'
);

$routes['excluirResiduo'] = array(
	'route' => '/dashboard/excluirResiduo',
	'controller' => 'Residuo_SolidoController',
	'action' => 'excluirResiduo'
);

// Fim rotas resíduo
// Início rota descarte

$routes['registrarDescarte'] = array(
	'route' => '/dashboard/registrarDescarte',
	'controller' => 'DashboardMod04Controller',
	'action' => 'registrarDescarte'
);

$routes['realizarDescarte'] = array(
	'route' => '/dashboard/realizarDescarte',
	'controller' => 'DashboardMod04Controller',
	'action' => 'realizarDescarte'
);

$routes['inserirDescarteResiduo'] = array(
	'route' => '/inserirDescarteResiduo',
	'controller' => 'Descarte_ResiduoController',
	'action' => 'inserirDescarteResiduo'
);

$routes['editarDescarte'] = array(
	'route' => '/dashboard/editarDescarte',
	'controller' => 'Descarte_ResiduoController',
	'action' => 'formEditarDescarteResiduo'
);

$routes['alterarDescarte'] = array(
	'route' => '/dashboard/alterarDescarteResiduo',
	'controller' => 'Descarte_ResiduoController',
	'action' => 'alterarDescarteResiduo'
);

$routes['consultarDescarte'] = array(
	'route' => '/dashboard/consultarDescarte',
	'controller' => 'DashboardMod04Controller',
	'action' => 'consultarDescarte'
);

$routes['listarDescarteResiduos'] = array(
	'route' => '/dashboard/listarDescarteResiduos',
	'controller' => 'Descarte_ResiduoController',
	'action' => 'listarDescarteResiduos'
);

$routes['excluirDescarteResiduo'] = array(
	'route' => '/dashboard/excluirDescarteResiduo',
	'controller' => 'Descarte_ResiduoController',
	'action' => 'excluirDescarteResiduo'
);

$routes['obterDados'] = array(
	'route' => '/dashboard/obterDados',
	'controller' => 'DashboardMod04Controller',
	'action' => 'obterDados'
);

$routes['obterDados2'] = array(
	'route' => '/dashboard/obterDados2',
	'controller' => 'DashboardMod04Controller',
	'action' => 'obterDados2'
);

$routes['sendPDF'] = array(
	'route' => '/dashboard/sendPDF',
	'controller' => 'DashboardMod04Controller',
	'action' => 'sendPDF'
);

// Fim rotas descarte

$routes['Mod04_cadastrarPontoColeta'] = array(
	'route' => '/dashboard/cadastrarPontoColeta',
	'controller' => 'DashboardMod04Controller',
	'action' => 'cadastrarPontoColeta'
);

$routes['Mod04_inserirPontoColeta'] = array(
	'route' => '/inserirPontoColeta',
	'controller' => 'PontoColetaController',
	'action' => 'inserir'
);

$routes['Mod04_listarPontosDeColetaCadastrados'] = array(
	'route' => '/dashboard/listarPontosDeColetaCadastrados',
	'controller' => 'PontoColetaController',
	'action' => 'listarPontosDeColetaCadastrados'
);

$routes['excluirPontoColeta'] = array(
	'route' => '/dashboard/excluirPontoColeta',
	'controller' => 'PontoColetaController',
	'action' => 'excluirPontoColeta'
);
$routes['editarPontoColeta'] = array(
	'route' => '/dashboard/editarPontoColeta',
	'controller' => 'PontoColetaController',
	'action' => 'editarPontoColeta'
);
$routes['alterarPontoColeta'] = array(
	'route' => '/dashboard/alterarPontoColeta',
	'controller' => 'PontoColetaController',
	'action' => 'alterarPontoColeta'
);



$routes['listarResiduosPorPonto'] = array(
	'route' => '/dashboard/listarResiduosPorPonto',
	'controller' => 'DashboardMod04Controller',
	'action' => 'listarResiduosPorPonto'
);

$routes['buscarPonto'] = array(
	'route' => '/dashboard/buscarPonto',
	'controller' => 'DashboardMod04Controller',
	'action' => 'buscarPonto'
);

$routes['buscarInformacoesPontoColeta'] = array(
	'route' => '/dashboard/buscarInformacoesPontoColeta',
	'controller' => 'DashboardMod04Controller',
	'action' => 'buscarInformacoesPontoColeta'
);

$routes['editarPontoCadastrado'] = array(
	'route' => '/dashboard/editarPontoCadastrado',
	'controller' => 'DashboardMod04Controller',
	'action' => 'editarPontoCadastrado'
);

$routes['excluirPontoCadastrado'] = array(
	'route' => '/dashboard/excluirPontoCadastrado',
	'controller' => 'DashboardMod04Controller',
	'action' => 'excluir'
);
$routes['avaliarPontoColeta'] = array(
	'route' => '/dashboard/avaliarPontoColeta',
	'controller' => 'PontoColetaController',
	'action' => 'Avaliar'
);
