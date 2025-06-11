<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\Alunos_Inscritos_ModalidadesModel;
use App\DAO\Alunos_Inscritos_ModalidadesDAO;
use App\DAO\Alunos_Inscritos_EventosDAO;
use App\DAO\ModalidadesDAO;
use App\DAO\EventosDAO;
use App\DAO\AlunosDAO;

class Alunos_Inscritos_ModalidadesController extends Action {

    public function inscricaoModalidades() {   
        $title = "Inscrição em modalidade";
        $texto = "Insira os dados";

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;        
        $EVO_ID = $_POST['EVO_ID'];
        $modalidadeDAO = new ModalidadesDAO();
        $modalidades = $modalidadeDAO->listar_modalidades_evento($EVO_ID);
    
        $this->getView()->modalidades = $modalidades;
        $eventosDAO = new EventosDAO();
        $nomeEvento = $eventosDAO->buscarPorId($EVO_ID);
        $this->getView()->nomeEvento = $nomeEvento->__get('EVO_NOME');
          
        $this->render('inscricaoModalidades', 'dashboard');
    }
    
    public function inserir() {
        // Obtém as modalidades selecionadas a partir do formulário
        $modalidadesSelecionadas = isset($_POST['modalidadeID']) ? $_POST['modalidadeID'] : [];
    
        // Verifica se alguma modalidade foi selecionada
        if (empty($modalidadesSelecionadas)) {
            header('Location: /inscricaoModalidades_mod02?error=modalidade'); // Redireciona com erro
            exit;
        }
    
        $Alunos_Inscritos_ModalidadesDAO = new Alunos_Inscritos_ModalidadesDAO();
    
        foreach ($modalidadesSelecionadas as $modalidadeId) {
            $Alunos_Inscritos_ModalidadesModel = new Alunos_Inscritos_ModalidadesModel();
    
            // Definições iniciais
            $alunosDAO = new AlunosDAO();
            $alunoModel = $alunosDAO->BuscarAlunoLogado($_SESSION['ID']);

            $Alunos_Inscritos_ModalidadesModel->__set("AIM_DEFERIDO", null);
            $Alunos_Inscritos_ModalidadesModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $modalidadeId);
            $Alunos_Inscritos_ModalidadesModel->__set("FK_ALUNOS_ALU_ID", $alunoModel->__get('ALU_ID'));
            $Alunos_Inscritos_ModalidadesModel->__set("AIM_JUSTIFICATIVA", '');
    
            // Verifica se o comprovante de faixa é necessário para Judô
            if ($this->isJudoModalidade($modalidadeId)) { // Verifica se é a modalidade de Judô
                if (isset($_FILES['AIM_COMPROVANTE_FAIXA']) && $_FILES['AIM_COMPROVANTE_FAIXA']['error'] == 0) {
                    $nomeArquivo = $_FILES['AIM_COMPROVANTE_FAIXA']['name'];
                    $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
                    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'pdf'];
    
                    if (in_array($extensao, $extensoesPermitidas)) {
                        $diretorio = 'uploads/comprovantes/';
                        move_uploaded_file($_FILES['AIM_COMPROVANTE_FAIXA']['tmp_name'], $diretorio . $nomeArquivo);
                        $Alunos_Inscritos_ModalidadesModel->__set("AIM_COMPROVANTE_FAIXA", $nomeArquivo);
                    } else {
                        header('Location: /inscricaoModalidades_mod02?error=extensao');
                        exit;
                    }
                } else {
                    header('Location: /inscricaoModalidades_mod02?error=comprovante');
                    exit;
                }
            }
    
