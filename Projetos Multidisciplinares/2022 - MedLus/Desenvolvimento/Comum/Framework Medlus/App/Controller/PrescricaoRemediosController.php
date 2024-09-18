<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\PrescricaoRemediosModel;
    use App\DAO\PrescricaoRemediosDAO;


    class PrescricaoRemediosController extends Action {
        public function listarPrescricaoRemedios(){
            $title = "Prescricão de Remédios";
            $this->getView()->title = $title;
            $this->render('index', 'dashboard', "");
        }

        public function listar(){
            $title = "Cadastro de Prescrições de Remédios";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            $remediosListagem;
            $PrescricaoRemediosDAO = new PrescricaoRemediosDAO();            
            $remediosListagem = $PrescricaoRemediosDAO->listar(); 
            $this->getView()->remediosListagem = $remediosListagem;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }

        public function inserir(){
            
        }

        public function editar(){
            
        }

        public function atualizar(){
            
        }

        public function excluir(){
            
        }

        public function msgs(){     
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro do usuário realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Usuário atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Usuário excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $this->render('msgs', 'usuario', '');
        }

        public function validaAutenticacao(){

        }
    }

?>