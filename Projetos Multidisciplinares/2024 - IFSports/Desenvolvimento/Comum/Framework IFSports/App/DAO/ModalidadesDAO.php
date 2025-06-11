<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\ModalidadesModel;
    use App\Model\Eventos_ModalidadesModel;

    class ModalidadesDAO extends DAO{

        public function listar(){
            try{
                $modalidades = array();
                $sql = "SELECT * FROM modalidades ORDER BY MDE_ID DESC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $modalidade = new ModalidadesModel();
                    $modalidade->__set('MDE_ID',$row['MDE_ID']);
                    $modalidade->__set('MDE_NOME',$row['MDE_NOME']);
                    $modalidade->__set('MDE_GENERO',$row['MDE_GENERO']);
                    $modalidade->__set('MDE_TIPO',$row['MDE_TIPO']);


                    array_push($modalidades,$modalidade);
                }
                return $modalidades;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }

        public function listar_modalidades_evento($id) {
       
             try {

                if (empty($id)) {
                    throw new \Exception('ID do evento não fornecido.');
                }
        
                $modalidades_evento = array();
                $sql = "SELECT
                            m.MDE_ID, 
                            m.MDE_NOME as MDE_NOME,
                            m.MDE_TIPO as MDE_TIPO,
                            m.MDE_GENERO as MDE_GENERO,
                            ev.EVM_ID as EVM_ID,
                            ev.EVM_QUANTIDADE_MINIMA_JOGADORES as MDE_QUANTIDADE_MINIMA_JOGADORES,
                            ev.EVM_QUANTIDADE_MAXIMA_JOGADORES as MDE_QUANTIDADE_MAXIMA_JOGADORES
                        FROM 
                            eventos_modalidades ev, 
                            modalidades m
                        WHERE 
                            ev.FK_MODALIDADES_MDE_ID = m.MDE_ID AND
                            ev.FK_EVENTOS_EVO_ID = :id 
                        ORDER BY m.MDE_NOME";
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
        
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        
                foreach ($result as $row) {
                    $modalidadeEvento = new Eventos_ModalidadesModel();
                    $modalidadeEvento->__set('EVM_ID', $row['EVM_ID']);
                    $modalidadeEvento->__set('MDE_ID', $row['MDE_ID']);
                    $modalidadeEvento->__set('MDE_NOME', $row['MDE_NOME']);
                    $modalidadeEvento->__set('MDE_TIPO', $row['MDE_TIPO']);
                    $modalidadeEvento->__set('MDE_GENERO', $row['MDE_GENERO']);
                    $modalidadeEvento->__set('MDE_QUANTIDADE_MINIMA_JOGADORES', $row['MDE_QUANTIDADE_MINIMA_JOGADORES']);
                    $modalidadeEvento->__set('MDE_QUANTIDADE_MAXIMA_JOGADORES', $row['MDE_QUANTIDADE_MAXIMA_JOGADORES']);
        
                    array_push($modalidades_evento, $modalidadeEvento);
                }
                return $modalidades_evento;
        
            } catch (\PDOException $ex) {
 
                echo 'Erro ao acessar o banco de dados: ' . $ex->getMessage();
                die();
            } catch (\Exception $ex) {

                echo 'Erro: ' . $ex->getMessage();
                die();
            } 

            /* try{

                $modalidades_evento = array();
                $sql = "SELECT                      
                            M.MDE_ID, 
                            M.MDE_NOME,
                            M.MDE_TIPO,
                            M.MDE_GENERO,
                            EM.EVM_ID,
                            EM.EVM_QUANTIDADE_MINIMA_JOGADORES,
                            EM.EVM_QUANTIDADE_MAXIMA_JOGADORES 
                        FROM 
                            eventos_modalidades EM, 
                            modalidades M,
                            eventos EV
                        WHERE 
                            EM.FK_MODALIDADES_MDE_ID = M.MDE_ID
                            AND
                            EM.FK_EVENTOS_EVO_ID = EV.EVO_ID
                        ORDER BY 
                            EM.EVM_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    
                    $modalidadeEvento = new Eventos_ModalidadesModel();
                    $modalidadeEvento->__set('EVM_ID', $row['EVM_ID']);
                    $modalidadeEvento->__set('MDE_ID', $row['MDE_ID']);
                    $modalidadeEvento->__set('MDE_NOME', $row['MDE_NOME']);
                    $modalidadeEvento->__set('MDE_TIPO', $row['MDE_TIPO']);
                    $modalidadeEvento->__set('MDE_GENERO', $row['MDE_GENERO']);
                    $modalidadeEvento->__set('MDE_QUANTIDADE_MINIMA_JOGADORES', $row['MDE_QUANTIDADE_MINIMA_JOGADORES']);
                    $modalidadeEvento->__set('MDE_QUANTIDADE_MAXIMA_JOGADORES', $row['MDE_QUANTIDADE_MAXIMA_JOGADORES']);
        
                    array_push($modalidades_evento, $modalidadeEvento);
                }
                return $modalidades_evento;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } */

        }


        public function listar_modalidades_evento_welcome($EVO_ID) {
       
            try{

                $modalidades_evento = array();
                $sql = "SELECT                      
                            M.MDE_ID, 
                            M.MDE_NOME,
                            M.MDE_TIPO,
                            M.MDE_GENERO,
                            EM.EVM_ID
                        FROM 
                            eventos_modalidades EM, 
                            modalidades M,
                            eventos EV
                        WHERE 
                            EM.FK_MODALIDADES_MDE_ID = M.MDE_ID
                            AND
                            EM.FK_EVENTOS_EVO_ID = EV.EVO_ID
                        ORDER BY 
                            EM.EVM_ID ASC";
 
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();
 
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    
                    $modalidadeEvento = new Eventos_ModalidadesModel();
                    $modalidadeEvento->__set('EVM_ID', $row['EVM_ID']);
                    $modalidadeEvento->__set('MDE_ID', $row['MDE_ID']);
                    $modalidadeEvento->__set('MDE_NOME', $row['MDE_NOME']);
                    $modalidadeEvento->__set('MDE_TIPO', $row['MDE_TIPO']);
                    $modalidadeEvento->__set('MDE_GENERO', $row['MDE_GENERO']);
        
                    array_push($modalidades_evento, $modalidadeEvento);
                }
                return $modalidades_evento;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }
       

        public function inserir($obj) {

            $quantmin = $obj->__get('EVM_QUANTIDADE_MINIMA_JOGADORES');
            $quantmax = $obj->__get('EVM_QUANTIDADE_MAXIMA_JOGADORES');
            $fk_modalidade_id = $obj->__get('FK_MODALIDADES_MDE_ID'); 
            $fk_evento_id = $obj->__get('FK_EVENTOS_EVO_ID'); 
        

            $this->getConn()->beginTransaction();
        
            try {
                $sql = "INSERT INTO eventos_modalidades(
                            EVM_QUANTIDADE_MINIMA_JOGADORES,
                            EVM_QUANTIDADE_MAXIMA_JOGADORES,
                            FK_MODALIDADES_MDE_ID,
                            FK_EVENTOS_EVO_ID
                        ) VALUES (
                            :quantmin,
                            :quantmax,
                            :fk_modalidade_id,
                            :fk_evento_id
                        )";
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':quantmin', $quantmin);
                $stmt->bindParam(':quantmax', $quantmax);
                $stmt->bindParam(':fk_modalidade_id', $fk_modalidade_id);
                $stmt->bindParam(':fk_evento_id', $fk_evento_id);
                $stmt->execute();
        
                $this->getConn()->commit();
            } catch (\Exception $e) {

                $this->getConn()->rollBack();
                throw $e;
            }
        }

        public function excluir($id) {
            $sql = "DELETE FROM eventos_modalidades WHERE EVM_ID = :id";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }


    public function alterar($obj) {
        try {

            $EVM_ID = $obj->__get('EVM_ID');
            $FK_EVENTOS_EVO_ID = $obj->__get('FK_EVENTOS_EVO_ID');
            $FK_MODALIDADES_MDE_ID = $obj->__get('FK_MODALIDADES_MDE_ID');
            $EVM_QUANTIDADE_MAXIMA_JOGADORES = $obj->__get('EVM_QUANTIDADE_MAXIMA_JOGADORES');
            $EVM_QUANTIDADE_MINIMA_JOGADORES = $obj->__get('EVM_QUANTIDADE_MINIMA_JOGADORES');

            $sql = "UPDATE eventos_modalidades SET 
                        FK_EVENTOS_EVO_ID = :FK_EVENTOS_EVO_ID,
                        FK_MODALIDADES_MDE_ID = :FK_MODALIDADES_MDE_ID,
                        EVM_QUANTIDADE_MAXIMA_JOGADORES = :EVM_QUANTIDADE_MAXIMA_JOGADORES,
                        EVM_QUANTIDADE_MINIMA_JOGADORES = :EVM_QUANTIDADE_MINIMA_JOGADORES,
                    WHERE EVM_ID = :EVM_ID;";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':EVM_ID', $EVM_ID);
            $stmt->bindParam(':FK_EVENTOS_EVO_ID', $FK_EVENTOS_EVO_ID);
            $stmt->bindParam(':FK_MODALIDADES_MDE_ID', $FK_MODALIDADES_MDE_ID);
            $stmt->bindParam(':EVM_QUANTIDADE_MAXIMA_JOGADORES', $EVM_QUANTIDADE_MAXIMA_JOGADORES);
            $stmt->bindParam(':EVM_QUANTIDADE_MINIMA_JOGADORES', $EVM_QUANTIDADE_MINIMA_JOGADORES);

            $stmt->execute();

        } catch (\PDOException $e) {
            header('Location:/error103');
            die();
        }
    }

    public function buscarPorId($MDE_ID){

    try{            
        $sql = "SELECT * FROM modalidades WHERE MDE_ID=:MDE_ID";

        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':MDE_ID', $MDE_ID);

        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result > 0) {
            $modalidadesModel = new ModalidadesModel();
            $modalidadesModel->__set('MDE_ID',$result['MDE_ID']);
            $modalidadesModel->__set('MDE_NOME',$result['MDE_NOME']);
            $modalidadesModel->__set('MDE_GENERO',$result['MDE_GENERO']);
            $modalidadesModel->__set('MDE_TIPO',$result['MDE_TIPO']);

            return $modalidadesModel;
        } else{
            return null;
        }
        return $modalidades;
    }
        catch(\PDOException $ex){
            header('Location:/error103');
            die();
        } 
    }
    }
?> 