<?php
            $routes['eventos'] = array(
                'route' => '/evento',
                'controller' => 'EventosController',
                'action' => 'index'
            );

            //
            $routes['inscrever-se'] = array(
                'route' => '/dashboard/inscrever-se',
                'controller' => 'IndexController',
                'action' => 'inscreverse'
            );

        //exemplossss acima
        //////////////////////////////////////////////////////////////////////////////////////////////////

            $routes['grestricao'] = array(
                'route' => '/dashboard/grestricao',
                'controller' => 'GerenciarEventosOrganizadoresController',
                'action' => 'restricao'
            );

            $routes['gsecretarios'] = array(
                'route' => '/dashboard/gsecretarios',
                'controller' => 'GerenciarEventosOrganizadoresController',
                'action' => 'secretarios'
            );

            

            $routes['mudarsenhasecretario'] = array(
                'route' => '/dashboard/mudarsenhasecretario',
                'controller' => 'MudarsenhaController',
                'action' => 'mudarsenhasec'
            );
			
			//////////////////////////////////////////////////////////////////////
			
           $routes['listarsecretario'] = array(
                'route' => '/dashboard/listarsecretario',
                'controller' => 'ListarsecController',
                'action' => 'listarsec'

                // POR FAVOR, INSERIR ESTA ROTA NO MENU
            );
          
	        $routes['listarorganizador'] = array(
                'route' => '/dashboard/listarorganizador',
                'controller' => 'ListarorgController',
                'action' => 'listarorg'

                // POR FAVOR, INSERIR ESTA ROTA NO MENU
            );

            $routes['cadastrarorganizador'] = array(
                'route' => '/dashboard/cadastrarorganizador',
                'controller' => 'CadastrarorgController',
                'action' => 'cadastrarorg'

               
            );

            $routes['cadastrarorsecretario'] = array(
                'route' => '/dashboard/cadastrarsecretario',
                'controller' => 'CadastrarsecController',
                'action' => 'cadastrarsec'

                
            );
            
            $routes['editarorganizador'] = array(
                'route' => '/dashboard/editarorganizador',
                'controller' => 'EditarorgController',
                'action' => 'editarorg'
            );

            $routes['editarsecretario'] = array(
                'route' => '/dashboard/editarsecretario',
                'controller' => 'EditarsecController',
                'action' => 'editarsec'
            );

            $routes['mudarsenha'] = array(
                'route' => '/dashboard/mudarsenha',
                'controller' => 'MudarsenhaController',
                'action' => 'mudarsenha'

                // POR FAVOR, INSERIR ESTA ROTA NO MENU
            );

            $routes['restringir'] = array(
                'route' => '/dashboard/restringir',
                'controller' => 'RestringirController',
                'action' => 'restringir'
            );

            

            
?>