<?php

namespace App\DAO;

use App\DAO;
use App\Model\RemediosModel;
    
    class RemediosDAO extends DAO{

        //Listando todos os dados da tabela pacientes em ordem crescente de PAC_ID
        public function listar(){
            try {
                $remedios = array();
                //$sql = "SELECT * FROM remedios ORDER BY REM_ID ASC ";

                $sql = "SELECT rem.REM_CONTRAINDICACAO, rem.REM_ID, rem.REM_DOSAGEM, rem.REM_INDICACAO, rem.REM_NOME, rem.REM_OBSERVACOES, trem.TIP_NOME FROM remedios as rem 
                            INNER JOIN tipos_remedios as trem on (trem.TIP_ID = rem.FK_TIPOS_REMEDIOS_TIP_ID)
                            ORDER BY REM_ID ASC";
                            

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $remedio = new RemediosModel();     
                    $remedio->__set('REM_ID', $row['REM_ID']);          
                    $remedio->__set('REM_NOME', $row['REM_NOME']);
                    $remedio->__set('REM_DOSAGEM', $row['REM_DOSAGEM']);
                    $remedio->__set('REM_CONTRAINDICACAO', $row['REM_CONTRAINDICACAO']);
                    $remedio->__set('REM_INDICACAO', $row['REM_INDICACAO']);
                    $remedio->__set('REM_OBSERVACOES', $row['REM_OBSERVACOES']);
                    $remedio->__set('TIP_NOME', $row['TIP_NOME']);

                    array_push($remedios, $remedio); //Inserindo os dados persistidos da tabela em um array
                }

                return $remedios; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($remedio){
            try {
        
                $sql = "UPDATE remedios SET 
                REM_NOME=:nome,  
                REM_DOSAGEM=:dosagem,
                REM_CONTRAINDICACAO=:contraindicacao, 
                REM_INDICACAO=:indicacao, 
                REM_OBSERVACOES=:observacoes,
                FK_TIPOS_REMEDIOS_TIP_ID=:tipo 
                WHERE REM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $remedio->__get('REM_ID'));
                $stmt->bindParam(':nome', $remedio->__get('REM_NOME'));
                $stmt->bindParam(':dosagem', $remedio->__get('REM_DOSAGEM'));            
                $stmt->bindParam(':contraindicacao', $remedio->__get('REM_CONTRAINDICACAO'));
                $stmt->bindParam(':indicacao', $remedio->__get('REM_INDICACAO'));
                $stmt->bindParam(':observacoes', $remedio->__get('REM_OBSERVACOES'));
                $stmt->bindParam(':tipo', $remedio->__get('FK_TIPOS_REMEDIOS_TIP_ID'));

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
                $sql = "delete from remedios where REM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }
       

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($remedio){
            try {
                $sql = "insert into remedios (
                REM_NOME,
                REM_DOSAGEM, 
                REM_CONTRAINDICACAO, 
                REM_INDICACAO, 
                REM_OBSERVACOES, 
                FK_TIPOS_REMEDIOS_TIP_ID 
                ) 
                values (
                :nome,
                :dosagem, 
                :contraindicacao, 
                :indicacao, 
                :observacoes, 
                :tipo
                )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':nome', $remedio->__get('REM_NOME'));
                $stmt->bindParam(':dosagem', $remedio->__get('REM_DOSAGEM'));            
                $stmt->bindParam(':contraindicacao', $remedio->__get('REM_CONTRAINDICACAO'));
                $stmt->bindParam(':indicacao', $remedio->__get('REM_INDICACAO'));
                $stmt->bindParam(':observacoes', $remedio->__get('REM_OBSERVACOES'));
                $stmt->bindParam(':tipo', $remedio->__get('FK_TIPOS_REMEDIOS_TIP_ID'));
                $stmt->execute();

            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

      
        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM remedios WHERE REM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $remedio = new RemediosModel();


                    $remedio->__set('REM_ID', $result['REM_ID']);
                    $remedio->__set('REM_NOME', $result['REM_NOME']);
                    $remedio->__set('REM_DOSAGEM', $result['REM_DOSAGEM']);
                    $remedio->__set('REM_CONTRAINDICACAO', $result['REM_CONTRAINDICACAO']);
                    $remedio->__set('REM_INDICACAO', $result['REM_INDICACAO']);
                    $remedio->__set('REM_OBSERVACOES', $result['REM_OBSERVACOES']);
                    $remedio->__set('FK_TIPOS_REMEDIOS_TIP_ID', $result['FK_TIPOS_REMEDIOS_TIP_ID']);

                    return $remedio;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }