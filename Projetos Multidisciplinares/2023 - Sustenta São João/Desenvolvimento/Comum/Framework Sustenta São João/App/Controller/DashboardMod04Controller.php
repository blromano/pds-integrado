<?php

namespace App\Controller;

require './vendor/autoload.php';

use FW\Controller\Action;
use App\Model\PontoColetaModel;
use App\DAO\PontoColetaDAO;
use App\DAO\Residuo_SolidoDAO;
use App\DAO\Descarte_ResiduoDAO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class DashboardMod04Controller extends Action
{

    public function index()
    {
        $title = "Login de Usuários - Dashboard";
        $texto = "Login de Usuários";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('login', 'welcome'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function cadastrarPonto()
    {
        $title = "Dashboard - Sustenta São João";
        $texto = "";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('cadastrarPonto', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function registrarDescarte()
    {
        $title = "Registrar Descarte";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $pontoColetas = 0;
        $PontoColetaDAO = new PontoColetaDAO();
        $pontoColetas = $PontoColetaDAO->listar();

        $residuos_solidos = 0;
        $Residuo_SolidoDAO = new Residuo_SolidoDAO();
        $residuos_solidos = $Residuo_SolidoDAO->listar();
        $this->getView()->residuo_solido = $residuos_solidos;
        $this->getView()->pontoColeta = $pontoColetas;

        $this->render('registrarDescarte', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function cadastrarResiduo()
    {
        $title = "Cadastrar Resíduo";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('cadastrarResiduo', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function listarResiduos()
    {
        $title = "Resíduos";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('listarResiduos', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function realizarDescarte()
    {
        $title = "Realizar descarte";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('realizarDescarte', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function consultarDescarte()
    {
        $title = "Consultar descarte";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('consultarDescarte', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function listarDescartes()
    {
        $title = "Descartes";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('listarDescartes', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function listarResiduosPorPonto()
    {
        $title = "Resíduos Por Ponto";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('listarResiduosPorPonto', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function buscarPonto()
    {
        $title = "Buscar Ponto de Coleta";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $pontoColetaDAO = new PontoColetaDAO();
        $pontosdecoleta = $pontoColetaDAO->populaCombo();

        $this->getView()->pontoColeta = $pontosdecoleta;

        $this->render('buscarPonto', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function buscarInformacoesPontoColeta()
    {
        $title = "Ponto Selecionado";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        // $pessoa = new PessoaModel();
        //,0 $pessoaDAO = new PessoaDAO();

        $id = $_POST['id'];

        $pontoColeta = new PontoColetaModel();
        $pontoColetaDAO = new PontoColetaDAO();

        $pontoColeta = $pontoColetaDAO->buscarPorID($id);

        $this->getView()->texto = $texto;
        $this->getView()->pontoColeta = $pontoColeta;
        $this->render('buscarInformacoesPontoColeta', 'dashboard');
    }

    public function obterDados()
    {
        $title = "Dados Estatísticos";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $Descarte_ResiduoDAO = new Descarte_ResiduoDAO();
        $descarte_residuos = $Descarte_ResiduoDAO->listar();

        $PontoColetaDAO = new PontoColetaDAO();
        $pontoColetas = $PontoColetaDAO->listar();

        $this->getView()->descarte_residuo = $descarte_residuos;
        $this->getView()->pontoColeta = $pontoColetas;


        $this->render('obterDados', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function obterDados2()
    {
        $title = "Gráficos";
        $texto = "Sustentabilidade";
        $pagina = "grafico";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;
        $this->getView()->pagina = $pagina;

        $ObterDados = new Descarte_ResiduoDAO();

        if (isset($_POST['pontoEscolhido'])) {
            $pontoEscolhido = $_POST['pontoEscolhido'];
        } else {
            $pontoEscolhido = NULL;
        }

        if (isset($_POST['dataInicial'])) {
            $dataInicial = $_POST['dataInicial'];
        } else {
            $dataInicial = NULL;
        }

        if (isset($_POST['dataFinal'])) {
            $dataFinal = $_POST['dataFinal'];
        } else {
            $dataFinal = NULL;
        }
        
        $dadosEstatisticos = $ObterDados->obterDados($pontoEscolhido, $dataInicial, $dataFinal);

        $data[] = null;

        $this->getView()->dadosEstatistico = $dadosEstatisticos;
        foreach ($this->getView()->dadosEstatistico as $dado) {
            $data[] = [$dado->__get('DDE_RESIDUO'), (int) $dado->__get('DDE_QUANTIDADE')];
        }
        // Converte os dados em JSON.
        $data_json = json_encode($data);

        $this->getView()->data_json = $data_json;

        $this->render('graficos', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function sendPDF()
    {
        // Instância da classe

        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor

            $mail->isSMTP(); //Devine o uso de SMTP no envio

            $mail->SMTPAuth = true; //Habilita a autenticação SMTP

            $mail->Username = '';

            $mail->Password = ''; //erro: Message could not be sent. Mailer Error: SMTP Error: Could not authenticate.

            // Criptografia do envio SSL também é aceito

            $mail->SMTPSecure = 'tls';

            // Informações específicadas pelo Google

            $mail->Host = 'smtp.gmail.com';

            $mail->Port = 587;

            // Define o remetente

            $mail->setFrom('joaovitorgregorio49@gmail.com', 'Sustenta São João');

            // Define o destinatário

            $mail->addAddress('joaovitorsams49@gmail.com', 'Usuário');

            // Conteúdo da mensagem

            $mail->isHTML(true); // Seta o formato do e-mail para aceitar conteúdo HTML

            $mail->Subject = 'Assunto';

            $mail->Body = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';

            $mail->AltBody = 'Este é o cortpo da mensagem para clientes de e-mail que não reconhecem HTML';

            // Enviar

            $mail->send();

            echo 'A mensagem foi enviada!';
        } catch (Exception $e) {

            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function cadastrarPontoColeta()
    {
        $title = "Cadastrar Ponto de Coleta";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('cadastrarPontoColeta', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }

    public function listarPontosDeColetaCadastrados()
    {
        $title = "Pontos de Coleta";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('listarPontosDeColetaCadastrados', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }
    public function editarPontoCadastrado()
    {
        $title = "Editar Ponto Cadastrado";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('editarPontoCadastrado', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }
    public function excluirPontoCadastrado()
    {
        $title = "Excluir Ponto Cadastrado";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('excluirPontoCadastrado', 'dashboard'); //Carrega o arquivo index que esta dentro da pasta dashboard
    }



    public function validaAutenticacao()
    {
        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }
}
