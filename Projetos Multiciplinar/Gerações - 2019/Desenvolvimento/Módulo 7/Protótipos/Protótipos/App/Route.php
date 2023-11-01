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
            
            $routes['md7-index'] = array(
                'route' => '/md7/',
                'controller' => 'Modulo07Controller',
                'action' => 'index'
            );
            
            $routes['md7-AlterarAtividadeFisica'] = array(
                'route' => '/md7/AlterarAtividadeFisica',
                'controller' => 'Modulo07Controller',
                'action' => 'AlterarAtividadeFisica'
            );
            
            $routes['md7-AlterarTreinamentoFisico'] = array(
                'route' => '/md7/AlterarTreinamentoFisico',
                'controller' => 'Modulo07Controller',
                'action' => 'AlterarTreinamentoFisico'
            );
            
            $routes['md7-CadastrarAtividadeFisica'] = array(
                'route' => '/md7/CadastrarAtividadeFisica',
                'controller' => 'Modulo07Controller',
                'action' => 'CadastrarAtividadeFisica'
            );
            
            $routes['md7-CadastrarTreinamentoFisico'] = array(
                'route' => '/md7/CadastrarTreinamentoFisico',
                'controller' => 'Modulo07Controller',
                'action' => 'CadastrarTreinamentoFisico'
            );
            
            $routes['md7-ListarTreinamentoFisico'] = array(
                'route' => '/md7/ListarTreinamentoFisico',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarTreinamentoFisico'
            );
            
            $routes['md7-ListarAtividadeFisica'] = array(
                'route' => '/md7/ListarAtividadeFisica',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarAtividadeFisica'
            );
            
            $routes['md7-ListarTreinamentoFisico'] = array(
                'route' => '/md7/ListarTreinamentoFisico',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarTreinamentoFisico'
            );
            
            $routes['md7-VerMaisSobreTreinamentoFisico'] = array(
                'route' => '/md7/VerMaisSobreTreinamentoFisico',
                'controller' => 'Modulo07Controller',
                'action' => 'VerMaisSobreTreinamentoFisico'
            );
            $routes['md7-VisualizarTreinamentoFisico'] = array(
                'route' => '/md7/VisualizarTreinamentoFisico',
                'controller' => 'Modulo07Controller',
                'action' => 'VisualizarTreinamentoFisico'
            );
            $routes['md7-RegistrarConsulta'] = array(
                'route' => '/md7/RegistrarConsulta',
                'controller' => 'Modulo07Controller',
                'action' => 'RegistrarConsulta'
            );
            $routes['md7-ListarConsultas'] = array(
                'route' => '/md7/ListarConsultas',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarConsultas'
            );
            $routes['md7-CadastrarConsultaIdosos'] = array(
                'route' => '/md7/CadastrarConsultaIdosos',
                'controller' => 'Modulo07Controller',
                'action' => 'CadastrarConsultaIdosos'
            );
            $routes['md7-CadastrarAtividadeRecreativa'] = array(
                'route' => '/md7/CadastrarAtividadeRecreativa',
                'controller' => 'Modulo07Controller',
                'action' => 'CadastrarAtividadeRecreativa'
            );
            $routes['md7-ListarAtividadeRecreativa'] = array(
                'route' => '/md7/ListarAtividadeRecreativa',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarAtividadeRecreativa'
            );
            $routes['md7-AlterarAtividadeRecreativa'] = array(
                'route' => '/md7/AlterarAtividadeRecreativa',
                'controller' => 'Modulo07Controller',
                'action' => 'AlterarAtividadeRecreativa'
            );
            $routes['md7-AlterarPlanoMensal'] = array(
                'route' => '/md7/AlterarPlanoMensal',
                'controller' => 'Modulo07Controller',
                'action' => 'AlterarPlanoMensal'
            );
            $routes['md7-CadastrarPlanejamentoMensal'] = array(
                'route' => '/md7/CadastrarPlanejamentoMensal',
                'controller' => 'Modulo07Controller',
                'action' => 'CadastrarPlanejamentoMensal'
            );
            $routes['md7-ListaPresencaAtividadeRecreativa'] = array(
                'route' => '/md7/ListaPresencaAtividadeRecreativa',
                'controller' => 'Modulo07Controller',
                'action' => 'ListaPresencaAtividadeRecreativa'
            );
            $routes['md7-ListarPlanejamentoMensal'] = array(
                'route' => '/md7/ListarPlanejamentoMensal',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarPlanejamentoMensal'
            );
            $routes['md7-ListarEducadoresFisicosFisioterapeuta'] = array(
                'route' => '/md7/ListarEducadoresFisicosFisioterapeuta',
                'controller' => 'Modulo07Controller',
                'action' => 'ListarEducadoresFisicosFisioterapeuta'
            );
         
            
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
