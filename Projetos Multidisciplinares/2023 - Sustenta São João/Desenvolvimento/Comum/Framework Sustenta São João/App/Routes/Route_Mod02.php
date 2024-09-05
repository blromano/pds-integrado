<?php    

      /*  Dicionário de Rotas:
        (Coloque neste local o nome de cada rota que você utiliza em seu módulo juntamente com o caminho que ela executa)
        Nome da Rota     -     Caminho que executa
        ''               -     '/'
        'sobre'          -     '/sobre'


    */      
	
	$routes['reclamacao'] = array(
		'route' => '/dashboard/reclamacao',
		'controller' => 'ReclamacoesController',
		'action' => 'reclamacao'
	);

	$routes['inserirReclamacao'] = array(
		'route' => '/dashboard/inserirReclamacao',
		'controller' => 'ReclamacoesController',
		'action' => 'inserirReclamacao'
	);
	$routes['inserirResposta'] = array(
		'route' => '/dashboard/inserirResposta',
		'controller' => 'ReclamacoesController',
		'action' => 'inserirResposta'
	);
	$routes['editarReclamacao'] = array(
		'route' => '/dashboard/editarReclamacao',
		'controller' => 'DashboardMod02Controller',
		'action' => 'editarReclamacao'
	);
	$routes['alterarReclamacao'] = array(
		'route' => '/dashboard/alterarReclamacao',
		'controller' => 'ReclamacoesController',
		'action' => 'alterarReclamacao'
	);
	$routes['adminReclamacao'] = array(
		'route' => '/dashboard/adminReclamacao',
		'controller' => 'DashboardMod02Controller',
		'action' => 'adminReclamacao'
	);
	$routes['previaReclamacao'] = array(
		'route' => '/dashboard/previaReclamacao',
		'controller' => 'ReclamacoesController',
		'action' => 'listarReclamacao'
	);
	$routes['listagemRecEnviadas'] = array(
		'route' => '/dashboard/listagemRecEnviadas',
		'controller' => 'ReclamacoesController',
		'action' => 'listarUsuReclamacao'
	);
	$routes['respReclamacao'] = array(
		'route' => '/dashboard/respReclamacao',
		'controller' => 'DashboardMod02Controller',
		'action' => 'respReclamacao'
	);
	$routes['gerarRelatorios'] = array(
		'route' => '/dashboard/gerarRelatorios',
		'controller' => 'ReclamacoesController',
		'action' => 'listarParaRelatorio'
	);
	$routes['gerarPDF'] = array(
		'route' => '/dashboard/gerarPDF',
		'controller' => 'ReclamacoesController',
		'action' => 'listarGerarPDF'
	);

	$routes['graficoBarras'] = array(
		'route' => '/dashboard/graficoBarras',
		'controller' => 'ReclamacoesController',
		'action' => 'listarGraficoBarras'
	);

	$routes['graficoPizza'] = array(
		'route' => '/dashboard/graficoPizza',
		'controller' => 'DashboardMod02Controller',
		'action' => 'graficoPizza'
	);
	
	$routes['avaliarReclamacao'] = array(
		'route' => '/dashboard/avaliarReclamacao',
		'controller' => 'ReclamacoesController',
		'action' => 'avaliarReclamacao'
	);

	$routes['excluirReclamacao'] = array(
		'route' => '/dashboard/excluirReclamacao',
		'controller' => 'ReclamacoesController',
		'action' => 'excluirReclamacao'
	);

	$routes['mediaAvaliacao'] = array(
		'route' => '/dashboard/mediaAvaliacao',
		'controller' => 'DashboardMod02Controller',
		'action' => 'mediaAvaliacao'
	);
?>