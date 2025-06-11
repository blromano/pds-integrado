<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\EventosModel; //Linkando o model ao DAO
    
    class EventosDAO extends DAO{
        
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

        

        public function inserir($obj){

            $EVO_NOME               = $obj->__get('EVO_NOME');
            $EVO_DATA_INICIO        = $obj->__get('EVO_DATA_INICIO');
            $EVO_DATA_FIM           = $obj->__get('EVO_DATA_FIM');
            $EVO_STATUS             = $obj->__get('EVO_STATUS');
            $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN       = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN');
            $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX       = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX');
            $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN          = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN');
            $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX          = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX');
            $EVO_RESTRICAO_IDADE_MIN        = $obj->__get('EVO_RESTRICAO_IDADE_MIN');
            $EVO_RESTRICAO_IDADE_MAX        = $obj->__get('EVO_RESTRICAO_IDADE_MAX');
            $EVO_RESTRICAO_OUTRAS           = $obj->__get('EVO_RESTRICAO_OUTRAS');
            $EVO_RESTRICAO_GENERO           = $obj->__get('EVO_RESTRICAO_GENERO');
            
            $FK_ORGANIZADORES_EVENTOS_ORE_ID   = $obj->__get('FK_ORGANIZADORES_EVENTOS_ORE_ID');
            $FK_CAMPUS_CAM_ID                  = $obj->__get('FK_CAMPUS_CAM_ID');

           /* $sql = "INSERT INTO eventos(
                    FK_ORGANIZADORES_EVENTOS_ORE_ID,
                    FK_CAMPUS_CAM_ID,
                    EVO_NOME,
                    EVO_DATA_INICIO,
                    EVO_DATA_FIM,
                    EVO_STATUS,
                    EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN,
                    EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX,
                    EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN,
                    EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX,
                    EVO_RESTRICAO_IDADE_MIN,
                    EVO_RESTRICAO_IDADE_MAX,
                    EVO_RESTRICAO_OUTRAS,
                    EVO_RESTRICAO_GENERO
                    )                         
                    VALUES (" 
                    . "'". $FK_ORGANIZADORES_EVENTOS_ORE_ID . "'," 
                    . "'". $FK_CAMPUS_CAM_ID . "'," 
                    . "'". $EVO_NOME . "'," 
                    . "'". $EVO_DATA_INICIO . "'," 
                    . "'". $EVO_DATA_FIM . "'," 
                    . "'". $EVO_STATUS . "'," 
                    . $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN . "," 
                    . $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX . "," 
                    . $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN . "," 
                    . $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX . "," 
                    . $EVO_RESTRICAO_IDADE_MIN . "," 
                    . $EVO_RESTRICAO_IDADE_MAX . "," 
                    . "'". $EVO_RESTRICAO_OUTRAS . "'," 
                    . "'". $EVO_RESTRICAO_GENERO . "')";
            
                    echo $sql;
                    exit();
            */
            
            $sql = "INSERT INTO eventos(
                FK_ORGANIZADORES_EVENTOS_ORE_ID,
                FK_CAMPUS_CAM_ID,
                EVO_NOME,
                EVO_DATA_INICIO,
                EVO_DATA_FIM,
                EVO_STATUS,
                EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN,
                EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX,
                EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN,
                EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX,
                EVO_RESTRICAO_IDADE_MIN,
                EVO_RESTRICAO_IDADE_MAX,
                EVO_RESTRICAO_OUTRAS,
                EVO_RESTRICAO_GENERO
                )                         
                VALUES (
                :FK_ORGANIZADORES_EVENTOS_ORE_ID,
                :FK_CAMPUS_CAM_ID,
                :EVO_NOME,
                :EVO_DATA_INICIO,
                :EVO_DATA_FIM,
                :EVO_STATUS,
                :EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN,
                :EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX,
                :EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN,
                :EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX,
                :EVO_RESTRICAO_IDADE_MIN,
                :EVO_RESTRICAO_IDADE_MAX,
                :EVO_RESTRICAO_OUTRAS,
                :EVO_RESTRICAO_GENERO
            )";
                    
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':FK_ORGANIZADORES_EVENTOS_ORE_ID', $FK_ORGANIZADORES_EVENTOS_ORE_ID);
            $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
            $stmt->bindParam(':EVO_NOME', $EVO_NOME);
            $stmt->bindParam(':EVO_DATA_INICIO', $EVO_DATA_INICIO);
            $stmt->bindParam(':EVO_DATA_FIM', $EVO_DATA_FIM);
            $stmt->bindParam(':EVO_STATUS', $EVO_STATUS);
            $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN', $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN);
            $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX', $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX);
            $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN', $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN);
            $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX', $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX);
            $stmt->bindParam(':EVO_RESTRICAO_IDADE_MIN', $EVO_RESTRICAO_IDADE_MIN);
            $stmt->bindParam(':EVO_RESTRICAO_IDADE_MAX', $EVO_RESTRICAO_IDADE_MAX);
            $stmt->bindParam(':EVO_RESTRICAO_OUTRAS', $EVO_RESTRICAO_OUTRAS);
            $stmt->bindParam(':EVO_RESTRICAO_GENERO', $EVO_RESTRICAO_GENERO);

            $stmt->execute();

        }
        public function excluir($EVO_ID)
    {
        try {
            $sql = "DELETE FROM eventos where EVO_ID=:EVO_ID";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":EVO_ID", $EVO_ID);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }
        public function alterar($obj){
        try{
            $EVO_ID = $obj->__get('EVO_ID');
            $EVO_NOME = $obj->__get('EVO_NOME');
            $FK_ORGANIZADORES_EVENTOS_ORE_ID = $obj->__get('FK_ORGANIZADORES_EVENTOS_ORE_ID');
            $FK_CAMPUS_CAM_ID = $obj->__get('FK_CAMPUS_CAM_ID');
            $EVO_DATA_INICIO = $obj->__get('EVO_DATA_INICIO');
            $EVO_DATA_FIM = $obj->__get('EVO_DATA_FIM');
            $EVO_STATUS = $obj->__get('EVO_STATUS');
            $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN');
            $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX');
            $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN');
            $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX = $obj->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX');
            $EVO_RESTRICAO_IDADE_MIN = $obj->__get('EVO_RESTRICAO_IDADE_MIN');
            $EVO_RESTRICAO_IDADE_MAX = $obj->__get('EVO_RESTRICAO_IDADE_MAX');
            $EVO_RESTRICAO_OUTRAS = $obj->__get('EVO_RESTRICAO_OUTRAS');
            $EVO_RESTRICAO_GENERO = $obj->__get('EVO_RESTRICAO_GENERO');
        
            $sql = "UPDATE eventos SET 
            
                EVO_NOME=:EVO_NOME, 
                FK_ORGANIZADORES_EVENTOS_ORE_ID=:FK_ORGANIZADORES_EVENTOS_ORE_ID,
                FK_CAMPUS_CAM_ID=:FK_CAMPUS_CAM_ID,
                EVO_DATA_INICIO=:EVO_DATA_INICIO,
                EVO_DATA_FIM=:EVO_DATA_FIM,
                EVO_STATUS=:EVO_STATUS,
                EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN=:EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN,
                EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX=:EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX,
                EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN=:EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN,
                EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX=:EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX,
                EVO_RESTRICAO_IDADE_MIN=:EVO_RESTRICAO_IDADE_MIN,
                EVO_RESTRICAO_IDADE_MAX=:EVO_RESTRICAO_IDADE_MAX,
                EVO_RESTRICAO_OUTRAS=:EVO_RESTRICAO_OUTRAS,
                EVO_RESTRICAO_GENERO=:EVO_RESTRICAO_GENERO
                
                WHERE
                EVO_ID=:EVO_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':EVO_ID', $EVO_ID);
                $stmt->bindParam(':EVO_NOME', $EVO_NOME);
                $stmt->bindParam(':FK_ORGANIZADORES_EVENTOS_ORE_ID', $FK_ORGANIZADORES_EVENTOS_ORE_ID);
                $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
                $stmt->bindParam(':EVO_DATA_INICIO', $EVO_DATA_INICIO);
                $stmt->bindParam(':EVO_DATA_FIM', $EVO_DATA_FIM);
                $stmt->bindParam(':EVO_STATUS', $EVO_STATUS);
                $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN', $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN);
                $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX', $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX);
                $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN', $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN);
                $stmt->bindParam(':EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX', $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX);
                $stmt->bindParam(':EVO_RESTRICAO_IDADE_MIN', $EVO_RESTRICAO_IDADE_MIN);
                $stmt->bindParam(':EVO_RESTRICAO_IDADE_MAX', $EVO_RESTRICAO_IDADE_MAX);
                $stmt->bindParam(':EVO_RESTRICAO_OUTRAS', $EVO_RESTRICAO_OUTRAS);
                $stmt->bindParam(':EVO_RESTRICAO_GENERO', $EVO_RESTRICAO_GENERO);
    
                    $stmt->execute();
            }  
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }
        

        public function buscarPorId($EVO_ID){
            try{
                
                $sql = "SELECT * FROM eventos WHERE EVO_ID=:EVO_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':EVO_ID', $EVO_ID);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $eventoModel = new EventosModel();
                    
                    $eventoModel->__set('FK_ORGANIZADORES_EVENTOS_ORE_ID',$result['FK_ORGANIZADORES_EVENTOS_ORE_ID']);
                    $eventoModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $eventoModel->__set('EVO_ID',$result['EVO_ID']);
                    $eventoModel->__set('EVO_NOME',$result['EVO_NOME']);
                    $eventoModel->__set('EVO_DATA_INICIO',$result['EVO_DATA_INICIO']);
                    $eventoModel->__set('EVO_DATA_FIM',$result['EVO_DATA_FIM']);
                    $eventoModel->__set('EVO_STATUS',$result['EVO_STATUS']);

                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN',$result['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX',$result['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN',$result['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX',$result['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX']);
                    $eventoModel->__set('EVO_RESTRICAO_IDADE_MIN',$result['EVO_RESTRICAO_IDADE_MIN']);
                    $eventoModel->__set('EVO_RESTRICAO_IDADE_MAX',$result['EVO_RESTRICAO_IDADE_MAX']);
                    $eventoModel->__set('EVO_RESTRICAO_OUTRAS',$result['EVO_RESTRICAO_OUTRAS']);
                    $eventoModel->__set('EVO_RESTRICAO_GENERO',$result['EVO_RESTRICAO_GENERO']);


                    return $eventoModel;
                } else{
                    return null;
                }
            
            } catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }
        
        //mod02 (apenas testes)

        public function listarEventos_mod02(){
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

        public function listareventoswelcome(){
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
                    $eventoModel->__set('EVO_DATA_INICIO',$row['EVO_DATA_INICIO']);
                    $eventoModel->__set('EVO_DATA_FIM',$row['EVO_DATA_FIM']);

                    array_push($eventos, $eventoModel);
                }
                return $eventos;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }

        public function atribuirSec(){
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

        public function restricoes($EVO_ID){
            try{
                $eventos=array();
                $sql = "SELECT * FROM eventos WHERE EVO_ID=:EVO_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':EVO_ID', $EVO_ID);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $eventoModel = new EventosModel();
                    
                    $eventoModel->__set('EVO_RESTRICAO_IDADE_MIN', $result['EVO_RESTRICAO_IDADE_MIN']);
                    $eventoModel->__set('EVO_RESTRICAO_IDADE_MAX', $result['EVO_RESTRICAO_IDADE_MAX']);
                    $eventoModel->__set('EVO_RESTRICAO_GENERO', $result['EVO_RESTRICAO_GENERO']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN', $result['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX', $result['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN', $result['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN']);
                    $eventoModel->__set('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX', $result['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX']);
                    $eventoModel->__set('EVO_RESTRICAO_OUTRAS', $result['EVO_RESTRICAO_OUTRAS']);


                    array_push($eventos, $eventoModel);
                }
                return $eventos;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }

        public function validaAutenticacao() {}
    }