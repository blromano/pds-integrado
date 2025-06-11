<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\CampusModel; //Linkando o model ao DAO

    class CampusDAO extends DAO{
        
        public function listar(){
            try{
                $campus = array();
                $sql = "SELECT * FROM campus ORDER BY CAM_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
                foreach($result as $row){
                    $campusModel = new CampusModel();
                    $campusModel->__set('CAM_ID',$row['CAM_ID']);
                    $campusModel->__set('CAM_NOME',$row['CAM_NOME']);
                    $campusModel->__set('CAM_COMPLEMENTO',$row['CAM_COMPLEMENTO']);
                    $campusModel->__set('CAM_CEP',$row['CAM_CEP']);
                    $campusModel->__set('CAM_NUMERO',$row['CAM_NUMERO']);
                    $campusModel->__set('FK_CIDADES_CID_ID',$row['FK_CIDADES_CID_ID']);

                    array_push($campus, $campusModel);
                }

                return $campus;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        } 

        

        public function inserir($obj){

            //Colocar o código aqui

        }
        public function excluir($obj){

        }
        public function alterar($obj){
            try{
                //colocar o código aqui

            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }
        public function buscarPorId($id){
            try{
                
                //colocar o código aqui
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }
        
    }