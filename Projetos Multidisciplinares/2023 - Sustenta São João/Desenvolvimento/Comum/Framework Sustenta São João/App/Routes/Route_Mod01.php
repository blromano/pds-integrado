<?php    
    /*  Dicionário de Rotas:
        (Coloque neste local o nome de cada rota que você utiliza em seu módulo juntamente com o caminho que ela executa)
        Nome da Rota     -     Caminho que executa
        ''               -     '/'
        'sobre'          -     '/sobre'


    */
            

	//Início das Rotas Relacionadas ao Welcome OBS: CADA ROTA DEVE TER UM NOME DIFERENTE DA OUTRA
	$routes[''] = array(
		'route' => '/', // quando apenas digitar a URL sem nenhum parâmetro
		'controller' => 'WelcomeController', // Vai no controller WelcomeController
		'action' => 'index' //  E executa o método index
	);
	$routes['sobre'] = array(  //Rota Sobre
		'route' => '/sobre', //URL /sobre
		'controller' => 'WelcomeController',// Vai no controller WelcomeController
		'action' => 'sobre' //Executa o método sobre
	);
	$routes['servicos'] = array( //Rota Serviços
		'route' => '/servicos', //URL /sobre
		'controller' => 'WelcomeController', // Vai no controller WelcomeController
		'action' => 'servicos' //Executa o método servicos
	);

	//Fim das Rotas da Welcome.

            
	//Início das Rodas da Dashboard
	
	//Esta rota faz o carregamento da Tela de Login
	$routes['dashboard'] = array(
		'route' => '/dashboard',
		'controller' => 'DashboardMod01Controller',
		'action' => 'dashboard'
	);

	//Esta rota faz o carregamento da dashboard        
	$routes['home'] = array(
		'route' => '/dashboard/home',
		'controller' => 'DashboardMod01Controller',
		'action' => 'dashboard'
	);

	$routes['usuario'] = array(
		'route' => '/dashboard/usuario',
		'controller' => 'DashboardMod01Controller',
		'action' => 'usuario'
	);
    
	$routes['cadastro'] = array(
		'route' => '/dashboard/cadastro',
		'controller' => 'DashboardMod01Controller',
		'action' => 'cadastro'
	);

	$routes['cadastrogestores'] = array(
		'route' => '/dashboard/cadastrogestores',
		'controller' => 'DashboardMod01Controller',
		'action' => 'cadastrogestores'
	);

	$routes['duvidas'] = array(
		'route' => '/dashboard/duvidas',
		'controller' => 'DashboardMod01Controller',
		'action' => 'duvidas'
	);

	$routes['login'] = array(
		'route' => '/login',
		'controller' => 'DashboardMod01Controller',
		'action' => 'login'
	);

	//essa rota faz o processamento de logout
	$routes['logout'] = array(
		'route' => '/logout',
		'controller' => 'DashboardMod01Controller',
		'action' => 'logout'
	);

	$routes['recuperarsenha1'] = array(
		'route' => '/recuperarsenha1',
		'controller' => 'DashboardMod01Controller',
		'action' => 'recuperarsenha1'
	);

	$routes['recuperarsenha2'] = array(
		'route' => '/recuperarsenha2',
		'controller' => 'DashboardMod01Controller',
		'action' => 'recuperarsenha2'
	);

	$routes['responderDuvidas'] = array(
		'route' => '/dashboard/responderDuvidas',
		'controller' => 'DashboardMod01Controller',
		'action' => 'responderDuvidas'
	);

	$routes['editarInfo'] = array(
		'route' => '/dashboard/editarInfo',
		'controller' => 'DashboardMod01Controller',
		'action' => 'editarInfo'
	);

	$routes['gestaoduvidas'] = array(
		'route' => '/dashboard/gestaoduvidas',
		'controller' => 'DashboardMod01Controller',
		'action' => 'gestaoduvidas'
	);
	$routes['inserirGestor'] = array(
		'route' => '/inserirGestor', 
		'controller' => 'GestorController', 
		'action' => 'inserirGestor' 
	);

	$routes['inserirCidadao'] = array(
		'route' => '/inserirCidadao', 
		'controller' => 'CidadaoController', 
		'action' => 'inserirCidadao' 
	);

	$routes['inserirDuvidas_Feedbacks'] = array(
		'route' => '/inserirDuvidas_Feedbacks', 
		'controller' => 'Duvidas_FeedbacksController', 
		'action' => 'inserirDuvidas_Feedbacks' 
	);

	$routes['inserirRespostasDuvidas_Feedbacks'] = array(
		'route' => '/inserirRespostas_Duvidas_Feedbacks', 
		'controller' => 'Respostas_Duvidas_FeedbacksController', 
		'action' => 'inserirRespostas_Duvidas_Feedbacks' 
	);

	$routes['excluirDuvidas_Feedbacks'] = array(
		'route' => '/dashboard/excluirDuvidas_Feedbacks',
		'controller' => 'Duvidas_FeedbacksController',
		'action' => 'excluirDuvidas_Feedbacks'
	);
	$routes['verificarLogin'] = array(
		'route' => '/verificarLogin',
		'controller' => 'LoginController',
		'action' => 'verificarLogin'
	);

	$routes['visualizarPerfil'] = array(
		'route' => '/dashboard/listarPerfil',
		'controller' => 'CidadaoController',
		'action' => 'formEditarCidadao'
	);
	
	$routes['editarPerfil'] = array(
		'route' => '/dashboard/editarCidadao',
		'controller' => 'CidadaoController',
		'action' => 'editar'
	);

	$routes['alterarPerfil'] = array(
		'route' => '/dashboard/alterarCidadao',
		'controller' => 'CidadaoController',
		'action' => 'alterar'
	);

	$routes['editarPerfilGestor'] = array(
		'route' => '/dashboard/editarGestor',
		'controller' => 'GestorController',
		'action' => 'editar'
	);

	$routes['alterarPerfilGestor'] = array(
		'route' => '/dashboard/alterarGestor',
		'controller' => 'GestorController',
		'action' => 'alterarGestor'
	);

	$routes['visualizarDuvidas'] = array(
		'route' => '/dashboard/visualizarDuvidas',
		'controller' => 'DashboardMod01Controller',
		'action' => 'visualizarDuvidas'
	);

	$routes['recuperarSenha'] = array(
		'route' => '/recuperarSenha',
		'controller' => 'RecuperarSenhaController',
		'action' => 'enviarEmail'
	);
?>