            $Alunos_Inscritos_ModalidadesDAO->inserir($Alunos_Inscritos_ModalidadesModel);
        }
    
        header('Location: /dashboard/listarmeuseventos');
    }



    private function isJudoModalidade($modalidadeId) {
        // Substitua com a lógica correta para determinar se a modalidade é Judô.
        $modalidadeDAO = new ModalidadesDAO();
        $modalidade = $modalidadeDAO->buscarPorId($modalidadeId);
        return $modalidade && $modalidade->__get('MDE_NOME') === 'Judô';
    }
        


    public function verificarInscricaoModalidade(){
        $title = "Verificar Inscrição de Aluno";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
        $this->getView()->icone_editar = $icone_editar;
        
        $aluno_inscrito_modalidade = new alunos_inscritos_modalidadesDAO();
        $aluno_inscrito_modalidades = $aluno_inscrito_modalidade->buscarPorId($_POST['AIM_ID']);
        $AIE_ID = $aluno_inscrito_modalidade->buscarAIEPorAIMID($aluno_inscrito_modalidades->__get('AIM_ID'));

        $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
        $documentos = $aluno_inscrito_eventoDAO->listarDocumentosPorAIE_ID($AIE_ID);
        $this->getView()->documentos = $documentos;

        $nomeModalidade = $aluno_inscrito_modalidade->buscarNomeModalidadePorEVMID($aluno_inscrito_modalidades->__get('FK_EVENTOS_MODALIDADES_EVM_ID'));
        $nomeEvento = $aluno_inscrito_modalidade->buscarNomeEventoPorEVMID($aluno_inscrito_modalidades->__get('FK_EVENTOS_MODALIDADES_EVM_ID'));
        
        $this->getView()->nomeModalidade = $nomeModalidade;
        $this->getView()->nomeEvento = $nomeEvento;
        $this->getView()->aluno_inscrito_modalidades = $aluno_inscrito_modalidades;
        $this->render('verificarInscricaoModalidade', 'dashboard');
    }
  
    public function listarInscricaoAlunoModalidades() {
        
       
        $title = "Listagem de Alunos Inscritos em Modalidades - Dashboard";
        $texto = "";
        $icone_editar = '<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
        $this->getView()->icone_editar = $icone_editar;

        $aluno_inscrito_modalidadeDAO = new Alunos_Inscritos_ModalidadesDAO();

        $alunos_inscritos_modalidades = $aluno_inscrito_modalidadeDAO->listarAlunosInscritosModalidades($_GET['EVM_ID']);

        $this->getView()->alunos_inscritos_modalidades = $alunos_inscritos_modalidades;
        $this->render('listar', 'dashboard');
    }

// ===================================================================================================================================================
// ===================================================================================================================================================

    public function listarAlunosInscritosModalidades() {
        
       
        $title = "Alunos Inscritos em Modalidades - Dashboard";
        $texto = "";
        $icone_editar = '<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
        $this->getView()->icone_editar = $icone_editar;


        $aluno_inscrito_modalidadeDAO = new Alunos_Inscritos_ModalidadesDAO();
        $nomeEvento = $aluno_inscrito_modalidadeDAO->buscarNomeEventoPorEVMID($_POST['EVM_ID']);
        $nomeModalidade = $aluno_inscrito_modalidadeDAO->buscarNomeModalidadePorEVMID($_POST['EVM_ID']);
        $alunos_inscritos_modalidades = $aluno_inscrito_modalidadeDAO->listarAlunosInscritosModalidades_mod02($_POST['EVM_ID']);

        $this->getView()->nomeEvento = $nomeEvento;
        $this->getView()->nomeModalidade = $nomeModalidade;
        $this->getView()->alunos_inscritos_modalidades = $alunos_inscritos_modalidades;
        $this->render('listarAlunosInscritosModalidades', 'dashboard');
    }
// ===================================================================================================================================================
// ===================================================================================================================================================


