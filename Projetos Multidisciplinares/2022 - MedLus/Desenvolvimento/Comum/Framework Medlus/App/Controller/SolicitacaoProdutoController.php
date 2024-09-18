<?php
namespace App\Controller;
use FW\Controller\Action;
use App\Model\SolicitacaoProdutoModel;
use App\DAO\SolicitacaoProdutoDAO;
use Error;

class SolicitacaoProdutoController extends Action{
    public function listarSolicitacoesProdutos(){ 
        $title = "Solicitações de Compras";
        //para passar valores para a VIEW
        $this->getView()->title = $title;
 
        $SolicitacaoProdutoDAO = new SolicitacaoProdutoDAO();
        $solicitacoes = $SolicitacaoProdutoDAO->listar();
        $this->getView()->solicitacoes = $solicitacoes;
        $this->render('listarSolicitacoes/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
    }

    public function detalharSolicitacaoProduto(){ 
        $title = "Solicitações de Compras";
        //para passar valores para a VIEW
        $this->getView()->title = $title;

        if (!isset($_GET['id'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /solicitacaoProduto/listarSolicitacoes'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }
 
        $SolicitacaoProdutoDAO = new SolicitacaoProdutoDAO();
        $solicitacao = $SolicitacaoProdutoDAO->buscarPorId($_GET['id']);
        $this->getView()->solicitacao = $solicitacao;
        $this->render('detalharSolicitacao/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
    }

    public function autorizarSolicitacaoProduto() {
        //para passar valores para a VIEW

        if (!isset($_GET['id'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /error404'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }

        // Confirmar que é secretaria e só depois fazer o seguinte:
        $SolicitacaoProdutoDAO = new SolicitacaoProdutoDAO();
        $solicitacao = $SolicitacaoProdutoDAO->buscarPorId($_GET['id']);
        if(!is_null($solicitacao)) {
            $SolicitacaoProdutoDAO->alterarStatus($_GET['id'], 1);
        }

        header('Location: /solicitacaoProduto/listarSolicitacoes'); //Carrega  o arquivo da pasta View/paciente/index.php
        die();
    }

    public function recusarSolicitacaoProduto() {
        //para passar valores para a VIEW

        if (!isset($_GET['id'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /error404'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }

        // Confirmar que é secretaria e só depois fazer o seguinte:
        $SolicitacaoProdutoDAO = new SolicitacaoProdutoDAO();
        $solicitacao = $SolicitacaoProdutoDAO->buscarPorId($_GET['id']);
        if(!is_null($solicitacao)) {
            $SolicitacaoProdutoDAO->alterarStatus($_GET['id'], 0);
        }

        header('Location: /solicitacaoProduto/listarSolicitacoes'); //Carrega  o arquivo da pasta View/paciente/index.php
        die();
    }

    public function finalizarSolicitacaoProduto() {
        //para passar valores para a VIEW

        if (!isset($_GET['id'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /error404'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }

        // Confirmar que é secretaria e só depois fazer o seguinte:
        $SolicitacaoProdutoDAO = new SolicitacaoProdutoDAO();
        $solicitacao = $SolicitacaoProdutoDAO->buscarPorId($_GET['id']);
        if(!is_null($solicitacao)) {
            $SolicitacaoProdutoDAO->alterarStatus($_GET['id'], 3);
        }

        header('Location: /solicitacaoProduto/listarSolicitacoes'); //Carrega  o arquivo da pasta View/paciente/index.php
        die();
    }
    
    public function listarMinhasSolicitacoesProdutos(){
       //$user_id = $_SESSION['id'];
       $user_id = 1;

       $title = "Minhas Solicitações";
       //para passar valores para a VIEW
       $this->getView()->title = $title;

       $SolicitacaoProdutoDAO = new SolicitacaoProdutoDAO();
       $solicitacoes = $SolicitacaoProdutoDAO->listarMinhasSolicitacao($user_id);
       $this->getView()->solicitacoes = $solicitacoes;
       $this->render('minhasSolicitacoes/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
   }

   //Metodo de View da Solicitação de Compra    
   public function viewsolicitar()
    {
        $title = "Solicitação de Compra";
        $solicitacaoDAO = new SolicitacaoProdutoDAO();
        $solicitacoes = $solicitacaoDAO->produto();
        $this->getView()->produtos = $solicitacoes;
        $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View
        $this->render('solicitarProduto/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/exame/solicitarExame/index
    }

    public function inserir()
    {
        //$user_id = $_SESSION['id'];
        //$user_id = 1;
        $usu_id = 1;
        $solicitacao = new SolicitacaoProdutoModel();
        $solicitacaoDAO = new SolicitacaoProdutoDAO();
        $fk_pro_id = $solicitacaoDAO->buscarProdutoPeloNome($_POST['PRO_NOME']);

        if (!isset($_POST['PRO_NOME']) || !isset($_POST['PSC_QUANTIDADE_PRODUTO_SOLICITADO']) || !isset($_POST['PRO_VALOR']) || !isset($_POST['FOR_CNPJ']) || !isset($_POST['FOR_EMAIL']) || !isset($_POST['FOR_TELEFONE'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /solicitacaoproduto/minhasSolicitacoes?msg=Faltou_Dados'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }
        
        date_default_timezone_set('America/Sao_Paulo');
        $solicitacao->__set('SCP_STATUS', 0); // ZERO PORQUE É PENDENTE
        $solicitacao->__set('PSC_QUANTIDADE_PRODUTO_SOLICITADO', $_POST['PSC_QUANTIDADE_PRODUTO_SOLICITADO']);
        $solicitacao->__set('SCP_DATA_HORA',  date('Y-m-d H:m:s'), time());
        $solicitacao->__set('SCP_JUSTIFICATIVA_RECUSAO', 'asasas');
        $solicitacao->__set('FK_PRODUTOS_PRO_ID', $fk_pro_id);
        $solicitacao->__set('FK_USUARIOS_USU_ID', $usu_id);
        // $solicitacao->__set('PRO_VALOR', $_POST['PRO_VALOR']);
        // $solicitacao->__set('PRO_NOME', $_POST['PRO_NOME']);

        $solicitacaoDAO->inserir($solicitacao);

        header('Location: /solicitacaoProduto/minhasSolicitacoes');
    }

    public function viewEditar(){
        $usu_id = 1;
        $solicitacao = new SolicitacaoProdutoModel();
        $solicitacaoDAO = new SolicitacaoProdutoDAO();
        if(isset($_GET['id'])){
            $solicitacao = $solicitacaoDAO->buscarPorId($_GET['id']);
            if($solicitacao->__get('FK_USUARIOS_USU_ID') == $usu_id){
                $title = "Editar a Solicitação de Compra";
                $this->getView()->title = $title;
                $this->getView()->solicitacao = $solicitacao;
                $this->render('editarSolicitacoes/index', 'dashboard', '');
            }else{
                header("Location: /solicitacaoProduto/minhasSolicitacoes?msg=Usuário_Inexistente");
                die();
            }
        }else{
            header('Location: /solicitacaoProduto/minhasSolicitacoes?msg=Solicitação_Inexistente');
            die();
        }
    }

    public function editarSolicitacaoProduto()
    {
        //$user_id = $_SESSION['id'];
        $fk_produto = 1;

        $solicitacao = new SolicitacaoProdutoModel();
        $solicitacaoDAO = new SolicitacaoProdutoDAO();
 
        if (!isset($_POST['SCP_ID']) || !isset($_POST['PRO_NOME']) || !isset($_POST['SCP_DATA_HORA']) || !isset($_POST['PSC_QUANTIDADE_PRODUTO_SOLICITADO'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /solicitacaoProduto/editarSolicitacoes'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }

        date_default_timezone_set('America/Sao_Paulo');
        $solicitacao->__set('SCP_DATA_HORA',  date('Y-m-d H:m:s'), time());
        $solicitacao->__set('SCP_STATUS', 0); // ZERO PORQUE É PENDENTE
        $solicitacao->__set('SCP_ID', $_POST['SCP_ID']);
        $solicitacao->__set('PRO_NOME', $_POST['PRO_NOME']);
        $solicitacao->__set('PSC_QUANTIDADE_PRODUTO_SOLICITADO', $_POST['PSC_QUANTIDADE_PRODUTO_SOLICITADO']);
        $solicitacao->__set('FK_PRODUTOS_PRO_ID', $fk_produto);
        $solicitacaoDAO->alterar($solicitacao);
        header('Location: /solicitacaoProduto/minhasSolicitacoes');
    }

   public function validaAutenticacao(){}
}
?>