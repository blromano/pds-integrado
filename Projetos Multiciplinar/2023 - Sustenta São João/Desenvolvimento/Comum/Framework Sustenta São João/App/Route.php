<?php    
    namespace App;
    
    use FW\Init\Boostrap;

    class Route extends Boostrap{
     
        public function initRoutes(){

            

            include ('Routes/Route_Mod01.php');
            include ('Routes/Route_Mod02.php');
            include ('Routes/Route_Mod03.php');
            include ('Routes/Route_Mod04.php');
            include ('Routes/Route_Mod05.php');
            include ('Routes/Route_Exemplo.php');
           
            
            //Rota de Erro
            $routes['error404'] = array(
                'route' => '/error404',
                'controller' => 'ErrorController',
                'action' => 'index'
            );

            $this->setRoutes($routes);                       
            
            
        }

    }
    
?>