<?php    
    
            
	
	$routes['cadastroPessoa'] = array(
		'route' => '/cadastroPessoa', 
		'controller' => 'PessoaController', 
		'action' => 'formCadastroPessoa' 
	);
    $routes['inserirPessoa'] = array(
		'route' => '/inserirPessoa', 
		'controller' => 'PessoaController', 
		'action' => 'inserirPessoa' 
	);

    $routes['editarPessoa'] = array(
		'route' => '/editarPessoa', 
		'controller' => 'PessoaController', 
		'action' => 'formEditarPessoa' 
	);

    $routes['alterarPessoa'] = array(
		'route' => '/alterarPessoa', 
		'controller' => 'PessoaController', 
		'action' => 'alterarPessoa' 
	);

    $routes['listarPessoa'] = array(
		'route' => '/listarPessoa', 
		'controller' => 'PessoaController', 
		'action' => 'listarPessoa' 
	);

    $routes['excluirPessoa'] = array(
		'route' => '/excluirPessoa', 
		'controller' => 'PessoaController', 
		'action' => 'excluirPessoa' 
	);

