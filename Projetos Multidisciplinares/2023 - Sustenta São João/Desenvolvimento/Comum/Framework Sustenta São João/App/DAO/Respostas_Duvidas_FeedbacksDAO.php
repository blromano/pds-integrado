<?php

namespace App\DAO;

    use App\DAO;
    use App\Model\Respostas_Duvidas_FeedbacksModel;

        class Respostas_Duvidas_FeedbacksDAO extends DAO {

            public function inserir($respostas_duvidas_feedbacks){

                $texto = $respostas_duvidas_feedbacks->__get("RES_TEXTO");
                //$id = $respostas_duvidas_feedbacks->__get("RES_ID");
                $anexo = $respostas_duvidas_feedbacks->__get("RES_ANEXO");
                //$data_hora = $respostas_duvidas_feedbacks->__get("RES_DATA_HORA");
                $duvidas_feedbacks_def_id = $respostas_duvidas_feedbacks->__get("FK_DUVIDAS_FEEDBACKS_DEF_ID");
                $gestores_usu_id = $respostas_duvidas_feedbacks->__get("FK_GESTORES_USU_ID");


                $sql = "INSERT INTO RESPOSTAS_DUVIDAS_FEEDBACKS(            
                                                                RES_TEXTO,
                                                                /*RES_ID,*/
                                                                RES_ANEXO,
                                                                RES_DATA_HORA,
                                                                FK_DUVIDAS_FEEDBACKS_DEF_ID,
                                                                FK_GESTORES_USU_ID

                                                                ) VALUES (
                                                                                                    
                                                                :res_RES_TEXTO,
                                                                /*:res_RES_ID,*/
                                                                :res_RES_ANEXO,
                                                                NOW(),
                                                                :res_FK_DUVIDAS_FEEDBACKS_DEF_ID,
                                                                :res_FK_GESTORES_USU_ID
                )";


                $stmt = $this->getConn()->prepare($sql);
                

                $stmt->bindParam(':res_RES_TEXTO', $texto); 
                /*$stmt->bindParam(':res_RES_ID', $id); */
                $stmt->bindParam(':res_RES_ANEXO', $anexo); 
                $stmt->bindParam(':res_FK_DUVIDAS_FEEDBACKS_DEF_ID', $duvidas_feedbacks_def_id); 
                $stmt->bindParam(':res_FK_GESTORES_USU_ID', $gestores_usu_id); 

     
                $stmt->execute();                   
                                                                           
            }


            public function alterar($gestor){
                try {
                    $sql = "UPDATE GESTORES SET USU_EMAIL=:email, USU_CELULAR=:celular, USU_ESTADO=:estado, USU_CIDADE=:cidade, 
                    USU_RUA=:rua, USU_NUMERO_RESIDENCIA=:numero_residencia, USU_BAIRRO=:bairro,
                    USU_CEP=:cep, USU_SEXO=:sexo, USU_FOTO_PERFIL=:foto_perfil WHERE USU_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(':id', $gestor->__get('USU_ID'));
                    $stmt->bindParam(':email', $gestor->__get('USU_EMAIL'));
                    $stmt->bindParam(':celular', $gestor->__get('USU_CELULAR'));
                    $stmt->bindParam(':estado', $gestor->__get('USU_ESTADO'));            
                    $stmt->bindParam(':cidade', $gestor->__get('USU_CIDADE'));
                    $stmt->bindParam(':rua', $gestor->__get('USU_RUA'));
                    $stmt->bindParam(':numero_residencia', $gestor->__get('USU_NUMERO_RESIDENCIA'));
                    $stmt->bindParam(':bairro', $gestor->__get('USU_BAIRRO'));            
                    $stmt->bindParam(':cep', $gestor->__get('USU_CEP'));
                    $stmt->bindParam(':sexo', $gestor->__get('USU_SEXO'));
                    $stmt->bindParam(':foto_perfil', $gestor->__get('USU_FOTO_PERFIL'));


                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location: /error101');
                    die();
                }
            }



            public function excluir($id){
                try {
                    $sql = "delete from gestores where USU_ID=:id";

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
                    $sql = "SELECT * FROM GESTORES WHERE USU_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(":id", $id);
                    $stmt->execute();

                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                    if ($result > 0) {
                        $gestor = new GestorModel();
                        $gestor->__set('GES_PRONTUARIO', $result['GES_PRONTUARIO']);
                        $gestor->__set('GES_RAMAL', $result['GES_RAMAL']);
                        $gestor->__set('USU_ID', $result['USU_ID']);
                        $gestor->__set('USU_CPF', $result['USU_CPF']);
                        $gestor->__set('USU_RG', $result['USU_RG']);
                        $gestor->__set('USU_DATA_NASCIMENTO', $result['USU_DATA_NASCIMENTO']);
                        $gestor->__set('USU_EMAIL', $result['USU_EMAIL']);
                        $gestor->__set('USU_SENHA', $result['USU_SENHA']);
                        $gestor->__set('USU_CELULAR', $result['USU_CELULAR']);
                        $gestor->__set('USU_ESTADO', $result['USU_ESTADO']);
                        $gestor->__set('USU_CIDADE', $result['USU_CIDADE']);
                        $gestor->__set('USU_RUA', $result['USU_RUA']);
                        $gestor->__set('USU_NUMERO_RESIDENCIA', $result['USU_NUMERO_RESIDENCIA']);
                        $gestor->__set('USU_BAIRRO', $result['USU_BAIRRO']);
                        $gestor->__set('USU_CEP', $result['USU_CEP']);
                        $gestor->__set('USU_SEXO', $result['USU_SEXO']);
                        $gestor->__set('USU_FOTO_PERFIL', $result['USU_FOTO_PERFIL']);
                        $gestor->__set('FK_SETORES_SET_ID', $result['FK_SETORES_SET_ID']); //retorna todos os campos relacionados ao ID selecionado
                        

                        return $gestor;
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
                    $respostas_duvidas_feedbacks = array();
                    $sql = "SELECT * FROM RESPOSTAS_DUVIDAS_FEEDBACKS ORDER BY RES_ID ASC";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();

                    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                        $resposta_duvida_feedback = new Respostas_Duvidas_FeedbacksModel();
                        $resposta_duvida_feedback->__set('RES_TEXTO', $row['RES_TEXTO']);
                        $resposta_duvida_feedback->__set('RES_ID', $row['RES_ID']);
                        $resposta_duvida_feedback->__set('RES_ANEXO', $row['RES_ANEXO']);
                        $resposta_duvida_feedback->__set('RES_DATA_HORA', $row['RES_DATA_HORA']);
                        $resposta_duvida_feedback->__set('FK_DUVIDAS_FEEDBACKS_DEF_ID', $row['FK_DUVIDAS_FEEDBACKS_DEF_ID']);
                        $resposta_duvida_feedback->__set('FK_GESTORES_USU_ID', $row['FK_GESTORES_USU_ID']);                


                        array_push($respostas_duvidas_feedbacks, $resposta_duvida_feedback); //Inserindo os dados persistidos da tabela em um array
                    }

                    return $respostas_duvidas_feedbacks; //retornando o array para mostagem da view
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
                }
            }

            /*public function buscarPorFK_DUVIDAS_FEEDBACKS_DEF_ID($id){
                try {
                    $sql = "SELECT * FROM RESPOSTAS_DUVIDAS_FEEDBACKS WHERE FK_DUVIDAS_FEEDBACKS_DEF_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(":id", $id);
                    $stmt->execute();

                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                    if ($result > 0) {
                        return True; //retorna verdadeiro caso haja uma resposta com aquela duvida associada;
                        
                    } else {
                        return False;
                    }
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
                }
            }*/
        }

    
