<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\Model\InternacoesMedicasModel;
    use App\DAO\InternacoesMedicasDAO;
    
    class InternacoesMedicasController extends Action{

        public function internar(){      
            $title = "Nova Internação Médica";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;
                 
            $this->render('index', 'dashboard');
        }
          
        public function validaAutenticacao() {}

        public function inserir(){
            $internacoes_medicas = new InternacoesMedicasModel(); //Instanciando a Classe InternacoesMedicasModel
            $internacoes_medicasDAO = new InternacoesMedicasDAO(); // Instanciando a Classe InternacoesMedicasDAO

            if( !isset($_POST['INM_TEMPOINTERNACAO']) || 
                !isset($_POST['INM_ACOMPANHAMENTOCLINICO']) ||
                !isset($_POST['INM_NECESSIDADESCLINICAS']) || 
                !isset($_POST['INM_CAUSAINTERNACAO']) 
                ){ //Verificando se os dados que estão vindo do formulário existem
                    header('Location: /internacoes_medicas?status=203'); //Redirecionando caso os dados não existam
                    die();

            }

                $internacoes_medicas->__set('INM_TEMPOINTERNACAO', $_POST['INM_TEMPOINTERNACAO']);
                $internacoes_medicas->__set('INM_ACOMPANHAMENTOCLINICO', $_POST['INM_ACOMPANHAMENTOCLINICO']);
                $internacoes_medicas->__set('INM_NECESSIDADESCLINICAS', $_POST['INM_NECESSIDADESCLINICAS']);
                $internacoes_medicas->__set('INM_PRESCRICAOMEDICA', $_POST['INM_PRESCRICAOMEDICA']);
                $internacoes_medicas->__set('INM_CAUSAINTERNACAO', $_POST['INM_CAUSAINTERNACAO']);
                // print_r($internacoes_medicas);
                // exit(0);
            
                $internacoes_medicasDAO->inserir($internacoes_medicas);

                header('Location: /listagem_internacoes_medicas'); 

        }

        public function editar(){     
            // $inm_id = 1;
            
            $internacoes_medicas = new InternacoesMedicasModel();
            $InternacoesMedicasDAO = new InternacoesMedicasDAO();

            if (isset($_GET['id'])) {
                $internacoes_medicas = $InternacoesMedicasDAO->buscarPorId($_GET['id']);
                if ($internacoes_medicas) { 
                    $this->getView()->internacoes_medicas = $internacoes_medicas;
                } else {
                    header('Location: /error404');
                    die();
                }
            } 
            $title = "Internação Médica";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;
                 
            $this->render('editarInternacoesMedicas/index', 'dashboard');
        }

        public function atualizar(){
            $internacoes_medicas = new InternacoesMedicasModel();
            $internacoesMedicasDAO = new InternacoesMedicasDAO();


            
            $internacoes_medicas->__set('INM_TEMPOINTERNACAO', $_POST['INM_TEMPOINTERNACAO']);
            $internacoes_medicas->__set('INM_ACOMPANHAMENTOCLINICO', $_POST['INM_ACOMPANHAMENTOCLINICO']);
            $internacoes_medicas->__set('INM_NECESSIDADESCLINICAS', $_POST['INM_NECESSIDADESCLINICAS']);
            // $internacoes_medicas->__set('INM_PRESCRICAOMEDICA', $_POST['INM_PRESCRICAOMEDICA']);
            $internacoes_medicas->__set('INM_CAUSAINTERNACAO', $_POST['INM_CAUSAINTERNACAO']);
            $internacoes_medicas->__set('INM_ID', $_POST['INM_ID']);

            $internacoesMedicasDAO->alterar($internacoes_medicas);
            header('Location: /listagem_internacoes_medicas');
        }

        public function listagem(){
            $title = "Internações Médicas";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            // $internacoesMedicas;
            $InternacoesMedicasDAO = new InternacoesMedicasDAO();            
            $internacoesMedicas = $InternacoesMedicasDAO->listar(); 
            $this->getView()->internacoesMedicas = $internacoesMedicas;                      
            $this->render('listagemInternacoesMedicas/index', 'dashboard', '');
        }

        public function excluir(){
            $InternacoesMedicasDAO = new InternacoesMedicasDAO(); 

            print_r($_GET['id']);

            if(isset($_GET['id'])){
                $InternacoesMedicasDAO->excluir($_GET['id']); //Pega o ID do InternacoesMedicas a ser excluido, aciona o médoto excluir de InternacoesMedicasDAO
                header('Location: /listagem_internacoes_medicas'); //redireciona para /InternacoesMedicass após exclusão
            }
        }
    }