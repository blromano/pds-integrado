<?php    

    /*  Dicionário de Rotas:
        (Coloque neste local o nome de cada rota que você utiliza em seu módulo juntamente com o caminho que ela executa)
        Nome da Rota    	 -     Caminho que executa
        ''              	 -     '/'
        'sobre'         	 -     '/sobre'
				'cadastrarDenuncia'  -	   '/dashboard/cadastrarDenuncia'
				'inserirDenuncia'    -	   '/dashboard/inserirDenuncia'
				'gestaoDenuncia'     -	   '/dashboard/gestaoDenuncia'
				'listarDenuncia'     -	   '/dashboard/listarDenuncia'
				'editarDenuncia'     -	   '/dashboard/editarDenuncia'
				'adicionarComentario'-	   '/dashboard/adicionarComentario'
				'excluirComentario'  -	   '/dashboard/excluirComentario'
				'editarComentario'   -	   '/dashboard/editarComentario'
				'listarViolacaoUso'  -	   '/dashboard/listarViolacaoUso'
				'meusComentarios'    -	   '/dashboard/meusComentarios'
				'visualizarDenuncia' -	   '/dashboard/visualizarDenuncia'
				'feedDenuncia'       -	   '/dashboard/feedDenuncia'
				'Denuncia'           -	   '/dashboard/Denuncia'
				'Curtir'             -	   '/dashboard/curtir'
				'Excluir'            -	   '/dashboard/excluir'
				'Reenviar'           -	   '/dashboard/reenviar'
    */   

    $routes['cadastrarDenuncia'] = array(
		'route' => '/dashboard/cadastrarDenuncia',
		'controller' => 'DashboardMod03Controller',
		'action' => 'cadastrarDenuncia'
	);

	$routes['inserirDenuncia'] = array(
		'route' => '/dashboard/inserirDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'inserirDenuncia'
	);

	$routes['gestaoDenuncia'] = array(
		'route' => '/dashboard/gestaoDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'gestaoDenuncia'
	);

	$routes['alterarStatusDenuncia'] = array(
		'route' => '/dashboard/alterarStatusDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'alterarStatusDenuncia'
	);
	

	$routes['editarDenunciaSelecionada'] = array(
		'route' => '/dashboard/editarDenunciaSelecionada',
		'controller' => 'DenunciasController',
		'action' => 'editarDenunciaSelecionada'
	);

	$routes['editarDenuncia'] = array(
		'route' => '/dashboard/editarDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'editarDenuncia'
	);
	
	$routes['adicionarComentario'] = array(
		'route' => '/dashboard/adicionarComentario',
		'controller' => 'ComentarioController',
		'action' => 'adicionarComentario'
	);

	$routes['adicionarComentario2'] = array(
		'route' => '/dashboard/adicionar',
		'controller' => 'ComentarioController',
		'action' => 'adicionar'
	);
	
	$routes['excluirComentario'] = array(
		'route' => '/dashboard/excluirComentario',
		'controller' => 'ComentarioController',
		'action' => 'excluirComentario'
	);
	
	$routes['editarComentario'] = array(
		'route' => '/dashboard/editarComentario',
		'controller' => 'ComentarioController',
		'action' => 'editarComentario'
	);

	$routes['editarComentarioSelecionado'] = array(
		'route' => '/dashboard/editarComentarioSelecionado',
		'controller' => 'ComentarioController',
		'action' => 'editarComentarioSelecionado'
	);
	
	$routes['listarViolacaoUso'] = array(
		'route' => '/dashboard/listarViolacaoUso',
		'controller' => 'DashboardMod03Controller',
		'action' => 'listarViolacaoUso'
	);
	
	$routes['meusComentarios'] = array(
		'route' => '/dashboard/meusComentarios',
		'controller' => 'ComentarioController',
		'action' => 'meusComentarios'
	);
	
	$routes['visualizarDenuncia'] = array(
		'route' => '/dashboard/visualizarDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'visualizarDenuncia'
	);
	
	$routes['listarDenuncias'] = array(
		'route' => '/dashboard/listarDenuncias',
		'controller' => 'DenunciasController',
		'action' => 'listarDenuncias'
	);

	$routes['feedDenuncia'] = array(
		'route' => '/dashboard/feedDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'feedDenuncia'
	);

	$routes['reportarViolacao'] = array(
		'route' => '/dashboard/reportarViolacao',
		'controller' => 'DenunciasController',
		'action' => 'reportarViolacao'
	);

	$routes['reportarDenuncia'] = array(
		'route' => '/dashboard/reportarDenuncia',
		'controller' => 'DenunciasController',
		'action' => 'reportarDenuncia'
	);
	
	$routes['Curtir'] = array(
		'route' => '/dashboard/curtir_descurtir',
		'controller' => 'DenunciasCurtidasController',
		'action' => 'curtirDescurtirDenuncia'
	);

	$routes['Excluir'] = array(
		'route' => '/dashboard/excluir-denuncia',
		'controller' => 'DenunciasController',
		'action' => 'excluirDenuncia'
	);
	$routes['Reenviar'] = array(
		'route' => '/dashboard/reenviar-denuncia',
		'controller' => 'DenunciasController',
		'action' => 'reenviarDenuncia'
	);


	?>