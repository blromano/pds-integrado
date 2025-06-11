<?php 

        //Rota para login  
        $routes['login'] = array(
            'route' => '/login',
            'controller' => 'LoginController',
            'action' => 'login'
        );
        $routes['logar'] = array(
            'route' => '/logar',
            'controller' => 'LoginController',
            'action' => 'logar'
        );


        //Inscrever-se
        $routes['inscrever-se'] = array(
            'route' => '/dashboard/inscrever-se',
            'controller' => 'LoginController',
            'action' => 'inscreverse'
        );

        $routes['recuperarsenha'] = array(
            'route' => '/dashboard/recuperarsenha',
            'controller' => 'LoginController',
            'action' => 'recuperarsenha'
        );

        $routes['enviarRecuperacaoSenha'] = array(
            'route' => '/enviarRecuperacaoSenha',
            'controller' => 'LoginController',
            'action' => 'enviarRecuperacaoSenha'
        );

        $routes['recuperarsenha2'] = array(
            'route' => '/recuperarsenha2',
            'controller' => 'LoginController',
            'action' => 'recuperarsenha2'
        );

        $routes['editarinfo'] = array(
            'route' => '/dashboard/info',
            'controller' => 'LoginController',
            'action' => 'editarinfo'
        );

        $routes['alterar'] = array(
            'route' => '/dashboard/info/alterar',
            'controller' => 'LoginController',
            'action' => 'alterar'
        );
       
        $routes['acessarperfildousuario'] = array(
            'route' => '/acessar-perfil/usuario',
            'controller' => 'LoginController',
            'action' => 'acessarperfildousuario'
        );

        

