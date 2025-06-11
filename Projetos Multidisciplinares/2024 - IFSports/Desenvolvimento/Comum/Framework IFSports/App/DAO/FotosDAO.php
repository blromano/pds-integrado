<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\FotosModel; //Linkando o model ao DAO

    class FotosDAO extends DAO{
        
        public function listar($status = null) {
            try {
                $fotos = array();
                $sql = "SELECT * FROM fotos";
                if ($status !== null) {
                    $sql .= " WHERE FTS_STATUS = :fts_status";
                }
                $sql .= " ORDER BY FTS_ID ASC";
                
                $stmt = $this->getConn()->prepare($sql);
        
                if ($status !== null) {
                    $stmt->bindParam(':fts_status', $status);
                }
                $stmt->execute();
        
                $fotos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $result = [];
                foreach ($fotos as $row) {
                    $fotoModel = new FotosModel();
                    $fotoModel->__set('FTS_ID', $row['FTS_ID']);
                    $fotoModel->__set('FTS_ARQUIVO', $row['FTS_ARQUIVO']);
                    $fotoModel->__set('FTS_LEGENDA', $row['FTS_LEGENDA']);
                    $fotoModel->__set('FTS_DATA', $row['FTS_DATA']);
                    $fotoModel->__set('FK_EVENTOS_EVO_ID', $row['FK_EVENTOS_EVO_ID']);
                    $fotoModel->__set('FK_ALUNOS_ALU_ID', $row['FK_ALUNOS_ALU_ID']);
                    array_push($result, $fotoModel);
                }
                return $result;
            } catch (\PDOException $ex) {
                header('Location:/error103');
                die();
            }
        }
        
        public function inserir($obj)
        {
            $fts_arquivo = $obj->__get('fts_arquivo');
            $fts_legenda = $obj->__get('fts_legenda');
            $fts_data = $obj->__get('fts_data');
            $fk_eventos_evo_id = $obj->__get('fk_eventos_evo_id');
            $fk_alunos_alu_id = $obj->__get('fk_alunos_alu_id');
        
            $sql = "INSERT INTO fotos (fts_arquivo, fts_legenda, fts_data, fk_eventos_evo_id, fk_alunos_alu_id)
            VALUES (:fts_arquivo, :fts_legenda, :fts_data, :fk_eventos_evo_id, :fk_alunos_alu_id)";
                
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':fts_arquivo', $fts_arquivo);
            $stmt->bindParam(':fts_legenda', $fts_legenda);
            $stmt->bindParam(':fts_data', $fts_data);
            $stmt->bindParam(':fk_eventos_evo_id', $fk_eventos_evo_id);
            $stmt->bindParam(':fk_alunos_alu_id', $fk_alunos_alu_id);
            $stmt->execute();
        }
        

        public function excluir($obj){
        try {
            $sql = "DELETE FROM fotos where fts_id=:fts_id";

            $stmt = $this->getConn()->prepare($sql);
                
            $stmt->bindParam(":fts_id", $fts_id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
            }            
        }

        public function alterar($obj) {
            try {
                $sql = "UPDATE fotos SET FTS_STATUS = :fts_status WHERE FTS_ID = :fts_id";
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":fts_status", $obj->__get('FTS_STATUS'));
                $stmt->bindParam(":fts_id", $obj->__get('FTS_ID'));
        
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }
        
        public function buscarPorId($id){
            try{
                $sql = "SELECT * FROM fotos WHERE fts_id=:fts_id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':fts_id', $fts_id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $usuarioModel = new FotosModel();
                    $usuarioModel->__set('fts_id',$result['fts_id']);
                    $usuarioModel->__set('fts_arquivo',$result['fts_arquivo']);
                    $usuarioModel->__set('fts_foto',$result['fts_foto']);
                    $usuarioModel->__set('fts_legenda',$result['fts_legenda']);
                    $usuarioModel->__set('fts_data',$result['fts_data']);


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

        public function obterNomeFotowelcome($EVO_ID, $foto) {
            // SQL para recuperar o nome do arquivo
            $sql = "SELECT $foto FROM alunos_inscritos_eventos WHERE EVO_ID = :EVO_ID";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':EVO_ID', $EVO_ID);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($resultado) {
                return $resultado[$foto]; // Retorna o nome do arquivo
            } else {
                return null;
            }
        }

        public function listarfotoswelcome($EVO_ID) {
            try {
                $fotos = array();
                $sql = "SELECT DISTINCT f.*
                
                        FROM fotos f
                  

                        WHERE f.FK_EVENTOS_EVO_ID=:EVO_ID";
                
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':EVO_ID', $EVO_ID);
                $stmt->execute();
        
                $fotos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $result = [];
                foreach ($fotos as $row) {
                    $fotoModel = new FotosModel();
                    $fotoModel->__set('FTS_ID', $row['FTS_ID']);
                    $fotoModel->__set('FTS_ARQUIVO', $row['FTS_ARQUIVO']);
                    $fotoModel->__set('FTS_LEGENDA', $row['FTS_LEGENDA']);
                    $fotoModel->__set('FTS_DATA', $row['FTS_DATA']);
                    $fotoModel->__set('FK_EVENTOS_EVO_ID', $row['FK_EVENTOS_EVO_ID']);
                    $fotoModel->__set('FK_ALUNOS_ALU_ID', $row['FK_ALUNOS_ALU_ID']);
                    array_push($result, $fotoModel);
                }
                return $result;
            } catch (\PDOException $ex) {
                header('Location:/error103');
                die();
            }
        }
        
    }