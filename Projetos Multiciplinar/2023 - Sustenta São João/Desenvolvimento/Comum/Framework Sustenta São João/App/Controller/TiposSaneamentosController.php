<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\TiposSaneamentosModel;
    use App\DAO\TiposSaneamentosDAO;

    class TiposSaneamentosController extends Action{

        public function formCadastroTiposSaneamentos(){   
            $title = "Sustenta São João";
            $texto = "Cadastro de Tipos de Saneamentos";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('index', 'dashboard');
        }

        public function inserirTiposSaneamentos(){

            $tiposSaneamentos = new TiposSaneamentosModel();
            $tiposSaneamentos->__set("TSS_NOME",$_POST['TSS_NOME']);       
            
            
            $tiposSaneamentosdao = new TiposSaneamentosDAO();
            $tiposSaneamentosdao->inserir($tiposSaneamentos);
            header('Location: /dashboard/listarTiposSaneamentos');       
            //Mudar para header('Location: /dashboard/LISTAR');       
        }

            
        public function formEditarTiposSaneamentos(){   
            $title = "Sustenta São João";
            $texto = "Editar Tipos Saneamentos";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $tiposSaneamentos = new TiposSaneamentosModel();
            $tiposSaneamentosDAO = new TiposSaneamentosDAO();

            if (isset($_GET['id'])) {
                $tiposSaneamentos = $tiposSaneamentosDAO->buscarPorID($_GET['id']);
                $this->getView()->tiposSaneamentos = $tiposSaneamentos;
            } else {
                $this->getView()->tiposSaneamentos = '';
            }
                  
            $this->render('editarTiposSaneamentos', 'dashboard');
        }                         

        public function alterarTiposSaneamentos(){
            $tiposSaneamentos = new TiposSaneamentosModel();
            $tiposSaneamentosDAO = new TiposSaneamentosDAO();

            $tiposSaneamentos->__set('TSS_ID', $_POST['TSS_ID']);
            $tiposSaneamentos->__set('TSS_NOME', $_POST['TSS_NOME']);

            $tiposSaneamentosDAO->alterar($tiposSaneamentos);

            header('Location: /dashboard/listarTiposSaneamentos');
            
        }

        public function excluirTiposSaneamentos(){
            $tiposSaneamentos = new TiposSaneamentosModel();
            $tiposSaneamentosDAO = new TiposSaneamentosDAO();

            if(isset($_GET['id'])){
                $tiposSaneamentosDAO->excluir($_GET['id']);
                    header('Location: /dashboard/listarTiposSaneamentos');       
                }                                        
        }
              
        public function listarTiposSaneamentos(){   
            $title = "Saneamentos";
            $texto = "Administrativo";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $tiposSaneamentos;
            $tiposSaneamentosDAO = new TiposSaneamentosDAO();
            $tiposSaneamentos = $tiposSaneamentosDAO ->listar();
            $this->getView()->tipoSaneamento = $tiposSaneamentos;
            $this->render('listarTiposSaneamentos','dashboard');

        }

        // public function listarModelo(){   
        //     $title = "Sustenta São João";
        //     $texto = "Listar - Modelo";

        //     //para passar valores para a VIEW
        //     $this->getView()->texto = $texto;
        //     $this->getView()->title = $title;
        //     $tiposSaneamentos;
        //     $tiposSaneamentosDAO = new TiposSaneamentosDAO();
        //     $tiposSaneamentos = $tiposSaneamentosDAO ->listar();
        //     $this->getView()->tipoSaneamento = $tiposSaneamentos;
        //     $this->render('listarTiposSaneamentos','dashboard');

        // }
                
        public function validaAutenticacao() {
           
        }        
    }
    
//2 ?>