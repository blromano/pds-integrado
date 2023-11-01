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

            $routes['md5-medicamentos'] = array(
                'route' => '/md5/medicamentos',
                'controller' => 'Modulo05Controller',
                'action' => 'medicamentos'
            );

            $routes['md5-cadastrarMedicamento'] = array(
                'route' => '/md5/cadastrarMedicamento',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarMedicamento'
            );

            $routes['md5-editarMedicamento'] = array(
                'route' => '/md5/editarMedicamento',
                'controller' => 'Modulo05Controller',
                'action' => 'editarMedicamento'
            );

            $routes['md5-excluirMedicamento'] = array(
                'route' => '/md5/excluirMedicamento',
                'controller' => 'Modulo05Controller',
                'action' => 'excluirMedicamento'
            );
            
            $routes['md5-vacinas'] = array(
                'route' => '/md5/vacinas',
                'controller' => 'Modulo05Controller',
                'action' => 'vacinas'
            );

            $routes['md5-cadastrarVacina'] = array(
                'route' => '/md5/cadastrarVacina',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarVacina'
            );

            $routes['md5-editarVacina'] = array(
                'route' => '/md5/editarVacina',
                'controller' => 'Modulo05Controller',
                'action' => 'editarVacina'
            );

            $routes['md5-excluirVacina'] = array(
                'route' => '/md5/excluirVacina',
                'controller' => 'Modulo05Controller',
                'action' => 'excluirVacina'
            );
            
            $routes['md5-patologias'] = array(
                'route' => '/md5/patologias',
                'controller' => 'Modulo05Controller',
                'action' => 'patologias'
            );

            $routes['md5-cadastrarPatologia'] = array(
                'route' => '/md5/cadastrarPatologia',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarPatologia'
            );

            $routes['md5-editarPatologia'] = array(
                'route' => '/md5/editarPatologia',
                'controller' => 'Modulo05Controller',
                'action' => 'editarPatologia'
            );

            $routes['md5-excluirPatologia'] = array(
                'route' => '/md5/excluirPatologia',
                'controller' => 'Modulo05Controller',
                'action' => 'excluirPatologia'
            );

            $routes['md5-pesquisarIdoso'] = array(
                'route' => '/md5/pesquisa',
                'controller' => 'Modulo05Controller',
                'action' => 'pesquisa'
            );
            
            $routes['md5-analisesClinicas'] = array(
                'route' => '/md5/analisesClinicas',
                'controller' => 'Modulo05Controller',
                'action' => 'analisesClinicas' 
            );

            $routes['md5-cadastrarAnalise'] = array(
                'route' => '/md5/cadastrarAnalise',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarAnalise' 
            );

            $routes['md5-editarAnalise'] = array(
                'route' => '/md5/editarAnalise',
                'controller' => 'Modulo05Controller',
                'action' => 'editarAnalise' 
            );

            $routes['md5-vacinacoes'] = array(
                'route' => '/md5/vacinacoes',
                'controller' => 'Modulo05Controller',
                'action' => 'vacinacoes' 
            );

            $routes['md5-cadastrarVacinacao'] = array(
                'route' => '/md5/cadastrarVacinacao',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarVacinacao' 
            );

             $routes['md5-editarVacinacao'] = array(
                'route' => '/md5/editarVacinacao',
                'controller' => 'Modulo05Controller',
                'action' => 'editarVacinacao' 
            );

            $routes['md5-prescricoes'] = array(
                'route' => '/md5/prescricoes',
                'controller' => 'Modulo05Controller',
                'action' => 'prescricoes' 
            );

            $routes['md5-cadastrarPrescricao'] = array(
                'route' => '/md5/cadastrarPrescricao',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarPrescricao' 
            );

            $routes['md5-editarPrescricao'] = array(
                'route' => '/md5/editarPrescricao',
                'controller' => 'Modulo05Controller',
                'action' => 'editarPrescricao' 
            );

            $routes['md5-visualizarPrescricao'] = array(
                'route' => '/md5/visualizarPrescricao',
                'controller' => 'Modulo05Controller',
                'action' => 'visualizarPrescricao' 
            );

            $routes['md5-incidentes'] = array(
                'route' => '/md5/incidentes',
                'controller' => 'Modulo05Controller',
                'action' => 'incidentes' 
            );

            $routes['md5-cadastrarIncidente'] = array(
                'route' => '/md5/cadastrarIncidente',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarIncidente' 
            );

            $routes['md5-editarIncidente'] = array(
                'route' => '/md5/editarIncidente',
                'controller' => 'Modulo05Controller',
                'action' => 'editarIncidente' 
            );

            $routes['md5-patologiasIdoso'] = array(
                'route' => '/md5/patologiasIdoso',
                'controller' => 'Modulo05Controller',
                'action' => 'patologiasIdoso' 
            );

            $routes['md5-cadastrarPI'] = array(
                'route' => '/md5/cadastrarPI',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarPI' 
            );

            $routes['md5-historicoEvolucao'] = array(
                'route' => '/md5/historicoEvolucao',
                'controller' => 'Modulo05Controller',
                'action' => 'historicoEvolucao' 
            );

            $routes['md5-cadastrarEvolucao'] = array(
                'route' => '/md5/cadastrarEvolucao',
                'controller' => 'Modulo05Controller',
                'action' => 'cadastrarEvolucao' 
            );

            $this->setRoutes($routes);
            
        }        
                        
    }

?>
