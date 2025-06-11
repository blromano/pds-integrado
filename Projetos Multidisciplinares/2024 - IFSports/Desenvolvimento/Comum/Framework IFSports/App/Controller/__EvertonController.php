<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\EvertonModel;
    use App\DAO\EvertonDAO;

    class EvertonController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function listar(){ 
            $title = "Listagem - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $everton = new EvertonDAO();
            $evertons = $everton->listar();

            $this->getView()->evertons = $evertons;
            $this->render('listar','dashboard');
        }

        public function cadastrar(){   
            $title = "Cadastro - Dashboard";
            $texto = "";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;          
            $this->render('cadastrar','dashboard');
        }

        public function inserir(){             
            
            $everton = new EvertonModel();

            $everton->__set("nome", $_POST['nome']);
            $everton->__set("cpf", $_POST['cpf']);
            $everton->__set("email", $_POST['email']);

            $evertondao = new EvertonDAO();
            $evertondao->inserir($everton);

            header('Location: /everton/listar');


        }

        public function editar(){   
            $title = "Editar - Dashboard";
            $texto = "form de edição do cadastro";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto; 
            
            $everton = new EvertonModel();
            $evertondao = new EvertonDAO();

            if(isset($_GET['id'])){
                $everton = $evertondao->buscarPorId($_GET['id']);
                $this->getView()->everton = $everton;
            }else{
                $this->getView()->everton = '';
            }


            $this->render('editar','dashboard');
        }

        public function alterar(){
            $everton = new EvertonModel();
            $evertondao = new EvertonDAO();

            $everton->__set('id',$_POST['id']);
            $everton->__set('nome',$_POST['nome']);
            $everton->__set('cpf',$_POST['cpf']);
            $everton->__set('email',$_POST['email']);

            $evertondao->alterar($everton);

            header('Location: /everton/listar');
            
            
        }

        public function excluir(){             
            $this->render('excluir','dashboard');
        }
        
        public function validaAutenticacao() {}
    }

?>
