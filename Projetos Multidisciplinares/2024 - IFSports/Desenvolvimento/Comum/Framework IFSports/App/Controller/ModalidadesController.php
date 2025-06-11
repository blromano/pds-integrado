<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\ModalidadesModel;
    use App\Model\Eventos_ModalidadesModel;
    use App\DAO\ModalidadesDAO;
    use App\Model\EventosModel;
    use App\DAO\EventosDAO;
    use App\Model\Organizadores_EventosModel;
    use App\DAO\Organizadores_EventosDAO;

    class ModalidadesController extends Action
    {

        public function listar() {
            $title = "Modalidades - Dashboard";
            $texto = "Modalidades do  ";
            $icone_editar = '<i class="mdi mdi-pencil"></i>';
            $icone_excluir = '<i class="mdi mdi-delete-forever"></i>';
            $icone_resultado = '<i class="mdi mdi-trophy-variant-outline"></i>';
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $this->getView()->icone_excluir = $icone_excluir;
            $this->getView()->icone_resultado = $icone_resultado;
        
            $modalidadeDAO = new ModalidadesDAO();
            $modalidades = $modalidadeDAO->listar_modalidades_evento($_GET["EVO_ID"]);
        

            $eventosDAO = new EventosDAO();
            $evento = $eventosDAO->buscarPorId($_GET["EVO_ID"]);
        
            if ($evento) {
                $this->getView()->nome_evento = $evento->__get('EVO_NOME'); 
            } else {
                $this->getView()->nome_evento = 'Evento não encontrado';
            }
        
            $this->getView()->modalidades = $modalidades;
            $this->render('listar', 'dashboard');
        }


        public function adicionar()
        {
            $title = "Adicionar Modalidade - Dashboard";
            $texto = "Adicionar Nova Modalidade";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;         

            $modalidade = new ModalidadesDAO();
            $modalidades = $modalidade->listar();

            $this->getView()->modalidades = $modalidades;
            
            $this->render('adicionar','dashboard');
        }

        public function inserir() {
            $modalidade = new ModalidadesModel();
            

            $modalidade->__set("EVM_QUANTIDADE_MINIMA_JOGADORES", $_POST['EVM_QUANTIDADE_MINIMA_JOGADORES']);
            $modalidade->__set("EVM_QUANTIDADE_MAXIMA_JOGADORES", $_POST['EVM_QUANTIDADE_MAXIMA_JOGADORES']);
            $modalidade->__set('FK_EVENTOS_EVO_ID', $_POST['FK_EVENTOS_EVO_ID']);
            $modalidade->__set('FK_MODALIDADES_MDE_ID', $_POST['modalidades']);
        
            $modalidadedao = new ModalidadesDAO();
            $modalidadedao->inserir($modalidade);
            
            header('Location: /dashboard/modalidades/listar?EVO_ID=' . $_POST['FK_EVENTOS_EVO_ID']);
            exit();
        }

        public function excluir() {
            if (isset($_GET['EVM_ID']) && isset($_GET['EVO_ID'])) {
                $evmId = $_GET['EVM_ID'];
                $evoId = $_GET['EVO_ID']; 
        
                $modalidadedao = new ModalidadesDAO();
                $modalidadedao->excluir($evmId);
        

                header("Location: /dashboard/modalidades/listar?EVO_ID=$evoId");
                exit;
            } else {
                die("Erro: ID da modalidade ou ID do evento não fornecido.");
            }
        }




    public function editar() {
        $title = "Editar Modalidade - Dashboard";
        $texto = "Editar Modalidade";
        $this->getView()->title = $title;
        $this->getView()->texto = $texto;

        $modalidadeDAO = new ModalidadesDAO();
        $modalidades = $modalidadeDAO->listar();

        $modalidadeEvento = $modalidadeDAO->listar_modalidades_evento($_GET['EVM_ID']);

        $this->getView()->modalidade = $modalidadeEvento;
        $this->getView()->modalidades = $modalidades;

        $this->render('editar', 'dashboard');
    }

    public function alterar() {

        $modalidade = new Eventos_ModalidadesModel();

            $modalidade->__set('EVM_ID', $_POST['EVM_ID']);
            $modalidade->__set('EVM_QUANTIDADE_MINIMA_JOGADORES', $_POST['EVM_QUANTIDADE_MINIMA_JOGADORES']);
            $modalidade->__set('EVM_QUANTIDADE_MAXIMA_JOGADORES', $_POST['EVM_QUANTIDADE_MAXIMA_JOGADORES']);
            $modalidade->__set('FK_MODALIDADES_MDE_ID', $_POST['FK_MODALIDADES_MDE_ID']);
            $modalidade->__set('FK_EVENTOS_EVO_ID', $_POST['FK_EVENTOS_EVO_ID']);
    
            $modalidadeDAO = new ModalidadesDAO();
            $modalidadeDAO->alterar($modalidade);

            header('Location: /dashboard/modalidades/listar?EVO_ID=' . $_POST['FK_EVENTOS_EVO_ID']);
    }

    public function validaAutenticacao() {}

    
}


?>