<?php    
    namespace App;
    
    use FW\Init\Boostrap;
    
    class Route extends Boostrap{
     
        public function initRoutes(){
            
            include "Rotas/Rotas_Administradores.php";
            include "Rotas/Rotas_Alunos.php";
            include "Rotas/Rotas_Alunos_Inscritos_Eventos.php";
            include "Rotas/Rotas_Alunos_Inscritos_Modalidades.php";
            include "Rotas/Rotas_Alunos_Selecionados_Equipe.php";
            include "Rotas/Rotas_Campus.php";
            include "Rotas/Rotas_Campus_Cursos.php";
            include "Rotas/Rotas_Cidades.php";
            include "Rotas/Rotas_Cursos.php";
            include "Rotas/Rotas_Denuncias.php";
            include "Rotas/Rotas_Estados.php";
            include "Rotas/Rotas_Eventos.php";
            include "Rotas/Rotas_Eventos_Modalidades.php";
            include "Rotas/Rotas_Eventos_Secretarios.php";
            include "Rotas/Rotas_Feedback_Aluno.php";
            include "Rotas/Rotas_Fotos.php";
            include "Rotas/Rotas_Login.php";
            include "Rotas/Rotas_Modalidades.php";
            include "Rotas/Rotas_Organizadores_Eventos.php";
            include "Rotas/Rotas_Responsaveis_Equipe.php";
            include "Rotas/Rotas_Resultados.php";
            include "Rotas/Rotas_Secretarios_Eventos.php";
            include "Rotas/Rotas_Welcome.php";
            include "Rotas/Rotas_Error.php";
            include "Rotas/Rotas_Certificado.php";
            include "Rotas/Rotas_Dashboard.php";
            include "Rotas/Rotas_Responsavel_Evento_Modalidade.php";



                                  
            $this->setRoutes($routes);
        }
    }  
?>