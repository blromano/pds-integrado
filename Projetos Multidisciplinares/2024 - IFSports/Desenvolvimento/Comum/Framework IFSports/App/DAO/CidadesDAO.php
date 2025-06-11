<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\CidadesModel; //Linkando o model ao DAO

    class CidadesDAO extends DAO{
        
        public function listar(){
           
                try{
                    $cidades = array();
                    $sql = "SELECT * FROM cidades ORDER BY CID_ID ASC";
    
                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();
    
                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    
                    foreach($result as $row){
                        $cidadesModel = new CidadesModel();
                        $cidadesModel->__set('CID_ID',$row['CID_ID']);
                        $cidadesModel->__set('CID_NOME',$row['CID_NOME']);
                        $cidadesModel->__set('FK_ESTADOS_EST_ID',$row['FK_ESTADOS_EST_ID']);
    
                        array_push($cidades, $cidadesModel);
                    }
    
                    return $cidades;
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
            
                $cidades = array();
                $sql = "SELECT * FROM cidades WHERE FK_ESTADOS_EST_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
                foreach($result as $row){

                        $retorno['CID_ID'] = $row['CID_ID'];
                        $retorno['CID_NOME'] = $row['CID_NOME'];
    
                        array_push($cidades, $retorno);
                }
    
            echo json_encode($cidades);
        }
                
                
        
    }