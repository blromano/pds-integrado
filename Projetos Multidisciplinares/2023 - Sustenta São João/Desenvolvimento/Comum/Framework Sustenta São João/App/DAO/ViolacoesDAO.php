<?php

namespace App\DAO;

use App\DAO;
use App\Model\ViolacoesModel;

    class ViolacoesDAO extends DAO {

        public function listar(){
            try {
                $violacoes = array();
               // $sql = "SELECT * FROM violacoes ORDER BY VIO_ID ASC";
               $sql = "SELECT 
                            V.VIO_ID AS ID,
                            V.VIO_DESCRICAO AS DESCRICAO_VIOLACAO,
                            V.FK_DENUNCIAS_DEN_ID,
                            D.FK_CIDADAOS_USU_ID,
                            C.USU_NOME AS NOME_CIDADAO,
                            D.DEN_TITULO AS TITULO_DENUNCIA,
                            D.DEN_DESCRICAO AS DESCRICAO_DENUNCIA,
                            D.DEN_FOTO_VIDEO AS FOTO_VIDEO_DENUNCIA
                        FROM 
                            VIOLACOES V,
                            DENUNCIAS D,
                            CIDADAOS C
                        WHERE
                            V.FK_DENUNCIAS_DEN_ID = D.DEN_ID AND
                            C.USU_ID = D.FK_CIDADAOS_USU_ID";
  
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $violacao = new ViolacoesModel();
                    $violacao->__set('VIO_ID', $row['ID']);
                    $violacao->__set('DEN_TITULO', $row['TITULO_DENUNCIA']);
                    $violacao->__set('DEN_DESCRICAO', $row['DESCRICAO_DENUNCIA']);
                    $violacao->__set('USU_NOME', $row['NOME_CIDADAO']);
                    $violacao->__set('VIO_DESCRICAO', $row['DESCRICAO_VIOLACAO']);
                    $violacao->__set('VIO_IMAGEM', $row['FOTO_VIDEO_DENUNCIA']);
                    array_push($violacoes, $violacao); //Inserindo os dados persistidos da tabela em um array
                }

                return $violacoes; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        // public function inserir($setor){

            
        //     $nome = $setor->__get("SET_NOME");
        //     $data_criacao = $setor->__get("SET_DATA_CRIACAO");
        //     $descricao_servicos = $setor->__get("SET_DESCRICAO_SERVICOS");
        //     $sql = "INSERT INTO setores(            
        //                                             SET_NOME,
        //                                             SET_DATA_CRIACAO,
        //                                             SET_DESCRICAO_SERVICOS
        //                                         ) VALUES (
                                                    
        //                                             :set_SET_NOME,
        //                                             :set_SET_DATA_CRIACAO,
        //                                             :set_SET_DESCRICAO_SERVICOS
        //                                         )";
            
        //     $stmt = $this->getConn()->prepare($sql);
            
        //     $stmt->bindParam(':set_SET_NOME',$nome);
        //     $stmt->bindParam(':set_SET_DATA_CRIACAO',$data_criacao);
        //     $stmt->bindParam(':set_SET_DESCRICAO_SERVICOS',$descricao_servicos);

        //     $stmt->execute();                   

        // }

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

        public function excluir($id){
            try {
                // $sql = "DELETE * FROM setores WHERE SET_ID=:id";
                $sql = "delete from violacoes where VIO_ID=:id";

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
                $sql = "SELECT * FROM setores WHERE SET_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $setor = new ViolacoesModel();
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

        public function inserir($punicao){

            
            $nome = $nome->__get("SET_NOME");
            $tempo = $punicao->__get("PUN_TEMPO");
            $justificativa = $punicao->__get("PUN_JUSTIFICATIVA");
            $motivo = $punicao->__get("PUN_MOTIVO");
            $sql = "INSERT INTO punicoes (            
                                                    SET_NOME,
                                                    PUN_TEMPO,
                                                    PUN_JUSTIFICATIVA,
                                                    PUN_MOTIVO
                                                ) VALUES (
                                                    
                                                    :set_SET_NOME,
                                                    :pun_PUN_TEMPO,
                                                    :pun_PUN_JUSTIFICATIVA,
                                                    :pun_PUN_MOTIVO
                                                    
                                                )";
            
            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(':set_SET_NOME',$nome);
            $stmt->bindParam(':pun_PUN_TEMPO',$tempo);
            $stmt->bindParam(':pun_PUN_JUSTIFICATIVA',$justificativa);
            $stmt->bindParam(':pun_PUN_MOTIVO',$motivo);

            $stmt->execute();                   

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
                    $setor = new ViolacoesModel();
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
    }


    
