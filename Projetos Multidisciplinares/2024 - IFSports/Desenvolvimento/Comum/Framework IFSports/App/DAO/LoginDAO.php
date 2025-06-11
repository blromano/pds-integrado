<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\LoginModel; //Linkando o model ao DAO
    use PDO;
    use PDOException;

    class LoginDAO extends DAO{
        
        public function listar(){
            try{
                //Colocar o código aqui
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }

        public function inserir($obj){

            $LGN_EMAIL = $obj->__get('LGN_EMAIL');
            $LGN_SENHA = md5($obj->__get('LGN_SENHA'));
            $LGN_TIPO = $obj->__get('LGN_TIPO');

            $sql = "INSERT INTO login(
                        LGN_EMAIL,
                        LGN_SENHA,
                        LGN_TIPO
                        ) VALUES (
                        :LGN_EMAIL,
                        :LGN_SENHA,
                        :LGN_TIPO
                    )";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':LGN_EMAIL', $LGN_EMAIL);
            $stmt->bindParam(':LGN_SENHA', $LGN_SENHA);
            $stmt->bindParam(':LGN_TIPO', $LGN_TIPO);


            $stmt->execute();

        }
        public function excluir($obj){

        }
        public function alterar($obj){
            try{
                //colocar o código aqui

            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }
        public function buscarPorId($id){
            try{
                
               //Colocar o código aqui
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }
        public function buscarPorEmail($email){
            try{
                
                $sql = "SELECT LGN_ID, LGN_TIPO FROM login WHERE LGN_EMAIL=:LGN_EMAIL";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':LGN_EMAIL', $email);

                $stmt->execute();
                $resultado = array();
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    array_push($resultado, $result['LGN_ID']);
                    array_push($resultado, $result['LGN_TIPO']);
                    return $resultado;
                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }  
        }

        public function BuscarUsuarioLogado($id) {
            try{
                $sql = "SELECT * FROM login WHERE lgn_id=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();
                
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                   $loginModel = new LoginModel();
                    
                    $loginModel->__set('LGN_ID', $result['LGN_ID']);
                    $loginModel->__set('LGN_TIPO', $result['LGN_TIPO']);
                                        
                    return $loginModel;
                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }

        public function logar($email, $senha)
        {
            try {
                $sql = 'SELECT * FROM login WHERE LGN_EMAIL=:email AND LGN_SENHA=:senha';
        
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);
        
                $stmt->execute();
        
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
                return $result !== false; // Retorna true se encontrar, false caso contrário
            } catch (\PDOException $ex) {
                // Log do erro para debugging
                error_log("Erro no banco de dados: " . $ex->getMessage());
                throw new Exception("Erro ao conectar ao banco de dados."); // Lança para o controller tratar
            }
        }

        public function buscarPorEmailCompleto($email){
            try{
                $email = trim($email);
                $sql = "SELECT * FROM LOGIN WHERE LGN_EMAIL = :LGN_EMAIL";
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindValue(':LGN_EMAIL', $email);
                $stmt->execute();
        
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
                if($result) {
                    $loginModel = new LoginModel();
                    $loginModel->__set('LGN_ID', $result['LGN_ID']);
                    $loginModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                    $loginModel->__set('LGN_SENHA', $result['LGN_SENHA']);
                    $loginModel->__set('LGN_TIPO', $result['LGN_TIPO']);
                    $loginModel->__set('LGN_ATIVO', $result['LGN_ATIVO']);
                    $loginModel->__set('LGN_JUSTIFICATIVA_RESTRICAO', $result['LGN_JUSTIFICATIVA_RESTRICAO']);
        
                    return $loginModel;
                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                error_log("Erro ao buscar por e-mail completo: " . $ex->getMessage());
                throw new Exception("Erro ao buscar por e-mail completo.");
            }  
        }
    
        public function atualizarSenha($email, $novaSenhaHashed) {
            try {
                $sql = "UPDATE LOGIN SET LGN_SENHA = :novaSenha WHERE LGN_EMAIL = :email";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindValue(':novaSenha', $novaSenhaHashed);
                $stmt->bindValue(':email', $email);
                $stmt->execute();
                return $stmt->rowCount();
            } catch (\PDOException $ex) {
                error_log("Erro ao atualizar senha: " . $ex->getMessage());
                throw new Exception("Erro ao atualizar senha.");
            }
        }
        
        
        public function mudarsenhasec($obj) {
            try {
                $SCE_PRONTUARIO = $obj->__get('SCE_PRONTUARIO');
                $SENHA_ATUAL = $obj->__get('SENHA_ATUAL'); // Certifique-se de usar o mesmo método de hash
                $NOVA_SENHA = $obj->__get('NOVA_SENHA');
        
                $sql = "UPDATE login
                        SET LGN_SENHA = :NOVA_SENHA
                        WHERE LGN_ID = 
                        (SELECT FK_LOGIN_LGN_ID
                         FROM SECRETARIO_EVENTOS
                         WHERE SCE_PRONTUARIO = :SCE_PRONTUARIO) 
                        AND LGN_SENHA = :SENHA_ATUAL"; // Aqui você verifica a senha atual
        
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':NOVA_SENHA', $NOVA_SENHA);
                $stmt->bindParam(':SCE_PRONTUARIO', $SCE_PRONTUARIO);
                $stmt->bindParam(':SENHA_ATUAL', $SENHA_ATUAL);
        
                $stmt->execute();
                
                return $stmt->rowCount(); // Retorna o número de linhas afetadas, para confirmar se a atualização ocorreu
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }
        
    }