<?php

namespace App\DAO;

    use App\DAO;
    use App\Model\Duvidas_FeedbacksModel;

        class Duvidas_FeedbacksDAO extends DAO {

            public function inserir($duvidas_feedbacks){

                $descricao = $duvidas_feedbacks->__get("DEF_DESCRICAO");
                $urgencia = $duvidas_feedbacks->__get("DEF_URGENCIA");
                $tema = $duvidas_feedbacks->__get("DEF_TEMA");
                $status = $duvidas_feedbacks->__get("DEF_STATUS");
                $anexo = $duvidas_feedbacks->__get("DEF_ANEXO");
                $cidadaos_usu_id = $duvidas_feedbacks->__get("FK_CIDADAOS_USU_ID");
                $setores_set_id = $duvidas_feedbacks->__get("FK_SETORES_SET_ID");


                $sql = "INSERT INTO DUVIDAS_FEEDBACKS(            
                                                        DEF_DESCRICAO,
                                                        DEF_URGENCIA,
                                                        DEF_TEMA,
                                                        DEF_STATUS,
                                                        DEF_DATA_HORA,
                                                        DEF_ANEXO,
                                                        FK_CIDADAOS_USU_ID,
                                                        FK_SETORES_SET_ID

                                                        ) VALUES (
                                                                                            
                                                        :def_DEF_DESCRICAO,
                                                        :def_DEF_URGENCIA,
                                                        :def_DEF_TEMA,
                                                        :def_DEF_STATUS,
                                                        NOW(),
                                                        :def_DEF_ANEXO,
                                                        :def_FK_CIDADAOS_USU_ID,
                                                        :def_FK_SETORES_SET_ID
                )";


                $stmt = $this->getConn()->prepare($sql);
                

                $stmt->bindParam(':def_DEF_DESCRICAO', $descricao); 
                $stmt->bindParam(':def_DEF_URGENCIA', $urgencia);
                $stmt->bindParam(':def_DEF_TEMA', $tema); 
                $stmt->bindParam(':def_DEF_STATUS', $status); 
                $stmt->bindParam(':def_DEF_ANEXO', $anexo); 
                $stmt->bindParam(':def_FK_CIDADAOS_USU_ID', $cidadaos_usu_id); 
                $stmt->bindParam(':def_FK_SETORES_SET_ID', $setores_set_id); 

     
                $stmt->execute();                   

            }


            public function alterar($duvida_feedback){
                try {
                    $sql = "UPDATE duvidas_feedbacks SET DEF_DESCRICAO=:descricao, DEF_URGENCIA=:urgencia, DEF_TEMA=:tema, DEF_STATUS=:statuss, 
                    DEF_DATA_HORA=:data_hora /*DEF_ANEXO=:anexo*/ WHERE DEF_ID=:id";

                    $descricao = "bnbb";/*$duvida_feedback->__get('DEF_DESCRICAO');*/
                    $urgencia = $duvida_feedback->__get('DEF_URGENCIA');
                    $tema = $duvida_feedback->__get('DEF_TEMA');
                    $status = $duvida_feedback->__get('DEF_STATUS');
                    $data_hora = $duvida_feedback->__get('DEF_DATA_HORA');
                    $id = $duvida_feedback->__get('DEF_ID');

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(':descricao', $descricao);
                    $stmt->bindParam(':urgencia', $urgencia);
                    $stmt->bindParam(':tema', $tema);
                    $stmt->bindParam(':statuss', $status);            
                    $stmt->bindParam(':data_hora', $data_hora);
                    $stmt->bindParam(':id', $id);
                    //$stmt->bindParam(':anexo', $duvida_feedback->__get('DEF_ANEXO'));



                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location: /error101');
                    die();
                }
            }

            public function alterarrespondido($id){
                try {
                    $sql = "UPDATE duvidas_feedbacks SET DEF_STATUS=:statuss
                    WHERE DEF_ID=:id";

                    $status = 1;

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(':statuss', $status);            
                    $stmt->bindParam(':id', $id);
                    //$stmt->bindParam(':anexo', $duvida_feedback->__get('DEF_ANEXO'));



                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location: /error101');
                    die();
                }
            }


            public function excluir($id){
                try {
                    $sql = "delete from duvidas_feedbacks where DEF_ID=:id";

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
                    $sql = "SELECT * FROM DUVIDAS_FEEDBACKS WHERE DEF_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(":id", $id);
                    $stmt->execute();

                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                    if ($result > 0) {
                        $duvida_feedback = new Duvidas_FeedbacksModel();
                        $duvida_feedback->__set('DEF_DESCRICAO', $result['DEF_DESCRICAO']);
                        $duvida_feedback->__set('DEF_URGENCIA', $result['DEF_URGENCIA']);
                        $duvida_feedback->__set('DEF_TEMA', $result['DEF_TEMA']);
                        $duvida_feedback->__set('DEF_STATUS', $result['DEF_STATUS']);
                        $duvida_feedback->__set('DEF_DATA_HORA', $result['DEF_DATA_HORA']);
                        $duvida_feedback->__set('DEF_ANEXO', $result['DEF_ANEXO']);//retorna todos os campos relacionados ao ID selecionado
                        
                        return $duvida_feedback;
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
                    $duvidas_feedbacks = array();
                    $sql = "SELECT * FROM DUVIDAS_FEEDBACKS ORDER BY DEF_ID ASC";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();

                    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                        $duvida_feedback = new Duvidas_FeedbacksModel();
                        $duvida_feedback->__set('DEF_DESCRICAO', $row['DEF_DESCRICAO']);
                        $duvida_feedback->__set('DEF_URGENCIA', $row['DEF_URGENCIA']);
                        $duvida_feedback->__set('DEF_TEMA', $row['DEF_TEMA']);
                        $duvida_feedback->__set('DEF_STATUS', $row['DEF_STATUS']);
                        $duvida_feedback->__set('DEF_DATA_HORA', $row['DEF_DATA_HORA']);
                        $duvida_feedback->__set('DEF_ID', $row['DEF_ID']);
                        $duvida_feedback->__set('DEF_ANEXO', $row['DEF_ANEXO']);
                        $duvida_feedback->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                        $duvida_feedback->__set('FK_SETORES_SET_ID', $row['FK_SETORES_SET_ID']);

                        array_push($duvidas_feedbacks, $duvida_feedback); //Inserindo os dados persistidos da tabela em um array
                    }

                    return $duvidas_feedbacks; //retornando o array para mostagem da view
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
                }
            }
        }

    
