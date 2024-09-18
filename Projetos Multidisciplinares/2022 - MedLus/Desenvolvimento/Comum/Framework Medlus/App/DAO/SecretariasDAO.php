<?php

namespace App\DAO;

use App\DAO;
use App\Model\SecretariasModel;
use App\Model\UsuariosModel;
use App\DAO\UsuarioDAO;
use FW\Controller;
    
    class SecretariasDAO extends DAO{

        public function adicionarSecretaria($secretaria) {

            $setor = $secretaria->getSEC_SETOR();
            $telep = $secretaria->getSEC_TELEFONE_PROFISSIONAL();
            $prontuario = $secretaria->getSEC_PRONTUARIO();
            $emailp = $secretaria->getSEC_EMAIL_PROFISSIONAL();
            $usu = $secretaria->getFK_USUARIOS_USU_ID();
            $exa = $secretaria->getFK_EXAMES_EXA_ID();
            

            $this->sql = "INSERT INTO $this->tabela (

                    SEC_SETOR, 
                    SEC_TELEFONE_PROFISSIONAL,
                    SEC_PRONTUARIO,
                    SEC_EMAIL_PROFISSIONAL ,
                    FK_USUARIOS_USU_ID,
                    FK_EXAMES_EXA_ID,
                                        
            ) VALUES (

                    :sec_setor,
                    :sec_telefone_profissional,
                    :sec_prontuario,
                    :sec_email_profissional,
                    :fk_usuarios_usu_id,
                    :fk_exames_exa_id,
                
            )";
            
            $this->resultado = $this->conexao->prepare($this->sql);

            $this->resultado->bindParam(':sec_setor', $setor);
            $this->resultado->bindParam(':sec_telefone_profissional', $telep);
            $this->resultado->bindParam(':sec_pronturario', $prontuario);
            $this->resultado->bindParam(':sec_email_profissional', $emailp);
            $this->resultado->bindParam(':fk_usuarios_usu_id', $usu);
            $this->resultado->bindParam(':fk_exames_exa_id', $exa);

            $this->resultado->execute();

        }
         
        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)  
        public function inserir($secretaria){
            try {
                $usuario = new UsuariosModel();

                $usuario->__set('USU_CPF', $_POST['USU_CPF']);
                $usuario->__set('USU_RG', $_POST['USU_RG']);
                $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
                $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
                $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);
                $usuario->__set('USU_TELEFONE', $_POST['USU_TELEFONE']);
                $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
                $usuario->__set('USU_NOME', $_POST['USU_NOME']);
                $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
                $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
                $usuario->__set('USU_CEP', $_POST['USU_CEP']);
                $usuario->__set('USU_COMPLEMENTO', $_POST['USU_COMPLEMENTO']);
                $usuario->__set('USU_FOTO', $_POST['USU_FOTO']);
                $usuario->__set('USU_NOME_SOCIAL', $_POST['USU_NOME_SOCIAL']);

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->inserir($usuario);
                $usuarioDAO->db->lastInsertID();
                
                $sql = "insert into pacientes(SEC_SETOR, SEC_TELEFONE_PROFISSIONAL, SEC_PRONTUARIO, SEC_EMAIL_PROFISSIONAL, FK_USUARIOS_USU_ID, FK_EXAMES_EXA_ID) 
                values (:sec_setor, :sec_telefone_profissional, :sec_prontuario, :sec_email_profissional, :fk_usuarios_usu_id, :fk_exames_exa_id)";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':sec_setor',  $secretaria->__get('SEC_SETOR'));
                $stmt->bindParam(':sec_telefone_profissional',  $secretaria->__get('SEC_TELEFONE_PROFISSIONAL')); 
                $stmt->bindParam(':sec_prontuario',  $secretaria->__get('SEC_PRONTUARIO')); 
                $stmt->bindParam(':sec_email_profissional',  $secretaria->__get('SEC_EMAIL_PROFISSIONAL')); 
                $stmt->bindParam(':fk_usuarios_usu_id',  $secretaria->__get('FK_USUARIOS_USU_ID'));  
                $stmt->bindParam(':fk_exames_exa_id',  $secretaria->__get('FK_EXAMES_EXA_ID'));  
                $stmt->execute();
                } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
                }
        }

        //Listando todos os dados da tabela pacientes em ordem crescente de PAC_ID
        public function listar(){
            try {
                $usuario = array();

                    $usuario = new UsuariosModel();
                    
                    // $usuario->__set('USU_ID', $row['USU_ID']);
                    // $usuario->__set('USU_CPF', $row['USU_CPF']);
                    // $usuario->__set('USU_RG', $row['USU_RG']);
                    // $usuario->__set('USU_EMAIL', $row['USU_EMAIL']);
                    // $usuario->__set('USU_SENHA', $row['USU_SENHA']);
                    // $usuario->__set('USU_NUMERO_CELULAR', $row['USU_NUMERO_CELULAR']);
                    // $usuario->__set('USU_TELEFONE', $row['USU_TELEFONE']);
                    // $usuario->__set('USU_DATA_DE_NASCIMENTO', $row['USU_DATA_DE_NASCIMENTO']);
                    // $usuario->__set('USU_NOME', $row['USU_NOME']);
                    // $usuario->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);
                    // $usuario->__set('USU_SEXO', $row['USU_ENUM']);
                    // $usuario->__set('USU_CEP', $row['USU_CEP']);
                    // $usuario->__set('USU_COMPLEMENTO', $row['USU_COMPLEMENTO']);
                    // $usuario->__set('USU_FOTO', $row['USU_FOTO']);
                    // $usuario->__set('USU_NOME_SOCIAL', $row['USU_NOME_SOCIAL']);

                    $usuarioDAO = new UsuarioDAO();
                    $usuarioDAO->inserir($usuario);
                    $usuarioDAO->db->lastInsertID();
    
                    $secretarias = array();
                    $sql = "SELECT * FROM medicos ORDER BY MED_ID ASC ";
    
                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();
    
                    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                        $secretaria = new SecretariasModel();
                        $secretaria->__set('SEC_ID', $row['SEC_ID']);
                        $secretaria->__set('SEC_SETOR', $row['SEC_SETOR']);
                        $secretaria->__set('SEC_TELEFONE_PROFISSIONAL', $row['SEC_TELEFONE_PROFISSIONAL']);
                        $secretaria->__set('SEC_PRONTUARIO', $row['SEC_PRONTUARIO']);
                        $secretaria->__set('SEC_EMAIL_PROFISSIONAL', $row['SEC_EMAIL_PROFISSIONAL']);
                        $secretaria->__set('FK_USUARIOS_USU_ID', $row['FK_USUARIOS_USU_ID']);
                        $secretaria->__set('FK_EXAMES_EXA_ID', $row['FK_EXAMES_EXA_ID']);
    
                        array_push($secretarias, $secretaria); //Inserindo os dados persistidos da tabela em um array
                    }
    
                    return $secretarias; //retornando o array para mostagem da view
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
                }
        }
                  //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
                public function alterar($secretaria){
                        try {
                            $sql = "UPDATE secretarias SET SEC_SETOR=:sec_setor, SEC_TELEFONE_PROFISSIONAL=:sec_telefone_profissional, SEC_PRONTUARIO=:sec_prontuario, 
                            SEC_EMAIL_PROFISSIONAL=:sec_email_profissional, FK_USUARIOS_USU_ID=:fk_usuarios_usu_id, FK_EXAMES_EXA_ID=:fk_exames_exa_id WHERE SEC_ID=:id";

                            $stmt = $this->getConn()->prepare($sql);

                            $stmt->bindParam(':sec_setor', $medico->__get('SEC_SETOR'));
                            $stmt->bindParam(':sec_telefone_profissional', $medico->__get('SEC_TELEFONE_PROFISSIONAL'));
                            $stmt->bindParam(':sec_prontuario', $medico->__get('SEC_PRONTUARIO'));
                            $stmt->bindParam(':sec_email_profissional', $medico->__get('SEC_EMAIL_PROFISSIONAL'));
                            $stmt->bindParam(':fk_usuarios_usu_id', $medico->__get('FK_USUARIOS_USU_ID'));
                            $stmt->bindParam(':fk_exames_exa_id', $medico->__get('FK_EXAMES_EXA_ID'));
                            $stmt->bindParam(':id', $secretaria->__get('SEC_ID'));

                            $stmt->execute();
                        } catch (\PDOException $ex) {
                            header('Location: /error101');
                            die();
                        }
                    }
                
                //Método para excluir um paciente (recebe o $id do Paciente a ser excluído)
                public function excluir($id)
                {
                    try {
                            $sql = "delete from secretarias where SEC_ID=:id";

                            $stmt = $this->getConn()->prepare($sql);
                            
                            $stmt->bindParam(":id", $id);
                            $stmt->execute();
                        } catch (\PDOException $ex) {
                            header('Location: /error102');
                            die();
                        }
                    }

                           //Método para buscar um registro expecífico no Banco (recebe um $id)
                public function buscarPorId($id){
                    try {
                        $sql = "SELECT * FROM secretarias WHERE SEC_ID=:id";

                        $stmt = $this->getConn()->prepare($sql);

                        $stmt->bindParam(":id", $id);
                        $stmt->execute();

                        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                        if ($result > 0) {
                            $secretaria = new SecretariasModel;
                            $secretaria->__set('SEC_ID', $result['SEC_ID']);
                            $secretaria->__set('SEC_SETOR', $result['SEC_SETOR']);
                            $secretaria->__set('SEC_TELEFONE_PROFISSIONAL', $result['SEC_TELEFONE_PROFISSIONAL']);
                            $secretaria->__set('SEC_PRONTUARIO', $result['SEC_PRONTUARIO']);
                            $secretaria->__set('SEC_EMAIL_PROFISSIONAL', $result['SEC_EMAIL_PROFISSIONAL']);
                            $secretaria->__set('FK_USUARIOS_USU_ID', $result['FK_USUARIOS_USU_ID']);
                            $secretaria->__set('FK_EXAMES_EXA_ID', $result['FK_EXAMES_EXA_ID']);

                            return $secretaria;
                        } else {
                            return null;
                        }
                    } catch (\PDOException $ex) {
                        header('Location: /error103');
                        die();
                    }
                }
        
    }