<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\Model\TriagemPresencialModel;
    use App\DAO\TriagemPresencialDAO;
    
    class TriagemPresencialController extends Action{

        public function gerenciar(){      
            $title = "Gerenciar Triagem";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            // $triagemPresencial;
            // $triagemPresencialDAO = new TriagemPresencialDAO;
            // $triagemPresencial = $triagemPresencialDAO->inserir();
            // $this->getView()->TriagemPresencial = $triagemPresencial;
                 
            $this->render('index', 'dashboard');
        }
          
        public function validaAutenticacao() {}

        public function inserir(){
            $triagempresencial = new TriagemPresencialModel(); //Instanciando a Classe TriagempresencialModel
            $TriagemPresencialDAO = new TriagempresencialDAO(); // Instanciando a Classe TriagempresencialDAO

           
            if( !isset($_POST['TRI_HORA_TRIAGEM']) || 
                !isset($_POST['TRI_ENDERECO_SETOR']) ||
                !isset($_POST['TRI_PRESSAOSISTOLICA']) || 
                !isset($_POST['TRI_ALTURA']) ||
                !isset($_POST['TRI_SINTOMAS']) || 
                !isset($_POST['TRI_ATENDIMENTOPREFERENCIAL']) ||
                !isset($_POST['TRI_TEMPERATURA']) || 
                !isset($_POST['TRI_PRESSAODIASTOLICA']) ||
                !isset($_POST['TRI_PESO']) || 
                !isset($_POST['TRI_ALERGIAS']) ||
                !isset($_POST['TRI_INFORMACOESADICIONAIS']) 
                // !isset($_POST['TRI_FK_ENFERMEIROS_ENF_ID']) ||
                // !isset($_POST['TRI_FK_CONSULTAS_PRESENCIAIS_TRI_ID'])
                ){ 
                    //Verificando se os dados que estão vindo do formulário existem
                
                header('Location: /triagempresencial/cadastrar?status=203'); //Redirecionando caso os dados não existam
                die();
            }
            else {
                

                $triagempresencial->__set('TRI_ENDERECO_SETOR', $_POST['TRI_ENDERECO_SETOR']);
                $triagempresencial->__set('TRI_ALTURA', $_POST['TRI_ALTURA']);
                $triagempresencial->__set('TRI_PESO', $_POST['TRI_PESO']);
                $triagempresencial->__set('TRI_HORA_TRIAGEM', $_POST['TRI_HORA_TRIAGEM']);
                $triagempresencial->__set('TRI_SINTOMAS', $_POST['TRI_SINTOMAS']);
                $triagempresencial->__set('TRI_ATENDIMENTOPREFERENCIAL', $_POST['TRI_ATENDIMENTOPREFERENCIAL']);
                $triagempresencial->__set('TRI_TEMPERATURA', $_POST['TRI_TEMPERATURA']);
                $triagempresencial->__set('TRI_PRESSAODIASTOLICA', $_POST['TRI_PRESSAODIASTOLICA']);
                $triagempresencial->__set('TRI_PRESSAOSISTOLICA', $_POST['TRI_PRESSAOSISTOLICA']);
                $triagempresencial->__set('TRI_ALERGIAS', $_POST['TRI_ALERGIAS']);
                $triagempresencial->__set('TRI_INFORMACOESADICIONAIS', $_POST['TRI_INFORMACOESADICIONAIS']);

                //print_r($triagempresencial);
                //exit(0);
            
                $TriagemPresencialDAO->inserir($triagempresencial); 

                header('Location: /consultas_listar'); 
            }
        }

        public function editar(){      
            $title = "Editar Triagem";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;
                 
            $this->render('editarTriagemPresencial/index', 'dashboard');
        }

        public function alterar(){
            
        }
    }

?>
