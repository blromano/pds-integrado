<?php

namespace App\Controller;

require_once __DIR__ . '/../../phpmailer/PHPMailer.php';
require_once __DIR__ . '/../../phpmailer/SMTP.php';
require_once __DIR__ . '/../../phpmailer/Exception.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use App\DAO\EventosDAO;
use App\Model\EventosModel;
use App\Model\ModalidadesModel;
use App\Model\ResultadosModel;
use App\DAO\ResultadosDAO;
use App\Model\Eventos_ModalidadesModel;
use App\DAO\ModalidadesDAO;
use App\DAO\FotosDAO;
use FW\Controller\Action;

class WelcomeController extends Action{

    public function index(){             
                   
            $title = "Página Inicial";
            $this->getView()->title = $title;
        
            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->listareventoswelcome();
        
            $this->getView()->eventos = $eventos ?: []; // Garante que eventos será um array
            $this->render('index', '');
        

    }

    public function listareventos(){

            $title = "Listagem dos Eventos";
            $texto = "";
            $icone_editar='<i class="mdi mdi-pencil"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->listareventoswelcome();

            $this->getView()->eventos = $eventos;             
            $this->render('index','');
    }

    public function VisualizarFotosEventos(){

            $title = "Fotos - Welcome";
            $texto = "Fotos do  ";
            $icone_editar = '<i class="mdi mdi-pencil"></i>';
            $icone_excluir = '<i class="mdi mdi-delete-forever"></i>';
            $icone_resultado = '<i class="mdi mdi-trophy-variant-outline"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $this->getView()->icone_excluir = $icone_excluir;
            $this->getView()->icone_resultado = $icone_resultado;

            $fotosDAO = new FotosDAO();
            $fotos = $fotosDAO->listarfotoswelcome($_GET["EVO_ID"]);
            $this->getView()->fotos = $fotos;
            
            //$eventosDAO = new EventosDAO();
            //$evento = $eventosDAO->buscarPorId($_GET["EVO_ID"]);

            //if ($evento) {
                //$this->getView()->nome_evento = $evento->__get('EVO_NOME'); 
            //} else {
                //$this->getView()->nome_evento = 'Evento não encontrado';
            //}

        $this->render('visualizarfotoseventos','');

    }

    public function VisualizarResultadosFinais(){ 
        
        
            /* $title = "Modalidades - Welcome";
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
            $modalidades = $modalidadeDAO->listar_modalidades_evento_welcome($_GET["EVO_ID"]);

            $eventosDAO = new EventosDAO();
            $evento = $eventosDAO->buscarPorId($_GET["EVO_ID"]);

            if ($evento) {
                $this->getView()->nome_evento = $evento->__get('EVO_NOME'); 
            } else {
                $this->getView()->nome_evento = 'Evento não encontrado';
            }

            $this->getView()->modalidades = $modalidades; 
            
            COMENTADO PARA DEVS GRAVAR TUTORIAL DA FUNCIONALIDADE

            */
            $this->render('visualizarresultadosfinais','');
    }

    public function inserir(){ 
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $primeiro_nome = isset($_POST['primeiro_nome']) ? $_POST['primeiro_nome'] : '';
            $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
            $mensagem = isset($_POST['mensagem'])? $_POST['mensagem'] : '';

            $mail = new PHPMailer();

        try {
          
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'ifsportssjbv@gmail.com'; 
            $mail->Password = 'Senh@ifsports2024';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; 

            
            $mail->setFrom($email, $primeiro_nome);
            $mail->addAddress('ifsportssjbv@gmail.com', 'IFSports'); 

            
            $mail->Subject = 'Mensagem de Contato - ' . $motivo;

            
            $mail->Body = "Mensagem recebida de: $primeiro_nome $sobrenome\n\n";
            $mail->Body .= "E-mail: $email\n";
            $mail->Body .= "Motivo: $motivo\n";
            $mail->Body .= "Mensagem: \n$mensagem";

            
            if ($mail->send()) {
                echo 'Mensagem enviada com sucesso.';
            } else {
                echo 'Não foi possível enviar a mensagem. Erro: ' . $mail->ErrorInfo;
            }
            
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    
            
        $this->render('index','');
    }
    
    }

    public function listarresultadosmodalidade() {

        $resultadosDAO = new ResultadosDAO();
        $resultados = $resultadosDAO->listaresultadoswelcome($_GET["EVO_ID"]);

        $this->getView()->resultados = $resultados;
    }


    public function validaAutenticacao() {}

    
}
?>