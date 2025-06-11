<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\ResultadosModel; //Linkando o model ao DAO

    class ResultadosDAO extends DAO{
        
        public function listar(){
            try{
                $resultados = array();
                $sql = "SELECT * FROM resultados ORDER BY RTS_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($resultados as $row){
                    $resultadosModel = new ResultadosModel();
                    $resultadosModel->__set('RTS_ID',$row['RTS_ID']);
                    $resultadosModel->__set('RTS_COLOCACAO',$row['RTS_COLOCACAO']);
                    $resultadosModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID',$row['FK_EVENTOS_MODALIDADES_EVM_ID']);
                    $resultadosModel->__set('FK_CAMPUS_CAM_ID',$row['FK_CAMPUS_CAM_ID']);

                    array_push($resultados, $resultadosModel);
                }
                return $resultados;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
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
                $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
                $stmt->bindParam(':FK_EVENTOS_MODALIDADES_EVM_ID', $FK_EVENTOS_MODALIDADES_EVM_ID);
                
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
                    $resultadosModel = new UsuariosModel();
                    $resultadosModel->__set('rts_id',$result['rts_id']);
                    $resultadosModel->__set('rts_colocacao',$result['rts_colocacao']);
                    $resultadosModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $resultadosModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID',$result['FK_EVENTOS_MODALIDADES_EVM_ID']);

                    return $resultadosModel;
                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }


        public function listaresultadoswelcome(){
            try{
                $sql = "SELECT 
                r.*,
                m.*,
                em.*,
                e.*, 
                c.CAM_NOME
                
                FROM 
                resultados r,
                eventos_modalidades em,
                modalidades m,
                campus c,
                eventos e
                
                WHERE
                em.EVM_ID=r.FK_EVENTOS_MODALIDADES_EVM_ID AND
                r.FK_CAMPUS_CAM_ID=c.CAM_ID AND
                em.FK_EVENTOS_EVO_ID=EVO_ID";


                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':EVO_ID', $EVO_ID);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $resultadoModel = new ResultadosModel();
                    $resultadoModel->__set('RST_ID', $result['RST_ID']);
                    $resultadoModel->__set('RST_COLOCACAO', $result['RST_COLOCACAO']);
                    $resultadoModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID', $result['FK_EVENTOS_MODALIDADES_EVM_ID']);
                    $resultadoModel->__set('FK_CAMPUS_CAM_I', $result['FK_CAMPUS_CAM_ID']);
                    $resultadoModel->__set('CAM_NOME', $result['CAM_NOME']);
                   


                            
                    return $resultadoModel;
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