<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\DenunciasModel;
    use App\DAO\DenunciasDAO;

    class DenunciasController extends Action{


        public function editarDenuncia() {
        $title = "Editar Denúncias";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto; 

            if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['descricao'])) {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $descricao = $_POST['descricao'];
        
                $denunciaDAO = new DenunciasDAO();
                $denunciaDAO->atualizarTituloDescricao($id, $titulo, $descricao);
        
                header('location: /dashboard/denuncias/listar_SE');
            }
        }
        
        
            // SECRETÁRIO DE EVENTOS            
            public function editar() {
            
                $title = "Editar Denúncias";
                $texto = "";
                $icone_editar='<i class="ti-file btn-icon-append"></i>';
        
                $this->getView()->title = $title;
                $this->getView()->texto = $texto; 

                $data = json_decode(file_get_contents("php://input"), true);
                if (isset($data['DNC_ID'], $data['DNC_TITULO'], $data['DNC_DESCRICAO'])) {
                    $denuncia = new DenunciasModel();
                    $denuncia->__set('DNC_ID', $data['DNC_ID']);
                    $denuncia->__set('DNC_TITULO', $data['DNC_TITULO']);
                    $denuncia->__set('DNC_DESCRICAO', $data['DNC_DESCRICAO']);
            
                    $denunciaDAO = new DenunciasDAO();
                    $success = $denunciaDAO->alterar($denuncia);
            
                    echo json_encode(['success' => $success]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
                }
            }
            


            public function criardenuncia(){   
                          
                $this->render('criardenuncia','dashboard');
            }
            //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        
            public function inserir() {
            $title = "Listar Denúncias";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
                
            $denuncia = new DenunciasModel();
            $denuncia->__set('DNC_TITULO', $_POST['DNC_TITULO']);
            $denuncia->__set('DNC_DESCRICAO', $_POST['DNC_DESCRICAO']);
            $denuncia->__set('DNC_DATA', '2024-10-23 19:23:48.000000'); // Definindo a data atual
            $denuncia->__set('DNC_STATUS', 'PENDENTE'); // Status inicial como "Pendente"
            $denuncia->__set('FK_EVENTOS_EVO_ID', $_POST['FK_EVENTOS_EVO_ID']);
            $denuncia->__set('FK_RESPONSAVEIS_EQUIPE_RES_ID', $_POST['FK_RESPONSAVEIS_EQUIPE_RES_ID']);

            // Inserindo a denúncia no banco de dados
            $denunciaDAO = new DenunciasDAO();
            $denunciaDAO->inserir($denuncia);
        
            // Redirecionando ou exibindo mensagem de sucesso
            header('location: /dashboard/denuncias/cadastrar');
        }


        public function listardenuncia_SE() {
        $title = "Listar Denúncias";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto; 

            $dao = new DenunciasDAO();
            $denuncias = $dao->listar();
            $this->getView()->denuncias = $denuncias;
            $this->render('listardenuncia_SE', 'dashboard');
        }
        




// _____________________________________________________________________________________________________________________________________________




            // ORGANIZADOR DE EVENTOS

        public function atualizar() {
            if (isset($_POST['id']) && isset($_POST['status'])) {
                $denuncia = new DenunciasModel();
                $denuncia->__set('DNC_ID', $_POST['id']);
                $denuncia->__set('DNC_STATUS', $_POST['status']);
        
                $denunciaDAO = new DenunciasDAO();
                $denunciaDAO->alterarStatus($denuncia);
        
                header('location: /dashboard/denuncias/listar');
            }
        }

        public function listardenuncia_OE() {
        $title = "Listar Denúncias";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
            $dao = new DenunciasDAO();
            $denuncias = $dao->listar();
            $this->getView()->denuncias = $denuncias;
            $this->render('listardenuncia_OE', 'dashboard');
        }
        
   
        public function listar(){   
        $title = "Listar Denúncias";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;          
            $dao = new DenunciasDAO();
            $denuncias = $dao->listar();    
            $this->getView()->denuncias = $denuncias;
            $this->render('listardenuncia_OE', 'dashboard');
        }

        public function excluir(){
            $DenunciasDAO = new DenunciasDAO();
            if(isset($_GET['id'])){
                $DenunciasDAO->excluir($_GET['id']);
                header('location: /dashboard/denuncias/listar');
            }

        }

        public function filtrar() {
            $dataEnvio = isset($_GET['data_envio']) ? $_GET['data_envio'] : null;
            $status = isset($_GET['status']) ? $_GET['status'] : null;
        
            $dao = new DenunciasDAO();
            $denuncias = $dao->filtrarDenuncias($dataEnvio, $status);
        
            $this->getView()->denuncias = $denuncias;
            $this->render('listardenuncia_OE', 'dashboard');
        }


        public function validaAutenticacao() {}
    }

?>
 