<?php

namespace App\DAO;

use App\DAO;
use App\Model\PlanosMedicosModel;
    
    class PlanosMedicosDAO extends DAO{

        //Listando todos os dados da tabela pacientes em ordem crescente de OUV_ID
        public function listar(){
            try {
                $PlanosMedicos = array();
                $sql = "SELECT * FROM planos ORDER BY PLA_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $PlanosMedico = new PlanosMedicosModel();
                    $PlanosMedico->__set('PLA_ID', $row['PLA_ID']);
                    $PlanosMedico->__set('PLA_AGENCIA', $row['PLA_AGENCIA']);
                    $PlanosMedico->__set('PLA_CONTATO', $row['PLA_CONTATO']);
                    $PlanosMedico->__set('PLA_PRECO', $row['PLA_PRECO']);
                    $PlanosMedico->__set('PLA_QUANTIDADEEXAMES', $row['PLA_QUANTIDADEEXAMES']);
                    $PlanosMedico->__set('PLA_NOME', $row['PLA_NOME']);
                    $PlanosMedico->__set('PLA_QUANTIDADECONSULTAS', $row['PLA_QUANTIDADECONSULTAS']);

                    array_push($PlanosMedicos, $PlanosMedico); //Inserindo os dados persistidos da tabela em um array
                }

                return $PlanosMedicos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }



        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($PlanosMedico){
            try {
                $sql = "UPDATE planos 
                SET PLA_AGENCIA=:agencia,
                PLA_CONTATO=:contato, 
                PLA_PRECO=:preco,
                PLA_QUANTIDADEEXAMES=:qtdexames,
                PLA_NOME=:nome, 
                PLA_QUANTIDADECONSULTAS=:qtdconsultas
                WHERE
                PLA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $PlanosMedico->__get('PLA_ID'));
                $stmt->bindParam(':agencia', $PlanosMedico->__get('PLA_AGENCIA'));
                $stmt->bindParam(':contato', $PlanosMedico->__get('PLA_CONTATO'));
                $stmt->bindParam(':preco', $PlanosMedico->__get('PLA_PRECO'));
                $stmt->bindParam(':qtdexames', $PlanosMedico->__get('PLA_QUANTIDADEEXAMES'));
                $stmt->bindParam(':nome', $PlanosMedico->__get('PLA_NOME'));
                $stmt->bindParam(':qtdconsultas', $PlanosMedico->__get('PLA_QUANTIDADECONSULTAS'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function atualizaLista ($PlanosMedico){
            try {
                $sql = "UPDATE planos 
                SET PLA_ID=:id, 
                PLA_AGENCIA=:agencia,
                PLA_CONTATO=:contato, 
                PLA_PRECO=:preco
                PLA_QUANTIDADEEXAMES=:qtdexames,
                PLA_NOME=:nome, 
                PLA_QUANTIDADECONSULTAS=:qtdconsultas
                WHERE
                PLA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $PlanosMedico->__get('PLA_ID'));
                $stmt->bindParam(':agencia', $PlanosMedico->__get('PLA_AGENCIA'));
                $stmt->bindParam(':contato', $PlanosMedico->__get('PLA_CONTATO'));
                $stmt->bindParam(':preco', $PlanosMedico->__get('PLA_PRECO'));
                $stmt->bindParam(':qtdexames', $PlanosMedico->__get('PLA_QUANTIDADEEXAMES'));
                $stmt->bindParam(':nome', $PlanosMedico->__get('PLA_NOME'));
                $stmt->bindParam(':qtdconsultas', $PlanosMedico->__get('PLA_QUANTIDADECONSULTAS'));

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
                $sql = "delete from planos where PLA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }


        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($PlanosMedico){
            try {
                $sql = "insert into planos (
                PLA_AGENCIA, 
                PLA_CONTATO,
                PLA_PRECO,
                PLA_QUANTIDADEEXAMES,
                PLA_NOME,
                PLA_QUANTIDADECONSULTAS
                ) 
                values (
                :agencia, 
                :contato,
                :preco,
                :qtdexames, 
                :nome,
                :qtdconsultas
                )";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':agencia', $PlanosMedico->__get('PLA_AGENCIA'));
                $stmt->bindParam(':contato', $PlanosMedico->__get('PLA_CONTATO'));
                $stmt->bindParam(':preco', $PlanosMedico->__get('PLA_PRECO'));
                $stmt->bindParam(':qtdexames', $PlanosMedico->__get('PLA_QUANTIDADEEXAMES'));
                $stmt->bindParam(':nome', $PlanosMedico->__get('PLA_NOME'));
                $stmt->bindParam(':qtdconsultas', $PlanosMedico->__get('PLA_QUANTIDADECONSULTAS'));
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM planos WHERE PLA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $PlanosMedico = new PlanosMedicosModel();

                    $PlanosMedico->__set('PLA_ID', $result['PLA_ID']);
                    $PlanosMedico->__set('PLA_AGENCIA', $result['PLA_AGENCIA']);
                    $PlanosMedico->__set('PLA_CONTATO', $result['PLA_CONTATO']);
                    $PlanosMedico->__set('PLA_PRECO', $result['PLA_PRECO']);
                    $PlanosMedico->__set('PLA_QUANTIDADEEXAMES', $result['PLA_QUANTIDADEEXAMES']);
                    $PlanosMedico->__set('PLA_NOME', $result['PLA_NOME']);
                    $PlanosMedico->__set('PLA_QUANTIDADECONSULTAS', $result['PLA_QUANTIDADECONSULTAS']);      

                    return $PlanosMedico;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }