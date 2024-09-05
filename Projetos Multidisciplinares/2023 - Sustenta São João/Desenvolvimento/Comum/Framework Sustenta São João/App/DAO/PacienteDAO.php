<?php

namespace App\DAO;

use App\DAO;
use App\Model\PacienteModel;
    
    class PacienteDAO extends DAO{


        //Método para adicionar um Paciente na tabelam pacientes
        public function adicionarPaciente($paciente) {

            $pront = $paciente->getPAC_PRONTUARIO();
            $usu = $paciente->getFK_USUARIOS_USU_ID();
            $pla = $paciente->getFK_PLANOS_PLA_ID();
            
            $this->sql = "INSERT INTO $this->tabela (

                    PAC_PRONTUARIO, 
                    FK_USUARIOS_USU_ID,
                    FK_PLANOS_PLA_ID 
                                        
            ) VALUES (
                :pac_prontuario,
                :fk_usuarios_usu_id,
                :fk_planos_pla_id
            )";
            $this->resultado = $this->conexao->prepare($this->sql);

            

            $this->resultado->bindParam(':pac_prontuario', $pront);
            $this->resultado->bindParam(':fk_usuarios_usu_id', $usu);
            $this->resultado->bindParam(':fk_planos_pla_id', $pla);
        
            $this->resultado->execute();

        }

        //Listando todos os dados da tabela pacientes em ordem crescente de PAC_ID
        public function listar(){
            try {
                $pacientes = array();
                $sql = "SELECT * FROM pacientes ORDER BY PAC_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $paciente = new PacienteModel();
                    $paciente->__set('PAC_ID', $row['PAC_ID']);
                    $paciente->__set('PAC_PRONTUARIO', $row['PAC_PRONTUARIO']);
                    $paciente->__set('FK_USUARIOS_USU_ID', $row['FK_USUARIOS_USU_ID']);
                    $paciente->__set('FK_PLANOS_PLA_ID', $row['FK_PLANOS_PLA_ID']);

                    array_push($pacientes, $paciente); //Inserindo os dados persistidos da tabela em um array
                }

                return $pacientes; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($paciente){
            try {
                $sql = "UPDATE pacientes SET PAC_PRONTUARIO=:prontuario, FK_USUARIOS_USU_ID=:usuarios, FK_PLANOS_PLA_ID=:planos WHERE PAC_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $paciente->__get('PAC_ID'));
                $stmt->bindParam(':prontuario', $paciente->__get('PAC_PRONTUARIO'));
                $stmt->bindParam(':usuarios', $paciente->__get('FK_USUARIOS_USU_ID'));            
                $stmt->bindParam(':planos', $paciente->__get('FK_PLANOS_PLA_ID'));

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
                $sql = "delete from pacientes where PAC_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($paciente){
            try {
                $sql = "insert into pacientes (PAC_PRONTUARIO, FK_USUARIOS_USU_ID, FK_PLANOS_PLA_ID) values (:prontuario,:usuario, :plano)";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':prontuario',  $paciente->__get('PAC_PRONTUARIO'));
                $stmt->bindParam(':usuario', $paciente->__get('FK_USUARIOS_USU_ID'));
                $stmt->bindParam(':plano', $paciente->__get('FK_PLANOS_PLA_ID'));
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM pacientes WHERE PAC_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $paciente = new PacienteModel();
                    $paciente->__set('PAC_ID', $result['PAC_ID']);
                    $paciente->__set('PAC_PRONTUARIO', $result['PAC_PRONTUARIO']);
                    $paciente->__set('FK_USUARIOS_USU_ID', $result['FK_USUARIOS_USU_ID']);
                    $paciente->__set('FK_PLANOS_PLA_ID', $result['FK_PLANOS_PLA_ID']); //retorna todos os campos relacionados ao ID selecionado
                    

                    return $paciente;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }