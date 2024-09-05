<?php

namespace App\DAO;

use App\DAO;
use App\Model\PessoaModel;

    class PessoaDAO extends DAO {

        public function adicionarPessoa($pessoa){

            
            $nome = $pessoa->__get("PES_NOME");
            $email = $pessoa->__get("PES_EMAIL");
            $telefone = $pessoa->__get("PES_TELEFONE");
            $sql = "INSERT INTO pessoa(            
                                                    PES_NOME,
                                                    PES_EMAIL,
                                                    PES_TELEFONE
                                                ) VALUES (
                                                    
                                                    :pes_PES_NOME,
                                                    :pes_PES_EMAIL,
                                                    :pes_PES_TELEFONE
                                                )";
            
            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(':pes_PES_NOME',$nome);
            $stmt->bindParam(':pes_PES_EMAIL',$email);
            $stmt->bindParam(':pes_PES_TELEFONE',$telefone);

            $stmt->execute();                   

        }

        public function inserir($pessoa){

        }
        public function alterar($pessoa){
            try {
                $sql = "UPDATE pessoa SET PES_NOME=:nome, PES_EMAIL=:email, PES_TELEFONE=:telefone WHERE PES_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $pessoa->__get('PES_ID'));
                $stmt->bindParam(':nome', $pessoa->__get('PES_NOME'));
                $stmt->bindParam(':email', $pessoa->__get('PES_EMAIL'));            
                $stmt->bindParam(':telefone', $pessoa->__get('PES_TELEFONE'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function excluir($id){
            try {
                $sql = "delete from pessoa where PES_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        public function buscarPorID($id){
            try {
                $sql = "SELECT * FROM pessoa WHERE PES_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $pessoa = new PessoaModel();
                    $pessoa->__set('PES_ID', $result['PES_ID']);
                    $pessoa->__set('PES_NOME', $result['PES_NOME']);
                    $pessoa->__set('PES_EMAIL', $result['PES_EMAIL']);
                    $pessoa->__set('PES_TELEFONE', $result['PES_TELEFONE']); //retorna todos os campos relacionados ao ID selecionado
                    

                    return $pessoa;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function listar(){
            try {
                $pessoas = array();
                $sql = "SELECT * FROM PESSOA ORDER BY PES_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $pessoa = new PessoaModel();
                    $pessoa->__set('PES_ID', $row['PES_ID']);
                    $pessoa->__set('PES_NOME', $row['PES_NOME']);
                    $pessoa->__set('PES_EMAIL', $row['PES_EMAIL']);
                    $pessoa->__set('PES_TELEFONE', $row['PES_TELEFONE']);

                    array_push($pessoas, $pessoa); //Inserindo os dados persistidos da tabela em um array
                }

                return $pessoas; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
    }

    
