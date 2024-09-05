<?php

namespace App\Controller;

use FW\Controller\Action;
use App\DAO\ReclamacoesDAO;

class DashboardMod02Controller extends Action
{

    public function gerarParaRelatorio()
    {
        $title = "Gerar para relatórios";
        $texto = "Reclamações";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $ReclamacoesDAO = new ReclamacoesDAO();
        $reclamacoes = $ReclamacoesDAO->listar();
        
        // $SituacaoDAO = new PontoColetaDAO();
        // $pontoColetas = $PontoColetaDAO->listar();

        $this->getView()->reclamacoes = $reclamacoes;
        // $this->getView()->pontoColeta = $pontoColetas;


        $this->render('gerarRelatorios', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function obterDados2()
    {
        $title = "Gráficos";
        $texto = "Reclamações";
        $pagina = "grafico";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;
        $this->getView()->pagina = $pagina;

        $ObterDados = new Descarte_ResiduoDAO();
        if(isset($_POST['pontoEscolhido'])){
            $dadosEstatisticos = $ObterDados->obterDados($_POST['pontoEscolhido']);
        }else{
            $dadosEstatisticos = $ObterDados->obterDados(NULL);
        }
        $this->getView()->dadosEstatistico = $dadosEstatisticos;
        foreach ($this->getView()->dadosEstatistico as $dado) {
            $data[] = [$dado->__get('DDE_RESIDUO'), (int) $dado->__get('DDE_QUANTIDADE')];
        }
        // Converte os dados em JSON.
        $data_json = json_encode($data);

        $this->getView()->data_json = $data_json;

        $this->render('graficoPizza', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard

        
        
    }

    public function index()
    {
        $title = "Login de Usuários - Dashboard";
        $texto = "Login de Usuários";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('login', 'welcome'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }


    public function reclamacao()
    {
        $title = "Enviar Reclamações - Dashboard";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('reclamacao', 'dashboard'); //Carrega o arquivo reclamacao que esta dentro da pasta dashboard
    }


    public function editarReclamacao()
    {
        $title = "Editar Minhas Reclamações - Dashboard";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $reclamacoesDAO = new ReclamacoesDAO();

        if (isset($_GET['id'])) {
            $reclamacoes = $reclamacoesDAO->buscarPorId($_GET['id']);
            $this->getView()->reclamacoes = $reclamacoes;

        } else {
            $this->getView()->reclamacoes = '';
        }


        $this->render('editarReclamacao', 'dashboard');
    }


    public function adminReclamacao()
    {
        $title = "Visualizar reclamação do meu setor";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        if (isset($_GET['id'])) {
            $reclamacoesDAO = new ReclamacoesDAO();
            $reclamacoes = $reclamacoesDAO->buscarPorId($_GET['id']);
            $this->getView()->reclamacoes = $reclamacoes;

        } else {
            $this->getView()->reclamacoes = '';
        }

        $this->render('adminReclamacao', 'dashboard');
    }
    // public function graficoBarras()
    // {
    //     $title = "Grafico de Barras";
    //     $texto = "";

    //     //para passar valores para a VIEW
    //     $this->getView()->texto = $texto;
    //     $this->getView()->title = $title;

    //     $this->render('graficoBarras', 'dashboard');
    // }

    public function graficoPizza()
    {
        $title = "Grafico de Pizza";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('graficoPizza', 'dashboard');
    }
    public function previaReclamacao()
    {
        $title = "Reclamações do meu setor";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('previaReclamacao', 'dashboard');
    }
    public function listagemRecEnviadas()
    {
        $title = "Listagem das Minhas Reclamações Enviadas - Dashboard";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('listagemRecEnviadas', 'dashboard');
    }
    // public function gerarRelatorios()
    // {
    //     $title = "Gerar Relatórios";
    //     $texto = "";

    //     //para passar valores para a VIEW
    //     $this->getView()->texto = $texto;
    //     $this->getView()->title = $title;

    //     $this->render('gerarRelatorios', 'dashboard');
    // }
    public function gerarPDF()
    {
        $title = "Gerar PDF";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('gerarPDF', 'dashboard');
    }

    public function respReclamacao()
    {
        $title = "Responder Reclamação";
        $texto = "";

        if (isset($_GET['id'])) {
            $reclamacoesDAO = new ReclamacoesDAO();
            $reclamacoes = $reclamacoesDAO->buscarPorId($_GET['id']);
            $this->getView()->reclamacoes = $reclamacoes;

        } else {
            $this->getView()->reclamacoes = '';
        }
        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('respReclamacao', 'dashboard');
    }
    public function inserirResposta()
    {
        $title = "Responder Reclamação";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('inserirResposta', 'dashboard');
    }

    public function validaAutenticacao()
    {
        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }

    public function avaliarReclamacao()
    {
        $title = "Avaliar Reclamações - Dashboard";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('avaliarReclamacao', 'dashboard');
    }
    /*public function excluirReclamacao(){   
        $title = "Excluir Reclamações - Dashboard";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;
        
        // $reclamacaodao->excluir($_GET['id']);

        $this->render('excluirReclamacao', 'dashboard'); 
    }*/

    public function mediaAvaliacao()
    {
        $title = "Média das Avaliações da Reclamações - Dashboard";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('mediaAvaliacao', 'dashboard');
    }
}

?>