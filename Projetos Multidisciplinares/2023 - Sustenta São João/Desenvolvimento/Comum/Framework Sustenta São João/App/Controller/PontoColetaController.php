<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\PontoColetaModel;
use App\DAO\PontoColetaDAO;

class PontoColetaController extends Action{

    public function inserir(){

        $pontoColeta = new PontoColetaModel();
        $pontoColeta->__set("PRO_NOME",$_POST['PRO_NOME']);
        $pontoColeta->__set("PRO_CPF",$_POST['PRO_CPF']);
        $pontoColeta->__set("PRO_RG",$_POST['PRO_RG']);
        $pontoColeta->__set("PRO_RUA",$_POST['PRO_RUA']);
        $pontoColeta->__set("PRO_NUMERO",$_POST['PRO_NUMERO']);
        $pontoColeta->__set("PRO_BAIRRO",$_POST['PRO_BAIRRO']);
        $pontoColeta->__set("PRO_CEP",$_POST['PRO_CEP']);
        $pontoColeta->__set("PRO_LOGRADOURO",$_POST['PRO_LOGRADOURO']);
        $pontoColeta->__set("PRO_TELEFONE",$_POST['PRO_TELEFONE']);
        $pontoColeta->__set("PCO_NOME",$_POST['PCO_NOME']);
        $pontoColeta->__set("PCO_RUA",$_POST['PCO_RUA']);
        $pontoColeta->__set("PCO_NUMERO",$_POST['PCO_NUMERO']);
        $pontoColeta->__set("PCO_BAIRRO",$_POST['PCO_BAIRRO']);
        $pontoColeta->__set("PCO_CEP",$_POST['PCO_CEP']);
        $pontoColeta->__set("PCO_LOGRADOURO",$_POST['PCO_LOGRADOURO']);
        $pontoColeta->__set("PCO_LATITUDE",$_POST['PCO_LATITUDE']);
        $pontoColeta->__set("PCO_LONGITUDE",$_POST['PCO_LONGITUDE']);
        $pontoColeta->__set("PCO_TELEFONE",$_POST['PCO_TELEFONE']);
        $pontoColeta->__set("PCO_CNPJ",$_POST['PCO_CNPJ']);

        $pontoColetadao = new PontoColetaDAO();
        $pontoColetadao->inserir($pontoColeta);
        header('Location: /dashboard/listarPontosDeColetaCadastrados');
    }

    public function validaAutenticacao() {
        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }
    public function excluirPontoColeta()
    {
        $pontoColetadao = new PontoColetaDAO();

        if (isset($_GET['id'])) {
            $pontoColetadao->excluir($_GET['id']);

            header('Location: /dashboard/listarPontosDeColetaCadastrados');
        }
    }

    public function listarPontosDeColetaCadastrados(){

        $title= "Pontos de Coleta";
        $texto = "Sustentabilidade";

        $this->getView()->title=$title;

        $PontoColetaDAO = new PontoColetaDAO();
        $pontoColetas = $PontoColetaDAO->listar();
        
        $this->getView()->texto = $texto;
        $this->getView()->pontoColeta = $pontoColetas;
        
        $this->render('listarPontosDeColetaCadastrados','dashboard');
    }

    public function editarPontoColeta()
    {
        $title = "Editar Ponto de Coleta";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $pontoColeta = new PontoColetaModel();
        $pontoColetadao = new PontoColetaDAO();

        if (isset($_GET['id'])) {
            $pontoColeta = $pontoColetadao->buscarPorID($_GET['id']);
            $this->getView()->pontoColeta = $pontoColeta;
        } else {
            $this->getView()->pontoColeta = '';
        }

        $this->render('editarPontoColeta', 'dashboard');
    }

    public function alterarPontoColeta()
    {
        $pontoColeta = new PontoColetaModel();
        $pontoColetaDAO = new PontoColetaDAO();

        $pontoColeta->__set('PCO_ID', $_POST['PCO_ID']);
        $pontoColeta->__set('PRO_NOME', $_POST['PRO_NOME']);
        $pontoColeta->__set('PRO_CPF', $_POST['PRO_CPF']);
        $pontoColeta->__set('PRO_RG', $_POST['PRO_RG']);
        $pontoColeta->__set('PRO_RUA', $_POST['PRO_RUA']);
        $pontoColeta->__set('PRO_NUMERO', $_POST['PRO_NUMERO']);
        $pontoColeta->__set('PRO_BAIRRO', $_POST['PRO_BAIRRO']);
        $pontoColeta->__set('PRO_CEP', $_POST['PRO_CEP']);
        $pontoColeta->__set('PRO_LOGRADOURO', $_POST['PRO_LOGRADOURO']);
        $pontoColeta->__set('PRO_TELEFONE', $_POST['PRO_TELEFONE']);
        $pontoColeta->__set('PCO_NOME', $_POST['PCO_NOME']);
        $pontoColeta->__set('PCO_RUA', $_POST['PCO_RUA']);
        $pontoColeta->__set('PCO_NUMERO', $_POST['PCO_NUMERO']);
        $pontoColeta->__set('PCO_BAIRRO', $_POST['PCO_BAIRRO']);
        $pontoColeta->__set('PCO_CEP', $_POST['PCO_CEP']);
        $pontoColeta->__set('PCO_LOGRADOURO', $_POST['PCO_LOGRADOURO']);
        $pontoColeta->__set('PCO_LATITUDE', $_POST['PCO_LATITUDE']);
        $pontoColeta->__set('PCO_LONGITUDE', $_POST['PCO_LONGITUDE']);
        $pontoColeta->__set('PCO_TELEFONE', $_POST['PCO_TELEFONE']);
        $pontoColeta->__set('PCO_CNPJ', $_POST['PCO_CNPJ']);
        

        $pontoColetaDAO->alterar($pontoColeta);

        header('Location: /dashboard/listarPontosDeColetaCadastrados');
    }

    public function Avaliar()
    {
        $pontoColeta = new PontoColetaModel();
        $pontoColeta->__set('PCO_ID',$_POST['PCO_ID']);
        $pontoColeta->__set('PCO_AVALIACAO',$_POST['PCO_AVALIACAO']);

        $pontoColetaDAO = new PontoColetaDAO();
        $pontoColetaDAO->Avaliar($pontoColeta);
        
        header('Location:/dashboard/buscarPonto');
    }

// function buscarPorNome(){
//     return $idPco
// }



//     public function buscar()
// {
//     //pega o valor do campo teste
//     $nome = $request->get('teste');
//     //busca o primeiro usuario com o nome passado
//     $user = DB::select("select * from users where nome = $nome")->first();

//     //retorna a view users.index passando as variaveis nome e user
//     return view('users.index', compact('nome', 'user'));
// }    

}


