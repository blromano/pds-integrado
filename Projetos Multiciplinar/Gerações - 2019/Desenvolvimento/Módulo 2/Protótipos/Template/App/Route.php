<?php

    namespace App;
    
    use FW\Init\Bootstrap;
    
    class Route extends Bootstrap{
                
        protected function initRoutes(){
            
            $routes['index'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );            
            
            $routes['sobre'] = array(
                'route' => '/sobre',
                'controller' => 'IndexController',
                'action' => 'sobre'
            );         
            
            $routes['nos'] = array(
                'route' => '/nos',
                'controller' => 'IndexController',
                'action' => 'nos'
            ); 
            
            $routes['login'] = array(
                'route' => '/login',
                'controller' => 'IndexController',
                'action' => 'login'
            ); 
            
            $routes['dashboard'] = array(
                'route' => '/dashboard',
                'controller' => 'DashboardController',
                'action' => 'index'
            );
            
            $routes['md9-index'] = array(
                'route' => '/md9/',
                'controller' => 'Modulo09Controller',
                'action' => 'index'
            );
            
            $routes['md1-index'] = array(
                'route' => '/md1/',
                'controller' => 'Modulo01Controller',
                'action' => 'index'
            );
            $routes['md2-cadastromedicamento'] = array(
                'route' => '/md2/cadastromedicamento',
                'controller' => 'Modulo02Controller',
                'action' => 'cadastromedicamento'
            ); 
            $routes['md2-cadastrarmedicacao'] = array(
                'route' => '/md2/cadastrarmedicacao',
                'controller' => 'Modulo02Controller',
                'action' => 'cadastrarmedicacao'
            );
            $routes['md2-idosoedfisico'] = array(
                'route' => '/md2/idosoedfisico',
                'controller' => 'Modulo02Controller',
                'action' => 'idosoedfisico'
            );
            $routes['md2-idosoenf'] = array(
                'route' => '/md2/idosoenf',
                'controller' => 'Modulo02Controller',
                'action' => 'idosoenf'
            );
            $routes['md2-analiseclinica'] = array(
                'route' => '/md2/analiseclinica',
                'controller' => 'Modulo02Controller',
                'action' => 'analiseclinica'
            );
            $routes['md2-cadastroidoso'] = array(
                'route' => '/md2/cadastroidoso',
                'controller' => 'Modulo02Controller',
                'action' => 'cadastroidoso'
            );
            $routes['md2-cadastroidoso'] = array(
                'route' => '/md2/cadastroidoso',
                'controller' => 'Modulo02Controller',
                'action' => 'cadastroidoso'
            );
            $routes['md2-cadastrodoenca'] = array(
                'route' => '/md2/cadastrodoenca',
                'controller' => 'Modulo02Controller',
                'action' => 'cadastrodoenca'
            );
            $routes['md2-listar'] = array(
                'route' => '/md2/listar',
                'controller' => 'Modulo02Controller',
                'action' => 'listar'
            );
            $routes['md2-registrar_analise_clinica'] = array(
                'route' => '/md2/registrar_analise_clinica',
                'controller' => 'Modulo02Controller',
                'action' => 'registrar_analise_clinica'
            );
            $routes['md2-listar_analise'] = array(
                'route' => '/md2/listar_analise',
                'controller' => 'Modulo02Controller',
                'action' => 'listar_analise'
            );
            $routes['md2-registrardoenca'] = array(
                'route' => '/md2/registrardoenca',
                'controller' => 'Modulo02Controller',
                'action' => 'registrardoenca'
            );
            $routes['md2-registrorestricoes'] = array(
                'route' => '/md2/registrorestricoes',
                'controller' => 'Modulo02Controller',
                'action' => 'registrorestricoes'
            );
            $routes['md2-listar_restricoes'] = array(
                'route' => '/md2/listar_restricoes',
                'controller' => 'Modulo02Controller',
                'action' => 'listar_restricoes'
            );
            
            $routes['md2-editar_restricoes'] = array(
                'route' => '/md2/editar_restricoes',
                'controller' => 'Modulo02Controller',
                'action' => 'editar_restricoes'
            );
            $routes['md2-excluir_restricoes'] = array(
                'route' => '/md2/excluir_restricoes',
                'controller' => 'Modulo02Controller',
                'action' => 'excluir_restricoes'
            );
            $routes['md2-registroalergia'] = array(
                'route' => '/md2/registroalergia',
                'controller' => 'Modulo02Controller',
                'action' => 'registroalergia'
            );
            $routes['md2-listar_alergia'] = array(
                'route' => '/md2/listar_alergia',
                'controller' => 'Modulo02Controller',
                'action' => 'listar_alergia'
            );
            $routes['md2-editar_alergia'] = array(
                'route' => '/md2/editar_alergia',
                'controller' => 'Modulo02Controller',
                'action' => 'editar_alergia'
            );
            $routes['md2-excluir_alergia'] = array(
                'route' => '/md2/excluir_alergia',
                'controller' => 'Modulo02Controller',
                'action' => 'excluir_alergia'
            );
            $routes['md2-ficha'] = array(
                'route' => '/md2/ficha',
                'controller' => 'Modulo02Controller',
                'action' => 'ficha'
            );
            $routes['md2-listar_medicamentos'] = array(
                'route' => '/md2/listar_medicamentos',
                'controller' => 'Modulo02Controller',
                'action' => 'listar_medicamentos'
            );
            $routes['md2-registrar_medicamentos'] = array(
                'route' => '/md2/registrar_medicamentos',
                'controller' => 'Modulo02Controller',
                'action' => 'registrar_medicamentos'
            );
            $routes['md2-registrar_doencas'] = array(
                'route' => '/md2/registrar_doencas',
                'controller' => 'Modulo02Controller',
                'action' => 'registrar_doencas'
            );
            $routes['md2-listar_doencas'] = array(
                'route' => '/md2/listar_doencas',
                'controller' => 'Modulo02Controller',
                'action' => 'listar_doencas'
            );
            
            $routes['md2-editar_doencas'] = array(
                'route' => '/md2/editar_doencas',
                'controller' => 'Modulo02Controller',
                'action' => 'editar_doencas'
            );
            $routes['md2-excluir_restricoes'] = array(
                'route' => '/md2/excluir_doencas',
                'controller' => 'Modulo02Controller',
                'action' => 'excluir_doencas'
            );
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
