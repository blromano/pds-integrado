<?php

namespace App\DAO;

use App\DAO;
use App\Model\SetorModel;

    class SetorDAO extends DAO {

        public function inserir($setor){

            
            $nome = $setor->__get("SET_NOME");
            $data_criacao = $setor->__get("SET_DATA_CRIACAO");
            $descricao_servicos = $setor->__get("SET_DESCRICAO_SERVICOS");
            $sql = "INSERT INTO setores(            
                                                    SET_NOME,
                                                    SET_DATA_CRIACAO,
                                                    SET_DESCRICAO_SERVICOS
                                                ) VALUES (
                                                    
                                                    :set_SET_NOME,
                                                    :set_SET_DATA_CRIACAO,
                                                    :set_SET_DESCRICAO_SERVICOS
                                                )";
            
            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(':set_SET_NOME',$nome);
            $stmt->bindParam(':set_SET_DATA_CRIACAO',$data_criacao);
            $stmt->bindParam(':set_SET_DESCRICAO_SERVICOS',$descricao_servicos);

            $stmt->execute();                   

        }

        public function alterar($setor){
            try {
                $sql = "UPDATE setores SET SET_NOME=:nome, SET_DATA_CRIACAO=:data_criacao, SET_DESCRICAO_SERVICOS=:descricao_servicos WHERE SET_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $setor->__get('SET_ID'));
                $stmt->bindParam(':nome', $setor->__get('SET_NOME'));
                $stmt->bindParam(':data_criacao', $setor->__get('SET_DATA_CRIACAO'));            
                $stmt->bindParam(':descricao_servicos', $setor->__get('SET_DESCRICAO_SERVICOS'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        // public function excluir($id){
        //     try {
        //         // $sql = "DELETE * FROM setores WHERE SET_ID=:id";
        //         $sql = "delete from setores where SET_ID=:id";

        //         $stmt = $this->getConn()->prepare($sql);
                
        //         $stmt->bindParam(":id", $id);
        //         $stmt->execute();
        //     } catch (\PDOException $ex) {
        //         header('Location: /error102');
        //         die();
        //     }
        // }

        public function buscarPorID($id){
            try {
                $sql = "SELECT * FROM setores WHERE SET_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $setor = new SetorModel();
                    $setor->__set('SET_ID', $result['SET_ID']);
                    $setor->__set('SET_NOME', $result['SET_NOME']);
                    $setor->__set('SET_DATA_CRIACAO', $result['SET_DATA_CRIACAO']);
                    $setor->__set('SET_DESCRICAO_SERVICOS', $result['SET_DESCRICAO_SERVICOS']); //retorna todos os campos relacionados ao ID selecionado
                    

                    return $setor;
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
                $setores = array();
                $sql = "SELECT * FROM setores ORDER BY SET_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $setor = new SetorModel();
                    $setor->__set('SET_ID', $row['SET_ID']);
                    $setor->__set('SET_NOME', $row['SET_NOME']);
                    $setor->__set('SET_DATA_CRIACAO', $row['SET_DATA_CRIACAO']);
                    $setor->__set('SET_DESCRICAO_SERVICOS', $row['SET_DESCRICAO_SERVICOS']);

                    array_push($setores, $setor); //Inserindo os dados persistidos da tabela em um array
                }

                return $setores; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function gerarRelatorioSetor($setor, $dataInicial, $dataFinal){
            try {
                $setores = array();
                $sql = "SELECT * FROM setor WHERE SET_ID=:setor";
                
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":setor", $setor);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $setor = new SetorModel();
                    $setor->__set('SET_ID', $row['SET_ID']);
                    $setor->__set('SET_NOME', $row['SET_NOME']);

                    array_push($setores, $setor); //Inserindo os dados persistidos da tabela em um array
                }

                return $setores; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

    public function excluir($id)
    {
        try {
            // Exclua gestores associados a este setor antes de excluir o setor
            $this->excluirGestoresDoSetor($id);

            $sql = "DELETE FROM setores WHERE SET_ID=:id";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            exit();
        }
    }

    // Método para excluir gestores associados a um setor específico
    public function excluirGestoresDoSetor($setorId)
    {
        $sql = "DELETE FROM gestores WHERE FK_SETORES_SET_ID=:setorId";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindParam(":setorId", $setorId);
        $stmt->execute();
    }


    }

    
