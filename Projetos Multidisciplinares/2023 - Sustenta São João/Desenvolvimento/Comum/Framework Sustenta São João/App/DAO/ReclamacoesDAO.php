<?php
    
    namespace App\DAO;

    use App\DAO;
    use App\Model\ReclamacoesModel;

    class ReclamacoesDAO extends DAO{

        public function inserir($reclamacao){
            $tit = $reclamacao->__get("REC_TITULO_RECLAMACAO");
            $descr = $reclamacao->__get("REC_DESCRICAO");
            $setr = $reclamacao->__get("FK_SETORES_SET_ID");
            $cid = $reclamacao->__get("FK_CIDADAOS_USU_ID");
            $ane = $reclamacao->__get("REC_ANEXO");
            

            $sql = " INSERT INTO reclamacoes(
                                REC_TITULO_RECLAMACAO, 
                                REC_DESCRICAO,
                                REC_DATAHORA,
                                FK_SETORES_SET_ID,
                                FK_CIDADAOS_USU_ID,
                                REC_ANEXO,
                                REC_STATUS
                                ) VALUES (
                                    :rec_REC_TITULO_RECLAMACAO,
                                    :rec_REC_DESCRICAO,
                                    NOW(),
                                    :rec_FK_SETORES_SET_ID,
                                    :rec_FK_CIDADAOS_USU_ID,
                                    :rec_REC_ANEXO,
                                    'P'
                                )";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':rec_REC_TITULO_RECLAMACAO', $tit);
            $stmt->bindParam(':rec_REC_DESCRICAO', $descr);
            $stmt->bindParam(':rec_FK_SETORES_SET_ID', $setr);
            $stmt->bindParam(':rec_FK_CIDADAOS_USU_ID', $cid);
            $stmt->bindParam(':rec_REC_ANEXO', $ane);
            $stmt->execute();
            }

            public function inserirResposta($reclamacao){
                // $recRES = $reclamacao->__get("REC_RESPOSTA_RECLAMACAO");
                try{
                    $sql = "UPDATE reclamacoes
                        SET REC_RESPOSTA_RECLAMACAO=:recRES
                        WHERE REC_ID=:id";
    
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':id', $reclamacao->__get('REC_ID'));
                $stmt->bindParam(':recRES', $reclamacao->__get('REC_RESPOSTA_RECLAMACAO'));
                $stmt->execute();
                } catch (\PDOException $ex) {
                    echo ''. $ex->getMessage();
                    die();
                }
                //     $sql = "INSERT INTO reclamacoes(
                //         REC_RESPOSTA_RECLAMACAO)
                //         VALUES (
                //             :rec_REC_RESPOSTA_RECLAMACAO
                //         )";
                // $stmt = $this->getConn()->prepare($sql);
                // $stmt->bindParam(':rec_REC_RESPOSTA_RECLAMACAO', $recRES);
                // $stmt->execute();
                
                    
            }

        public function alterar($reclamacao){
            /*
            echo("ID = " . $reclamacao->__get('REC_ID'));
            echo("REC_TITULO_RECLAMACAO = " . $reclamacao->__get('REC_TITULO_RECLAMACAO'));
            echo("REC_DESCRICAO = " . $reclamacao->__get('REC_DESCRICAO'));
            echo("REC_ANEXO = " . $reclamacao->__get('REC_ANEXO'));
            echo("FK_SETORES_SET_ID = " . $reclamacao->__get('FK_SETORES_SET_ID'));

            exit();
            */
            

            try {
                $sql = "UPDATE reclamacoes 
                        SET 
                            REC_TITULO_RECLAMACAO=:tit, 
                            REC_DESCRICAO=:descr, 
                            REC_ANEXO=:ane, 
                            FK_SETORES_SET_ID=:setr 
                        WHERE 
                            REC_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                

                $stmt->bindParam(':id', $reclamacao->__get('REC_ID'));
                $stmt->bindParam(':tit', $reclamacao->__get('REC_TITULO_RECLAMACAO'));          
                $stmt->bindParam(':descr', $reclamacao->__get('REC_DESCRICAO'));            
                $stmt->bindParam(':ane', $reclamacao->__get('REC_ANEXO'));
                $stmt->bindParam(':setr', $reclamacao->__get('FK_SETORES_SET_ID'));
                
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }
        /*
        public function avaliar($reclamacao){

            try {
                $sql = "UPDATE reclamacoes SET REC_NOTA_AVALIACAO = :rec_REC_NOTA_AVALIACAO WHERE REC_ID=:rec_REC_ID";
                $stmt = $this->getConn()->prepare($sql);

            $id= $reclamacao->__get('REC_ID');
            $avaliacao=$reclamacao->__get('PCO_AVALIACAO');
            $stmt->bindParam(':rec_REC_ID', $id);
            $stmt->bindParam(':rec_REC_NOTA_AVALIACAO', $avaliacao);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
        */
        public function listar(){
            try {
                $reclamacoes = array();
                $sql = 
                "SELECT reclamacoes.*, cidadaos.USU_NOME
                FROM reclamacoes 
                INNER JOIN cidadaos ON reclamacoes.FK_CIDADAOS_USU_ID = cidadaos.USU_ID
                ORDER BY REC_ID ASC ";
                // SELECT * FROM RECLAMACOES ORDER BY REC_ID ASC

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $reclamacao = new ReclamacoesModel();
                    $reclamacao->__set('REC_ID', $row['REC_ID']);
                    $reclamacao->__set('REC_TITULO_RECLAMACAO', $row['REC_TITULO_RECLAMACAO']);
                    $reclamacao->__set('REC_NOTA_AVALIACAO', $row['REC_NOTA_AVALIACAO']);
                    $reclamacao->__set('REC_STATUS', $row['REC_STATUS']);
                    $reclamacao->__set('REC_DESCRICAO', $row['REC_DESCRICAO']);
                    $reclamacao->__set('REC_DATAHORA', $row['REC_DATAHORA']);
                    $reclamacao->__set('REC_ANEXO', $row['REC_ANEXO']);
                    $reclamacao->__set('REC_RESPOSTA_RECLAMACAO', $row['REC_RESPOSTA_RECLAMACAO']);
                    $reclamacao->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                    $reclamacao->__set('FK_SETORES_SET_ID', $row['FK_SETORES_SET_ID']);
                    $reclamacao->__set('FK_GESTORES_USU_ID', $row['FK_GESTORES_USU_ID']);

                    array_push($reclamacoes, $reclamacao); 
                }
                return $reclamacoes;

            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function mediaAvaliacao(){
            
        }

        public function excluir($id)
        {
            try {
                $sql = "delete from reclamacoes where REC_ID=:id";

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
                /*$sql = "SELECT RECLAMACOES.*, CIDADAOS.USU_NOME
                FROM RECLAMACOES
                INNER JOIN CIDADAOS ON RECLAMACOES.FK_CIDADAOS_USU_ID = CIDADAOS.USU_ID
                WHERE RECLAMACOES.REC_ID = :id"; */
                $sql = "SELECT r.*, c.* from reclamacoes r, cidadaos c WHERE r.FK_CIDADAOS_USU_ID = c.USU_ID AND r.REC_ID = :id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $reclamacao = new ReclamacoesModel();
                    $reclamacao->__set('REC_ID', $result['REC_ID']);
                    $reclamacao->__set('REC_TITULO_RECLAMACAO', $result['REC_TITULO_RECLAMACAO']);
                    $reclamacao->__set('REC_NOTA_AVALIACAO', $result['REC_NOTA_AVALIACAO']);
                    $reclamacao->__set('REC_STATUS', $result['REC_STATUS']); //retorna todos os campos relacionados ao ID selecionado
                    $reclamacao->__set('REC_DESCRICAO', $result['REC_DESCRICAO']);
                    $reclamacao->__set('REC_DATAHORA', $result['REC_DATAHORA']);
                    $reclamacao->__set('REC_ANEXO', $result['REC_ANEXO']);                    
                    $reclamacao->__set('REC_RESPOSTA_RECLAMACAO', $result['REC_RESPOSTA_RECLAMACAO']);                    
                    $reclamacao->__set('FK_CIDADAOS_USU_ID', $result['FK_CIDADAOS_USU_ID']);                    
                    $reclamacao->__set('FK_SETORES_SET_ID', $result['FK_SETORES_SET_ID']);                    
                    $reclamacao->__set('FK_GESTORES_USU_ID', $result['FK_GESTORES_USU_ID']);     
                    $reclamacao->__set('USU_NOME', $result['USU_NOME']);               
                    return $reclamacao;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
    }

?>