<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\Eventos_SecretariosModel; //Linkando o model ao DAO

    class Eventos_SecretariosDAO extends DAO{
        
        public function listar(){
            try{
                //Colocar o código aqui
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