<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\Alunos_Selecionados_EquipeModel;
    use App\DAO\Alunos_Selecionados_EquipeDAO;

    class Alunos_Selecionados_EquipeController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        
        public function selecionar(){ 
            
            $title = "Listagem de Alunos Selecionados para a Equipe - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $aluno_selecionadoDAO = new Alunos_Selecionados_EquipeDAO();
            $alunos_selecionados_equipe = $aluno_selecionadoDAO->selecionarAlunos();
            
            $this->getView()->alunos_selecionados_equipe = $alunos_selecionados_equipe;

            $this->render('selecionar','dashboard');
        }

        public function listar(){
            
            $title = "Listagem de Equipes - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $idResponsavel = $_GET["idResponsavel"];
                        
            $equipesModalidadesDAO = new Alunos_Selecionados_EquipeDAO();
            $equipes_responsavel_evento_modalidade = $equipesModalidadesDAO->listarEquipesResponsavel($idResponsavel);
            
            $this->getView()->equipes_responsavel_evento_modalidade = $equipes_responsavel_evento_modalidade;
            
            $this->render('listar','dashboard');
        }

        public function vincular() {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $equipeId = $_POST['equipeId']; // ID da equipe
                $eventoId = $_POST['eventoId']; // ID do evento
    
                $alunos_selecionados_equipeDAO = new Alunos_Selecionados_EquipeDAO();
                
               
                $resultado = $alunos_selecionados_equipeDAO->vincularEquipeAEvento($equipeId, $eventoId);
    
                if ($resultado) {
        
                    header('Location: /dashboard/eventos/listar');
                    exit; 
                } else {
                    // Em caso de erro
                    $this->getView()->mensagem = "Erro ao vincular a equipe ao evento. Tente novamente.";
                    $this->render('vincular', 'dashboard');
                }
            } else {
               
                $this->render('vincular', 'dashboard');
            }
        }

        public function justificar(){

            $title= "Justificar - Dashboard";
            /*$justificativaModel = new Alunos_Selecionados_EquipeModel();

            $justificativaModel->__set("ALS_JUSTIFICATIVA", $_POST['ALS_JUSTIFICATIVA']);

            $justificativaDAO = new Alunos_Selecionados_EquipeDAO();
            $justificativaDAO->inserir($justificativaModel);*/

            $this->getView()->title= $title;
            $this->render('justificar','dashboard');

            //header('Location:/dashboard/alunos_selecionados/alunos_nao_selecionados/justificar');

        }
        public function validaAutenticacao() {}
    }  

?>
