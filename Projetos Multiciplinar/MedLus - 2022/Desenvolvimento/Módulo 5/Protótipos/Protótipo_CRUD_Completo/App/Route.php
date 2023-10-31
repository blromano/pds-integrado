<?php    
    namespace App;
    
    use FW\Init\Boostrap;
    
    class Route extends Boostrap{
     
        public function initRoutes(){
                       
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );
            
            $routes['dashboard'] = array(
                'route' => '/dashboard',
                'controller' => 'DashBoardController',
                'action' => 'index'
            );
            
            $routes['error404'] = array(
                'route' => '/error404',
                'controller' => 'ErrorController',
                'action' => 'index'
            );

            $routes['usuario-cadastrar'] = array(
                'route' => '/usuario/cadastrar',
                'controller' => 'UsuarioController',
                'action' => 'cadastrar'
            );

            $routes['usuario-cadastro-msg'] = array(
                'route' => '/usuario/cadastro',
                'controller' => 'UsuarioController',
                'action' => 'msgs'
            ); 

            $routes['usuario-inserir'] = array(
                'route' => '/usuario/inserir',
                'controller' => 'UsuarioController',
                'action' => 'inserir'
            ); 

            $routes['usuario-inserir-erro100'] = array(
                'route' => '/error100',
                'controller' => 'ErrorController',
                'action' => 'inserirUsuario'
            ); 

            $routes['usuario-editar'] = array(
                'route' => '/usuario/editar',
                'controller' => 'UsuarioController',
                'action' => 'editar'
            );

            $routes['usuario-atualizar'] = array(
                'route' => '/usuario/atualizar',
                'controller' => 'UsuarioController',
                'action' => 'atualizar'
            );

            $routes['usuario-listagem'] = array(
                'route' => '/usuarios',
                'controller' => 'UsuarioController',
                'action' => 'listagem'
            );

            
            $routes['usuario-excluir'] = array(
                'route' => '/usuario/excluir',
                'controller' => 'UsuarioController',
                'action' => 'excluir'
            );

            

                                  
            
            
            $this->setRoutes($routes);                       
            
            
        }

    }
    
?>