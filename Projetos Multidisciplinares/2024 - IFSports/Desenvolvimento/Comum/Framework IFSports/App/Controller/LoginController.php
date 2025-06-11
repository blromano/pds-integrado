<?php

namespace App\Controller;

require_once __DIR__ . '/../../phpmailer/PHPMailer.php';
require_once __DIR__ . '/../../phpmailer/SMTP.php';
require_once __DIR__ . '/../../phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use FW\Controller\Action;
use App\Model\Secretarios_EventosModel;
use App\DAO\Secretarios_EventosDAO;
use App\Model\Responsaveis_EquipeModel;
use App\DAO\Responsaveis_EquipeDAO;
use App\DAO\AlunosDAO;
use App\Model\AlunosModel;
use App\Model\Organizadores_EventosModel;
use App\DAO\Organizadores_EventosDAO;
use App\DAO\LoginDAO;
use App\Model\LoginModel;
use App\DAO\CidadesDAO;
use App\Model\CidadesModel;


class LoginController extends Action{

    public function enviarRecuperacaoSenha() {
        // Iniciar sessão
    
        // Verificar se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obter o e-mail do formulário
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
    
                // Instanciar o DAO e verificar se o usuário existe
                $loginDAO = new LoginDAO();
                $userExists = $loginDAO->buscarPorEmailCompleto($email);
    
                if ($userExists) {
                    // Gerar nova senha randomicamente
                    $newPasswordPlain = substr(md5(uniqid(rand(), true)), 0, 8);
                    $newPasswordHashed = md5($newPasswordPlain);
    
                    // Atualizar senha no banco de dados
                    $loginDAO->atualizarSenha($email, $newPasswordHashed);

                     // Definir o template de e-mail com o conteúdo HTML
                     $emailTemplate = <<<EOD
                     <!DOCTYPE html>
                     <html>
                     <head>
                         <meta charset="UTF-8">
                         <title>Recuperação de Senha - IFSports</title>
                     </head>
                     <body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
                         <div style="background-color: #f2f2f2; padding: 20px;">
                             <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px;">
                     
                                 <!-- Mensagem de Sucesso -->
                                 <h2 style="text-align: center; color: #333333;">Redefinição de senha bem-sucedida</h2>
                     
                                 <!-- Texto Explicativo -->
                                 <p style="font-size: 14px; color: #555555; line-height: 1.6;">
                                     Agora você pode fazer login utilizando a nova senha fornecida abaixo. Recomendamos que, após o login, você acesse seu perfil para redefinir a senha para uma de sua preferência.
                                 </p>
                     
                                 <!-- Nova Senha -->
                                 <p style="font-size: 16px; color: #333333; text-align: center;">
                                     <strong>Sua nova senha é:</strong><br>
                                     <span style="font-size: 24px;">{{NOVA_SENHA}}</span>
                                 </p>
                     
                                 <!-- Botão para Login -->
                                 <div style="text-align: center; margin: 30px 0;">
                                     <a href="http://localhost:8000/login" style="background-color: #1D8AA7; color: #ffffff; padding: 15px 25px; text-decoration: none; font-weight: bold; border-radius: 5px; display: inline-block;">Acessar o Sistema</a>
                                 </div>
                     
                                 <!-- Rodapé -->
                                 <p style="font-size: 12px; color: #999999; text-align: center;">
                                     Se você não solicitou esta alteração, por favor, entre em contato com o suporte.
                                 </p>
                             </div>
                         </div>
                     </body>
                     </html>
                     EOD;
                     
                    // Substituir o placeholder {{NOVA_SENHA}} pela nova senha
                    $emailBody = str_replace('{{NOVA_SENHA}}', $newPasswordPlain, $emailTemplate);
                         
    
                    // Enviar e-mail para o usuário
                    $mail = new PHPMailer(true);
                    try {
                        // Configurações do servidor SMTP
                        $mail->CharSet = 'UTF-8'; // Definir o charset antes
                        $mail->Encoding = 'base64'; // Definir a codificação
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'ifsports.4info@gmail.com'; // Substitua pelo seu e-mail do Gmail
                        $mail->Password = 'qhrt ijkj twwn eqxx';     // Substitua pela senha de aplicativo gerada
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;
    
                        // Remetente e destinatário
                        $mail->setFrom('ifsports.4info@gmail.com', 'IFSports');
                        $mail->addAddress($email);
    
                        // Conteúdo do e-mail
                        $mail->isHTML(true);
                        $mail->Subject = 'IFSports | Recuperação de senha';
                        $mail->Body    = $emailBody;

                        // Enviar o e-mail
                        $mail->send();
    
                        $_SESSION["message_type"] = "success";
                        $_SESSION["message_text"] = "Um e-mail com a nova senha foi enviado para o seu endereço de e-mail.";
                    } catch (Exception $e) {
                        // Log do erro (opcional)
                        error_log("Erro ao enviar e-mail: " . $e->getMessage());
    
                        // Redirecionar de volta com mensagem de erro
                        $_SESSION["error_message"] = "Não foi possível enviar o e-mail. Por favor, tente novamente mais tarde.";
                        header('Location: /dashboard/recuperarsenha');
                        exit;
                    }
                } else {
                    // Definir mensagem de erro
                    $_SESSION["message_type"] = "error";
                    $_SESSION["message_text"] = "E-mail não encontrado.";
                }
            } else {
                // Definir mensagem de erro
                $_SESSION["message_type"] = "error";
                $_SESSION["message_text"] = "Por favor, informe um endereço de e-mail.";
            }
        } else {
            // Definir mensagem de erro
            $_SESSION["message_type"] = "error";
            $_SESSION["message_text"] = "Requisição inválida.";
        }

        $this->render('recuperarsenha', '');
        exit;
    }

    public function login(){             
        $this->render('login','');
    }

    public function logar()
    {
        try {
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
    
            $loginDAO = new LoginDAO();
            $isLogged = $loginDAO->logar($email, $senha); // Apenas uma chamada
    
            if ($isLogged) {
                $resultado = $loginDAO->buscarPorEmail($email); // Recupera o ID após validação
                session_start();
                $_SESSION["ID"] = $resultado['0'];
                $_SESSION["TIPO"] = $resultado['1'];

                /*

                if($resultado['1'] == 'RE') {
                    $resultado2 = $loginDAO->buscarDadosResponsavelEquipe($resultado['0']);
                    $_SESSION["ID_RE"] = $resultado2['0'];
                } else if($resultado['1'] == 'OE') {
                    $resultado2 = $loginDAO->buscarDadosOrganizadorEvento($resultado['0']);
                    $_SESSION["ID_OE"] = $resultado2['0'];
                } else if($resultado['1'] == 'SE') {
                    $resultado2 = $loginDAO->buscarDadosSecretarioEvento($resultado['0']);
                    $_SESSION["ID_SE"] = $resultado2['0'];
                }

                */
                header('Location: /dashboard/listarmeuseventos');
            } else {
                // Redirecionar para login com mensagem de erro
                session_start();
                $_SESSION["error_message"] = "E-mail ou senha inválidos.";
                header('Location: /login');
            }
        } catch (Exception $e) {
            // Trate exceções genéricas
            error_log("Erro ao logar: " . $e->getMessage());
            header('Location: /error103');
        }
    }

    public function inscreverse(){             
        $this->render('inscreverse','');
    }

    public function recuperarsenha(){             
        $this->render('recuperarsenha','');
    }

    public function mudarsenha(){             
        $this->render('mudarsenha','dashboard');
    }

    public function mudarsenhasec() {             
        var_dump($_POST);
        
        $title = "Mudar Senha - Dashboard";
        $texto = "form de edição do cadastro";
    
        $this->getView()->title = $title;
        $this->getView()->texto = $texto; 
    
        $loginModel = new LoginModel();
        $loginDAO = new LoginDAO();
    
        // Verifica se a requisição é do tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura os dados do formulário
            $loginModel->__set('SCE_PRONTUARIO', $_POST['SCE_PRONTUARIO']);
            $loginModel->__set('LGN_SENHA', $_POST['LGN_SENHA']);
            $loginModel->__set('LGN_SENHA', $_POST['LGN_SENHA']);
    
            // Verifica se a nova senha e a confirmação são iguais
            if ($_POST['LGN_SENHA'] !== $_POST['LGN_SENHA']) {
                // Exibe mensagem de erro (pode ser ajustado para redirecionar ou mostrar na view)
                $this->getView()->mensagem = "As senhas não coincidem.";
            } else {
                // Chama o método de alteração de senha
                $resultado = $loginDAO->mudarsenhasec($loginModel);
                
                if ($resultado) {
                    // Sucesso na atualização
                    $this->getView()->mensagem = "Senha alterada com sucesso.";
                } else {
                    // Falha na atualização
                    $this->getView()->mensagem = "Erro ao alterar a senha. Verifique seus dados.";
                }
            }
        }
    
        // Renderiza a view com a mensagem, se existir
        $this->render('mudarsenhasec', 'dashboard');
    }
    
    public function mudarsenhaorg(){             
        $this->render('mudarsenhaorg','dashboard');
    }

    public function editarinfo(){
            
        $title = "Editar Perfil - Dashboard";
        $texto = "form de edição do cadastro";

        $cidadesDAO = new CidadesDAO();
        $cidades = $cidadesDAO->listar();

        $this->getView()->title = $title;
        $this->getView()->texto = $texto; 
        $this->getView()->cidades = $cidades;
        
        
        if(isset($_SESSION['ID'])){
            $loginModel = new LoginModel();
            $loginDAO = new LoginDAO();
            
            $loginModel = $loginDAO->BuscarUsuarioLogado($_SESSION['ID']);

            //print_r($loginModel->__get('LGN_TIPO'));
            //exit();
            
            if($loginModel->__get('LGN_TIPO') == 'AL') {
                $alunoModel = new AlunosModel();
                $alunoDAO = new AlunosDAO();

                $alunoModel = $alunoDAO->BuscarAlunoLogado($_SESSION['ID']);
                $this->getView()->aluno = $alunoModel;
                
                $this->render('editarinfoal', 'dashboard');
            }
            else if($loginModel->__get('LGN_TIPO') == 'SE') {

                $secretario_EventosModel = new Secretarios_EventosModel();
                $secretario_EventosDAO = new Secretarios_EventosDAO();
                
                $secretario_EventosModel = $secretario_EventosDAO->BuscarSecretarioEventosLogado($_SESSION['ID']);
                $this->getView()->secretario = $secretario_EventosModel;

                $this->render('editarinfose', 'dashboard');

            }
            else if ($loginModel->__get('LGN_TIPO') == 'OE') {
                
                $organizador_EventosModel = new Organizadores_EventosModel();
                $organizador_EventosDAO = new Organizadores_EventosDAO();
                
                $organizador_EventosModel = $organizador_EventosDAO->BuscarOrganizadorEventosLogado($loginModel->__get('LGN_ID'));
                $this->getView()-> organizador = $organizador_EventosModel;

                $this->render('editarinfooe', 'dashboard');
            }
            else if ($loginModel->__get('LGN_TIPO') == 'RE') {

                $responsavel_EquipeModel = new Responsaveis_EquipeModel();
                $Responsavel_EquipeDAO = new Responsaveis_EquipeDAO();
                
                $responsavel_EquipeModel = $Responsavel_EquipeDAO->BuscarResponsavelEquipeLogado($loginModel->__get('LGN_ID'));
                $this->getView()-> responsavel = $responsavel_EquipeModel;

                $this->render('editarinfore', 'dashboard');

            }

        }else{
            $this->getView()->alunoLogado = '';
        }
   
    }

    public function alterar(){

        if(isset($_POST['FK_LOGIN_LGN_ID'])){
            
        
            
            $loginModel = new LoginModel();
            $loginDAO = new LoginDAO();
            
            $loginModel = $loginDAO->BuscarUsuarioLogado($_POST['FK_LOGIN_LGN_ID']); 
            //print_r($loginModel->__get('LGN_TIPO'));
            //exit();
            if($loginModel->__get('LGN_TIPO') == 'AL') {

            $alunoModel= new alunosModel();
            $alunodao = new AlunosDAO();

            $alunoModel->__set("ALU_NOME_SOCIAL", $_POST['ALU_NOME_SOCIAL']);
            $alunoModel->__set("ALU_DATA_NASCIMENTO", $_POST['ALU_DATA_NASCIMENTO']);
            $alunoModel->__set("ALU_FOTO", $_POST['ALU_FOTO']);
            $alunoModel->__set("ALU_TELEFONE", $_POST['ALU_TELEFONE']);
            $alunoModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
            $alunoModel->__set("ALU_RUA", $_POST['ALU_RUA']);
            $alunoModel->__set("ALU_BAIRRO", $_POST['ALU_BAIRRO']);
            $alunoModel->__set("ALU_CEP", $_POST['ALU_CEP']);
            $alunoModel->__set("ALU_COMPLEMENTO", $_POST['ALU_COMPLEMENTO']);
            $alunoModel->__set("FK_LOGIN_LGN_ID", $_POST['FK_LOGIN_LGN_ID']);
            $alunodao->alterarinfoaluno($alunoModel);

            header('Location: /dashboard/info');
            }
            else if($loginModel->__get('LGN_TIPO') == 'SE') {

                $secretario_EventosModel = new Secretarios_EventosModel();
                $secretario_EventosDAO = new Secretarios_EventosDAO();

                //print_r($loginModel->__get('LGN_TIPO'));
               //exit();

                $secretario_EventosModel->__set("SCE_NOME_SOCIAL", $_POST['SCE_NOME_SOCIAL']);
                $secretario_EventosModel->__set("SCE_DATA_NASCIMENTO", $_POST['SCE_DATA_NASCIMENTO']);
                $secretario_EventosModel->__set("SCE_FOTO", $_POST['SCE_FOTO']);
                $secretario_EventosModel->__set("SCE_TELEFONE", $_POST['SCE_TELEFONE']);
                $secretario_EventosModel->__set("SCE_RUA", $_POST['SCE_RUA']);
                $secretario_EventosModel->__set("SCE_BAIRRO", $_POST['SCE_BAIRRO']);
                $secretario_EventosModel->__set("SCE_CEP", $_POST['SCE_CEP']);
                $secretario_EventosModel->__set("SCE_COMPLEMENTO", $_POST['SCE_COMPLEMENTO']);
                $secretario_EventosModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
                $secretario_EventosModel->__set("FK_LOGIN_LGN_ID", $_POST['FK_LOGIN_LGN_ID']);
                $secretario_EventosDAO->alterarinfosecretario($secretario_EventosModel);

                header('Location: /dashboard/info');
            }
            else if($loginModel->__get('LGN_TIPO') == 'OE') { 
                $organizador_EventosModel = new Organizadores_EventosModel();
                $organizador_EventosDAO = new Organizadores_EventosDAO();

                //print_r($_POST['ORE_NOME_SOCIAL']);
                //exit();

                $organizador_EventosModel->__set("ORE_NOME_SOCIAL", $_POST['ORE_NOME_SOCIAL']);
                $organizador_EventosModel->__set("ORE_DATA_NASCIMENTO", $_POST['ORE_DATA_NASCIMENTO']);
                $organizador_EventosModel->__set("ORE_BAIRRO", $_POST['ORE_BAIRRO']);
                $organizador_EventosModel->__set("ORE_CEP", $_POST['ORE_CEP']);
                $organizador_EventosModel->__set("ORE_RUA", $_POST['ORE_RUA']);
                $organizador_EventosModel->__set("ORE_FOTO", $_POST['ORE_FOTO']);
                $organizador_EventosModel->__set("ORE_TELEFONE", $_POST['ORE_TELEFONE']);
                $organizador_EventosModel->__set("ORE_COMPLEMENTO", $_POST['ORE_COMPLEMENTO']);
                $organizador_EventosModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
                $organizador_EventosModel->__set("FK_LOGIN_LGN_ID", $_POST['FK_LOGIN_LGN_ID']);
                $organizador_EventosDAO->alterarinfoorganizador($organizador_EventosModel);
               

                header('Location: /dashboard/info');

            }
            else if($loginModel->__get('LGN_TIPO') == 'RE') {
                $responsavel_EquipeModel = new Responsaveis_EquipeModel();
                $Responsavel_EquipeDAO = new Responsaveis_EquipeDAO();  
                
                $responsavel_EquipeModel->__set("RES_NOME_SOCIAL", $_POST['RES_NOME_SOCIAL']);
                $responsavel_EquipeModel->__set("RES_DATA_NASCIMENTO", $_POST['RES_DATA_NASCIMENTO']);
                $responsavel_EquipeModel->__set("RES_FOTO", $_POST['RES_FOTO']);
                $responsavel_EquipeModel->__set("RES_TELEFONE", $_POST['RES_TELEFONE']);
                $responsavel_EquipeModel->__set("RES_RUA", $_POST['RES_RUA']);
                $responsavel_EquipeModel->__set("RES_BAIRRO", $_POST['RES_BAIRRO']);
                $responsavel_EquipeModel->__set("RES_CEP", $_POST['RES_CEP']);
                $responsavel_EquipeModel->__set("RES_COMPLEMENTO", $_POST['RES_COMPLEMENTO']);
                $responsavel_EquipeModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
                $responsavel_EquipeModel->__set("FK_LOGIN_LGN_ID", $_POST['FK_LOGIN_LGN_ID']);
                $Responsavel_EquipeDAO->alterarinforesponsavel($responsavel_EquipeModel);// MUDAR O ALTERAR NO DAO DA ENTIDADE
                

                header('Location: /dashboard/info');
            }
            else{
                header('Location: /pagina-de-erro');
                exit;
            }



        }
    }

    public function acessarperfildousuario(){ 
        
        if(isset($_GET['id'])){
            $loginModel = new LoginModel();
            $loginDAO = new LoginDAO();
            
            $loginModel = $loginDAO->BuscarUsuarioLogado($_GET['id']);
            
            if($loginModel->__get('LGN_TIPO') == 'AL') {
                $alunoModel = new AlunosModel();
                $alunoDAO = new AlunosDAO();

                $alunoModel = $alunoDAO->BuscarAlunoLogado($_GET['id']);
                $this->getView()->aluno = $alunoModel;
                
                $this->render('acessarperfildousuarioal', 'dashboard');
            }
            else if($loginModel->__get('LGN_TIPO') == 'SE') {

                $secretario_EventosModel = new Secretarios_EventosModel();
                $secretario_EventosDAO = new Secretarios_EventosDAO();
                
                $secretario_EventosModel = $secretario_EventosDAO->BuscarSecretarioEventosLogado($_GET['id']);
                $this->getView()-> secretario = $secretario_EventosModel;

                $this->render('acessarperfildousuariose', 'dashboard');

            }
            else if ($loginModel->__get('LGN_TIPO') == 'OE') {
                //print_r($loginModel->__get('LGN_TIPO'));
                //exit();
                $organizador_EventosModel = new Organizadores_EventosModel();
                $organizador_EventosDAO = new Organizadores_EventosDAO();
                
                $organizador_EventosModel = $organizador_EventosDAO->BuscarOrganizadorEventosLogado($_GET['id']);
                $this->getView()-> organizador = $organizador_EventosModel;

                $this->render('acessarperfildousuariooe', 'dashboard');
            }
            else if ($loginModel->__get('LGN_TIPO') == 'RE') {
                //print_r($loginModel->__get('LGN_TIPO'));
                //exit();

                $responsavel_EquipeModel = new Responsaveis_EquipeModel();
                $Responsavel_EquipeDAO = new Responsaveis_EquipeDAO();
                
                $responsavel_EquipeModel = $Responsavel_EquipeDAO->BuscarResponsavelEquipeLogado($_GET['id']);
                $this->getView()-> responsavel = $responsavel_EquipeModel;

                $this->render('acessarperfildousuariore', 'dashboard');

            }

        }else{
            $this->getView()->alunoLogado = '';
        }
        
    }


    public function validaAutenticacao() {}
}
?>