<?php

namespace App\DAO;

use App\DAO;
use App\Model\MedicoModel;
use App\Model\SecretariasModel;
use App\Model\EnfermeirosModel;
use App\Model\PacienteModel;
    
    class LoginDAO extends DAO{


        //Método para adicionar um Paciente na tabelam pacientes
        public function adicionar($obj) {


        }

        //Listando todos os dados da tabela pacientes em ordem crescente de PAC_ID
        public function listar(){
            
        }

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($obj){
            
        }

        //Método para excluir um paciente (recebe o $id do Paciente a ser excluído)
        public function excluir($obj){
            
        }

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($obj){
            
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($obj){
            
        }

        public function efetuarLogin($login){
            try {
                $sql = "SELECT USU_ID, USU_CPF, USU_SENHA, USU_TIPO FROM `usuarios` WHERE USU_CPF=:cpf AND USU_SENHA=:senha";
    
                $stmt = $this->getConn()->prepare($sql);
                $usuario=$login->__get('USU_CPF');
                $senha=$login->__get('USU_SENHA');
                
                $stmt->bindParam(":cpf", $usuario);
                $stmt->bindParam(":senha", $senha);
                $stmt->execute();
    
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
                if ($result > 0) {
                    
                    if ($result['USU_TIPO']=='medico'){
                        $medico = new MedicoModel();
                        $medico->__set('FK_USUARIOS_USU_ID', $result['USU_ID']);  
    
                    } else if($result['USU_TIPO']=='secretario'){
                        $secretaria = new SecretariasModel();
                        $secretaria->__set('FK_USUARIOS_USU_ID', $result['USU_ID']);  
    
                    } else if($result['USU_TIPO']=='paciente'){
                        $paciente = new PacienteModel();
                        $paciente->__set('FK_USUARIOS_USU_ID', $result['USU_ID']);  
    
                    } else if($result['USU_TIPO']=='enfermeiro'){
                        $enfermeiro = new EnfermeirosModel();
                        $enfermeiro->__set('FK_USUARIOS_USU_ID', $result['USU_ID']);  
    
                    }
    
                    return $login;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
    
            
        }

        public function setHash($cpf){
            try {
                $sql = "UPDATE USU_HASH=:hash WHERE USU_CPF=:cpf ";
    
                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":hash", md5($cpf));               
                $stmt->bindParam(":cpf", $cpf);

               
                $stmt->execute();
    
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
                if ($result > 0) {
                    
                    return true;
                }
                else {
                    return false;
                }
    
                    
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
    
        public function recuperarSenha($recuperarSenha){
            try {
                $sql = "SELECT  USU_CPF, USU_EMAIL FROM `usuarios` WHERE USU_CPF=:cpf ";
    
                $stmt = $this->getConn()->prepare($sql);
                $usuario=$recuperarSenha->__get('USU_CPF');
                
                
                $stmt->bindParam(":cpf", $usuario);
               
                $stmt->execute();
    
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
                if ($result > 0) {
                    
                     setHash($recuperarSenha->__get('USU_CPF'));
                    return $recuperarSenha;
                }
                else {
                    return null;
                }
    
                    
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
    
            
        }
        
    }

   