public function mostrarCancelamento() {
    // Suponha que o ID da modalidade é obtido via GET ou outra fonte
    $FK_EVENTOS_MODALIDADES_EVM_ID = $_GET['EVM_ID']; // Exemplo de como você poderia pegar o ID

    // Chama o método DAO para buscar o nome da modalidade
    $Alunos_Inscritos_ModalidadesDAO = new Alunos_Inscritos_ModalidadesDAO();
    $modalidadeNome = $Alunos_Inscritos_ModalidadesDAO->buscarNomeModalidadePorEVMID($FK_EVENTOS_MODALIDADES_EVM_ID);

    // Passando o nome da modalidade para a view
    $this->view('cancelarinscricao', ['modalidade' => $modalidadeNome, 'EVM_ID' => $FK_EVENTOS_MODALIDADES_EVM_ID]);
}

    public function excluir() {             
        $Alunos_Inscritos_ModalidadesDAO = new Alunos_Inscritos_ModalidadesDAO();
        
        // Recebendo o AIM_ID da URL ou formulário (dependendo de como você passar)
        if (isset($_POST['AIE_JUSTIFICATIVA']) && isset($_POST['AIE_ID'])) {
            $AIE_JUSTIFICATIVA = $_POST['AIE_JUSTIFICATIVA'];
            $AIE_ID = $_POST['AIE_ID'];  // O ID do registro que você deseja atualizar
    
            // Aqui, o DAO vai atualizar o campo AIM_DEFERIDO para 2 e também salvar a justificativa
            $Alunos_Inscritos_ModalidadesDAO->atualizarJustificativa($AIE_ID, $AIE_JUSTIFICATIVA);
            
            // Após atualizar, redireciona
            header('Location: /listarmeuseventos/meuseventos');
        } else {
            // Caso não encontre o ID ou justificativa
            header('Location: /error');
        }
    }

    public function verificarJustificativa() {
        // Obtém o AIE_ID da requisição
        $AIE_ID = $_POST['AIE_ID'];
        $this->getView()->AIE_ID = $AIE_ID;
        $title = "Verificar Justificativa";
        $texto = "";
    
        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
        $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();

        $documentos = $aluno_inscrito_eventoDAO->listarDocumentosPorAIE_ID($AIE_ID);
        $this->getView()->documentos = $documentos;

        // Instancia o DAO e busca os dados
        $alunosInscritosModalidadesDAO = new Alunos_Inscritos_ModalidadesDAO();
        $inscricoes = $alunosInscritosModalidadesDAO->buscarInscricoesPorAlunoEEvento($AIE_ID);
    
        // Verifica se foi encontrado algum resultado
            // Atribui todas as informações recebidas pela DAO à view
            $this->getView()->inscricoes = $inscricoes;
    
        // Renderiza a view
        $this->render('verificarJustificativa', 'dashboard');
    }

    public function homologarInscricaoModalidade() {
        // Verifica se os parâmetros necessários estão presentes na requisição
        if (isset($_POST['AIM_ID']) && isset($_POST['deferido'])) {
            $AIM_ID = $_POST['AIM_ID'];  // ID da inscrição da modalidade
            $deferido = $_POST['deferido'];  // 1 = deferido, 0 = indeferido
            
            // Inicializa a variável de justificativa
            $justificativa = null;
            
            // Se for indeferido, verifica se a justificativa foi fornecida
            if ($deferido == 0) {
                // Se a justificativa não foi fornecida ou está vazia, mostra erro
                if (empty($_POST['justificativa'])) {
                    header('Location: /error?msg=Justificativa obrigatória para indeferimento');
                    exit;
                }
                // Caso contrário, atribui a justificativa fornecida
                $justificativa = $_POST['justificativa'];  
            } else {
                // Caso a inscrição seja deferida, a justificativa é null
                $justificativa = null;
            }
    
            // Criação da instância do DAO
            $Alunos_Inscritos_ModalidadesDAO = new Alunos_Inscritos_ModalidadesDAO();
    
            // Chama o método do DAO para atualizar o status da inscrição, passando a justificativa
            $Alunos_Inscritos_ModalidadesDAO->atualizarDeferidoComJustificativa($AIM_ID, $deferido, $justificativa);
    
            // Redireciona para a listagem de eventos ou algum outro fluxo desejado
            header('Location: /dashboard/eventos/listar');
            exit;
    
        } else {
            // Caso não tenha o AIM_ID ou o deferido na requisição
            header('Location: /error?msg=Parâmetros inválidos');
            exit;
        }
    }
    
            
            

    public function validaAutenticacao() {}
}

?>
