<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\AlunosModel;
    use App\Model\LoginModel;
    use App\Model\Secretarios_EventosModel;
    use App\DAO\AlunosDAO;
    use App\DAO\LoginDAO;
    use App\DAO\Secretarios_EventosDAO;


    class AlunosController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        
        public function cadastraraluno(){             
            $this->render('cadastraraluno','');
        }

        public function inserir(){  
            
            $loginModel = new LoginModel();

            $loginModel->__set("LGN_EMAIL",$_POST['ALU_EMAIL']);
            $loginModel->__set("LGN_SENHA",$_POST['ALU_SENHA']);
            $loginModel->__set("LGN_TIPO","AL");

            $loginDAO = new LoginDAO();
            $loginDAO->inserir($loginModel);

            $data = $loginDAO->BuscarPorEmail($_POST['ALU_EMAIL']);
            $LGN_ID = $data[0]; 
            //print_r($LGN_ID);
            //exit();
            
            $cadastraraluno = new AlunosModel();

            $cadastraraluno->__set("ALU_NOME", $_POST['ALU_NOME']);
            $cadastraraluno->__set("ALU_NOME_SOCIAL", $_POST['ALU_NOME_SOCIAL']);
            $cadastraraluno->__set("ALU_DATA_NASCIMENTO", $_POST['ALU_DATA_NASCIMENTO']);
            $cadastraraluno->__set("ALU_SEXO", $_POST['ALU_SEXO']);
            $cadastraraluno->__set("ALU_ETNIA", $_POST['ALU_ETNIA']);
            $cadastraraluno->__set("ALU_CPF", $_POST['ALU_CPF']);
            $cadastraraluno->__set("ALU_RG", $_POST['ALU_RG']);
            $cadastraraluno->__set("ALU_FOTO", $_POST['ALU_FOTO']);
            $cadastraraluno->__set("ALU_TELEFONE", $_POST['ALU_TELEFONE']);
            $cadastraraluno->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
            $cadastraraluno->__set("ALU_RUA", $_POST['ALU_RUA']);
            $cadastraraluno->__set("ALU_NUMERO", $_POST['ALU_NUMERO']);
            $cadastraraluno->__set("ALU_BAIRRO", $_POST['ALU_BAIRRO']);
            $cadastraraluno->__set("ALU_CEP", $_POST['ALU_CEP']);
            $cadastraraluno->__set("ALU_COMPLEMENTO", $_POST['ALU_COMPLEMENTO']);
            $cadastraraluno->__set("ALU_PRONTUARIO", $_POST['ALU_PRONTUARIO']);
            $cadastraraluno->__set("FK_CURSOS_CUR_ID", $_POST['FK_CURSOS_CUR_ID']);
            $cadastraraluno->__set("FK_LOGIN_LGN_ID", $LGN_ID);
            

            $cadastraralunodao = new AlunosDAO();
            $cadastraralunodao->inserir($cadastraraluno);

            header('Location: /login');
        }

        public function validaAutenticacao() {

        }
    }

?>
