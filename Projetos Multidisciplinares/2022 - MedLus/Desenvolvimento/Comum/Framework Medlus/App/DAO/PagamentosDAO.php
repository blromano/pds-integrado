<?php

namespace App\DAO;

use App\DAO;
use App\Model\PagamentosModel;
    
    class PagamentosDAO extends DAO{

        //Listando todos os dados da tabela pacientes em ordem crescente de PAC_ID
        public function listar(){
            try {
                $pagamentos = array();
                $sql = "SELECT * FROM pagamentos ORDER BY PAG_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $pagamento = new PagamentosModel();
                    $pagamento->__set('PAG_ID', $row['PAG_ID']);
                    $pagamento->__set('PAG_DATAPAGAMENTO', $row['PAG_DATAPAGAMENTO']);
                    $pagamento->__set('PAG_VALORPAGAMENTO', $row['PAG_VALORPAGAMENTO']);
                    $pagamento->__set('PAG_DATAVENCIMENTO', $row['PAG_DATAVENCIMENTO']);
                    $pagamento->__set('FK_PLANOS_PLA_ID', $row['FK_PLANOS_PLA_ID']);
                    $pagamento->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);

                    array_push($pagamentos, $pagamento); //Inserindo os dados persistidos da tabela em um array
                }

                return $pagamentos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($pagamento){
            try {
        
                $sql = "UPDATE pagamentos SET 
                PAG_DATAPAGAMENTO=:datapagamento,  
                PAG_VALORPAGAMENTO=:valorpagamento,
                PAG_DATAVENCIMENTO=:datavencimento, 
                FK_PLANOS_PLA_ID=:planos,
                FK_PACIENTES_PAC_ID=:pacientes 
                WHERE PAG_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $pagamento->__get('PAG_ID'));
                $stmt->bindParam(':datapagamento', $pagamento->__get('PAG_DATAPAGAMENTO'));
                $stmt->bindParam(':valorpagamento', $pagamento->__get('PAG_VALORPAGAMENTO'));            
                $stmt->bindParam(':datavencimento', $pagamento->__get('PAG_DATAVENCIMENTO'));
                $stmt->bindParam(':planos', $pagamento->__get('FK_PLANOS_PLA_ID'));
                $stmt->bindParam(':pacientes', $pagamento->__get('FK_PACIENTES_PAC_ID'));

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
                $sql = "delete from pagamentos where PAG_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }
       

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($pagamento){
            try {
                $sql = "insert into pagamentos (
                PAG_DATAPAGAMENTO,
                PAG_VALORPAGAMENTO,  
                PAG_DATAVENCIMENTO,
                FK_PLANOS_PLA_ID, 
                FK_PACIENTES_PAC_ID
                ) 
                values (
                :datapagamento,
                :valorpagamento,
                :datavencimento, 
                :planos, 
                :pacientes
                )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':datapagamento', $pagamento->__get('PAG_DATAPAGAMENTO'));
                $stmt->bindParam(':valorpagamento', $pagamento->__get('PAG_VALORPAGAMENTO'));
                $stmt->bindParam(':datavencimento', $pagamento->__get('PAG_DATAVENCIMENTO'));            
                $stmt->bindParam(':planos', $pagamento->__get('FK_PLANOS_PLA_ID'));
                $stmt->bindParam(':pacientes', $pagamento->__get('FK_PACIENTES_PAC_ID'));
                $stmt->execute();

            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

      
        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM pagamentos WHERE PAG_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $pagamento = new PagamentosModel();


                    $pagamento->__set('PAG_ID', $result['PAG_ID']);
                    $pagamento->__set('PAG_DATAPAGAMENTO', $result['PAG_DATAPAGAMENTO']);
                    $pagamento->__set('PAG_VALORPAGAMENTO', $result['PAG_VALORPAGAMENTO']);
                    $pagamento->__set('PAG_DATAVENCIMENTO', $result['PAG_DATAVENCIMENTO']);
                    $pagamento->__set('FK_PLANOS_PLA_ID', $result['FK_PLANOS_PLA_ID']);
                    $pagamento->__set('FK_PACIENTES_PAC_ID', $result['FK_PACIENTES_PAC_ID']);

                    return $pagamento;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }