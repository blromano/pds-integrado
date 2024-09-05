<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\ReclamacoesModel;
use App\DAO\ReclamacoesDAO;

class ReclamacoesController extends Action
{

    public function formCadastroReclamacao()
    {
        $title = "Sustenta São João";
        $texto = "Fazer uma reclamação";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('reclamacao', 'dashboard');
    }

    public function inserirReclamacao()
    {
        $dir = "resources/uploaded_files";
        $file = $_FILES["REC_ANEXO"];
        $nome_arquivo = rand() . "_" . $file["name"];
        move_uploaded_file($file["tmp_name"], "$dir/" . $nome_arquivo);

        $reclamacao = new ReclamacoesModel();

        $reclamacao->__set("REC_TITULO_RECLAMACAO", $_POST['REC_TITULO_RECLAMACAO']);
        $reclamacao->__set("REC_DESCRICAO", $_POST['REC_DESCRICAO']);
        $reclamacao->__set("REC_ANEXO", $nome_arquivo);
        $reclamacao->__set("FK_SETORES_SET_ID", $_POST['FK_SETORES_SET_ID']);
        $reclamacao->__set("FK_CIDADAOS_USU_ID", $_POST['FK_CIDADAOS_USU_ID']);

        $reclamacaodao = new ReclamacoesDAO();
        $reclamacaodao->inserir($reclamacao);
        header('location: /dashboard/listagemRecEnviadas');
    }

    public function inserirResposta()
    {
        $reclamacao = new ReclamacoesModel();

        $reclamacao->__set("REC_RESPOSTA_RECLAMACAO", $_POST['REC_RESPOSTA_RECLAMACAO']);
        $reclamacao->__set("REC_ID", $_POST['id']);

        $reclamacaodao = new ReclamacoesDAO();
        $reclamacaodao->inserirResposta($reclamacao);
        header('location: /dashboard/previaReclamacao');
    }

    //

    public function editarReclamacao()
    {
        $title = "Sustenta São João";
        $texto = "Editar Reclamação";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $reclamacoesDAO = new ReclamacoesDAO();
        $reclamacao = new ReclamacoesModel();

        if (isset($_GET['id'])) {
            $reclamacoes = $reclamacoesDAO->buscarPorId($_GET['id']);
            $this->getView()->reclamacoes = $reclamacoes;

        } else {
            $this->getView()->reclamacoes = '';
        }

        $this->render('editarReclamacao', 'dashboard');
    }
    public function alterarReclamacao()
    {
        $dir = "resources/uploaded_files";
        $file = $_FILES["REC_ANEXO"];
        $nome_arquivo = rand() . "_" . $file["name"];
        move_uploaded_file($file["tmp_name"], "$dir/" . $nome_arquivo);

        $reclamacao = new ReclamacoesModel();
        $reclamacaodao = new ReclamacoesDAO();

        $reclamacao->__set('REC_ID', $_POST['REC_ID']);
        $reclamacao->__set('REC_TITULO_RECLAMACAO', $_POST['REC_TITULO_RECLAMACAO']);
        $reclamacao->__set('REC_DESCRICAO', $_POST['REC_DESCRICAO']);
        $reclamacao->__set('REC_ANEXO', $nome_arquivo);
        $reclamacao->__set('FK_SETORES_SET_ID', $_POST['FK_SETORES_SET_ID']);

        $reclamacaodao->alterar($reclamacao);

        header('Location: /dashboard/listagemRecEnviadas');

    }
    //

    public function adminReclamacao()
    {
        $title = "Sustenta São João";
        $texto = "Visualizar Reclamaçãos";

        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $reclamacoesDAO = new ReclamacoesDAO;

        if (isset($_GET['id'])) {
            $reclamacoes = $reclamacoesDAO->buscarPorId($_GET['id']);
            $this->getView()->reclamacoes = $reclamacoes;

        } else {
            $this->getView()->reclamacoes = '';
        }

        $reclamacao = new ReclamacoesModel();
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->buscarPorId($_GET['id']);
        $this->getView()->reclamacao = $reclamacao;
        $this->render('adminReclamacao', 'dashboard');
    }
    public function listarGraficoBarras()
    {

        $title = "Sustenta São João";
        $texto = "Grafico de Barras";
        $pagina = "grafico";
        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;
        $this->getView()->pagina = $pagina;

        // $reclamacao;
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->listar();
        $this->getView()->reclamacao = $reclamacao;
        $this->render('graficoBarras', 'dashboard');
    }
    public function listarGraficoPizza()
    {

        $title = "Sustenta São João";
        $texto = "Grafico de Pizza";
        $pagina = "grafico";
        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;
        $this->getView()->pagina = $pagina;

        // $reclamacao;
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->listar();
        $this->getView()->reclamacao = $reclamacao;
        $this->render('graficoPizza', 'dashboard');
    }

    public function excluirReclamacao()
    {
        $reclamacaodao = new ReclamacoesDAO();

        if (isset($_GET['id'])) {
            $reclamacaodao->excluir($_GET['id']);
            header('Location: /dashboard/listagemRecEnviadas');
        }

    }
    /*public function Avaliar()
    {
        $reclamacao = new ReclamacoesModel();
        $reclamacao->__set('REC_ID', $_POST['REC_ID']);
        $reclamacao->__set('REC_NOTA_AVALIACAO', $_POST['REC_NOTA_AVALIACAO']);

        $reclamacaodao = new ReclamacoesDAO();
        $reclamacaodao->Avaliar($reclamacao);

        header('Location:/dashboard/avaliarReclamacao');
    }
    */

    public function listarReclamacao()
    {

        $title = "Reclamações do Meu Setor";
        $texto = "Reclamações";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        // $reclamacao;
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->listar();
        $this->getView()->reclamacao = $reclamacao;
        $this->render('previaReclamacao', 'dashboard');
    }

    public function listarUsuReclamacao()
    {

        $title = "Minhas Reclamações";
        $texto = "Reclamações";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        // $reclamacao;
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->listar();
        $this->getView()->reclamacao = $reclamacao;
        $this->render('listagemRecEnviadas', 'dashboard');
    }

    public function listarParaRelatorio()
    {
        $title = "Gerar Relatórios";
        $texto = "Reclamações";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        // $reclamacao;
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->listar();
        $this->getView()->reclamacao = $reclamacao;
        $this->render('gerarRelatorios', 'dashboard');
    }
    public function listarGerarPDF()
    {
        $title = "Sustenta São João";
        $texto = "Gerar Relatórios em PDF";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        // $reclamacao;
        $reclamacaodao = new ReclamacoesDAO();
        $reclamacao = $reclamacaodao->listar();
        $this->getView()->reclamacao = $reclamacao;
        $this->render('gerarPDF', 'dashboard');
    }

    public function reclamacao(){   
        $title = "Nova Reclamação";
        $texto = "Reclamações";
        //$id = "1";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;
        //$this->getView()->id = $id;
        
        $this->render('reclamacao', 'dashboard');  //Carrega o arquivo reclamacao que esta dentro da pasta dashboard
    }

    public function validaAutenticacao()
    {
        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }

}
?>