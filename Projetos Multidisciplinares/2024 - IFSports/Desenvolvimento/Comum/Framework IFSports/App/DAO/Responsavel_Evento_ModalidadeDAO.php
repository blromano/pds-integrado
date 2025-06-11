<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\Responsavel_Evento_ModalidadeModel; //Linkando o model ao DAO
    use App\Model\EventosModel;

    class Responsavel_Evento_ModalidadeDAO extends DAO{
        
        public function listar(){
            try{
                $eventos = array();
                $sql = "SELECT                      
                            EV.*,
                            CA.CAM_NOME, 
                            OE.ORE_NOME 
                        FROM 
                            eventos EV, 
                            campus CA, 
                            organizadores_eventos OE 
                        WHERE 
                            EV.FK_CAMPUS_CAM_ID = CA.CAM_ID
                            AND
                            EV.FK_ORGANIZADORES_EVENTOS_ORE_ID = OE.ORE_ID 
                        ORDER BY 
                            EV.EVO_ID ASC";

                //$sql = "SELECT * FROM eventos ORDER BY EVO_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $eventoModel = new EventosModel();
                    $eventoModel->__set('EVO_ID',$row['EVO_ID']);
                    $eventoModel->__set('EVO_NOME',$row['EVO_NOME']);
                    $eventoModel->__set('EVO_STATUS',$row['EVO_STATUS']);
                    $eventoModel->__set('CAM_NOME',$row['CAM_NOME']);
                    $eventoModel->__set('ORE_NOME',$row['ORE_NOME']);


                    array_push($eventos, $eventoModel);
                }
                return $eventos;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }

        public function inserirResponsavelModalidade($obj){
            $FK_RESPONSAVEIS_EQUIPE_RES_ID                  = $obj->__get('FK_RESPONSAVEIS_EQUIPE_RES_ID');
            $FK_EVENTOS_MODALIDADES_EVM_ID  = $obj->__get('FK_EVENTOS_MODALIDADES_EVM_ID');

            $sql = "INSERT INTO responsavel_evento_modalidade(
                        FK_RESPONSAVEIS_EQUIPE_RES_ID,
                        FK_EVENTOS_MODALIDADES_EVM_ID
                        ) VALUES (
                        :FK_RESPONSAVEIS_EQUIPE_RES_ID,
                        :FK_EVENTOS_MODALIDADES_EVM_ID
                    )";
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':FK_RESPONSAVEIS_EQUIPE_RES_ID', $FK_RESPONSAVEIS_EQUIPE_RES_ID);
            $stmt->bindParam(':FK_EVENTOS_MODALIDADES_EVM_ID', $FK_EVENTOS_MODALIDADES_EVM_ID);

            $stmt->execute();
        }

        public function inserir($obj){

            $RST_COLOCACAO                  = $obj->__get('RST_COLOCACAO');
            $FK_EVENTOS_MODALIDADES_EVM_ID  = $obj->__get('FK_EVENTOS_MODALIDADES_EVM_ID');
            $FK_CAMPUS_CAM_ID               = $obj->__get('FK_CAMPUS_CAM_ID');

            $sql = "INSERT INTO resultados(
                        RST_COLOCACAO,
                        FK_CAMPUS_CAM_ID,
                        FK_EVENTOS_MODALIDADES_EVM_ID
                        ) VALUES (
                        :RST_COLOCACAO,
                        :FK_CAMPUS_CAM_ID,
                        :FK_EVENTOS_MODALIDADES_EVM_ID
                    )";
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':RST_COLOCACAO', $RST_COLOCACAO);
            $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
            $stmt->bindParam(':FK_EVENTOS_MODALIDADES_EVM_ID', $FK_EVENTOS_MODALIDADES_EVM_ID);

            $stmt->execute();
        }

        public function pesquisarResultadoPorModalidade($evm_id){
            try{
                $resultados = array();
                $sql = "SELECT * FROM resultados WHERE FK_EVENTOS_MODALIDADES_EVM_ID=:evm_id ORDER BY RST_COLOCACAO";
                
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':evm_id', $evm_id);

                $stmt->execute();

                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                if($resultados > 0) {
                    foreach($resultados as $row){
                        $resultadosModel = new ResultadosModel();
                        $resultadosModel->__set('RST_ID',$row['RST_ID']);
                        $resultadosModel->__set('RST_COLOCACAO',$row['RST_COLOCACAO']);
                        $resultadosModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID',$row['FK_EVENTOS_MODALIDADES_EVM_ID']);
                        $resultadosModel->__set('FK_CAMPUS_CAM_ID',$row['FK_CAMPUS_CAM_ID']);

                        array_push($resultados, $resultadosModel);
                    }
                }
                return $resultados;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }

        public function excluir($obj){
            try {
                $sql = "DELETE FROM resultados where rts_id=:rts_id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":rts_id", $rts_id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            } 
        }

        public function excluirResponsavelModalidade($obj){
            try {
                $sql = "DELETE FROM responsavel_evento_modalidade where FK_RESPONSAVEIS_EQUIPE_RES_ID=:RES_ID AND FK_EVENTOS_MODALIDADES_EVM_ID = EVM_ID";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":RES_ID", $RES_ID);
                $stmt->bindParam(":EVM_ID", $EVM_ID);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            } 
        }

        public function alterar($obj){
            try{
                $RST_COLOCACAO                  = $obj->__get('RST_COLOCACAO');
                $FK_CAMPUS_CAM_ID               = $obj->__get('FK_CAMPUS_CAM_ID');
                $FK_EVENTOS_MODALIDADES_EVM_ID  = $obj->__get('FK_EVENTOS_MODALIDADES_EVM_ID');
                
                $sql = "UPDATE resultados SET 
                            FK_CAMPUS_CAM_ID=:FK_CAMPUS_CAM_ID
                        WHERE
                            RST_COLOCACAO=:RST_COLOCACAO AND
                            FK_EVENTOS_MODALIDADES_EVM_ID =:FK_EVENTOS_MODALIDADES_EVM_ID";
                
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':RST_COLOCACAO', $RST_COLOCACAO);
                $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMFK_CAMPUS_CAM_IDPUS_CAM_ID);
                
                $stmt->execute();    

            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }
        public function buscarPorId($id){
            try{
                
                $sql = "SELECT * FROM resultados WHERE rts_id=:rts_id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':rts_id', $rts_id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $usuarioModel = new UsuariosModel();
                    $usuarioModel->__set('rts_id',$result['rts_id']);
                    $usuarioModel->__set('rts_colocacao',$result['rts_colocacao']);
                    $usuarioModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $usuarioModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID',$result['FK_EVENTOS_MODALIDADES_EVM_ID']);

                    return $usuarioModel;
                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }
        
    }