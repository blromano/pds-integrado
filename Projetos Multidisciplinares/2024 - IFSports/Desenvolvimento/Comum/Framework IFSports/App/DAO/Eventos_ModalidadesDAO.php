<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\Eventos_ModalidadesModel; //Linkando o model ao DAO

    class Eventos_ModalidadesDAO extends DAO{
        
        public function listar(){
            try{
                //Colocar o código aqui
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }

        public function listarEventosModalidades() {
            try{
                $eventosModalidadades = array();
                $sql = "SELECT 
                            EM.EVM_ID,
                            E.EVO_NOME,
                            M.MDE_NOME
                        FROM 
                            EVENTOS_MODALIDADES EM,
                            MODALIDADES M,
                            EVENTOS E
                        WHERE
                            EM.FK_MODALIDADES_MDE_ID = M.MDE_ID AND
                            EM.FK_EVENTOS_EVO_ID = E.EVO_ID
                        ORDER BY
                            E.EVO_NOME,
                            M.MDE_NOME";
                
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $eventoModalidadesModel = new Eventos_ModalidadesModel();
                    $eventoModalidadesModel->__set('EVM_ID',$row['EVM_ID']);
                    $eventoModalidadesModel->__set('EVO_NOME',$row['EVO_NOME']);
                    $eventoModalidadesModel->__set('MDE_NOME',$row['MDE_NOME']);

                    array_push($eventosModalidadades, $eventoModalidadesModel);
                }
                return $eventosModalidadades;
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