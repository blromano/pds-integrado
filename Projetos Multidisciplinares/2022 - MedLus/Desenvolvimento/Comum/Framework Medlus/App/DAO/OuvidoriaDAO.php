<?php

namespace App\DAO;

use App\DAO;
use App\Model\OuvidoriaModel;
    
    class OuvidoriaDAO extends DAO{

        //Listando todos os dados da tabela pacientes em ordem crescente de OUV_ID
        public function listar(){
            try {
                $ouvidorias = array();
                $sql = "SELECT * FROM ouvidoria ORDER BY OUV_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $ouvidoria = new OuvidoriaModel();
                    $ouvidoria->__set('OUV_RECADO', $row['OUV_RECADO']);
                    $ouvidoria->__set('OUV_SITUACAO', $row['OUV_SITUACAO']);
                    $ouvidoria->__set('OUV_MOTIVO', $row['OUV_MOTIVO']);
                    $ouvidoria->__set('OUV_ID', $row['OUV_ID']);
                    $ouvidoria->__set('FK_USUARIOS_USU_ID', $row['FK_USUARIOS_USU_ID']);

                    array_push($ouvidorias, $ouvidoria); //Inserindo os dados persistidos da tabela em um array
                }

                return $ouvidorias; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }



        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($ouvidoria){
            try {
                $sql = "UPDATE ouvidoria 
                SET OUV_RECADO=:recado, 
                OUV_SITUACAO=:situacao,
                OUV_MOTIVO=:motivo, 
                FK_USUARIOS_USU_ID=:usuario 
                WHERE
                OUV_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':recado', $ouvidoria->__get('OUV_RECADO'));
                $stmt->bindParam(':situacao', $ouvidoria->__get('OUV_SITUACAO'));
                $stmt->bindParam(':motivo', $ouvidoria->__get('OUV_MOTIVO'));
                $stmt->bindParam(':usuario', $ouvidoria->__get('FK_USUARIOS_USU_ID'));
                $stmt->bindParam(':id', $ouvidoria->__get('OUV_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function atualizaLista ($ouvidoria){
            try {
                $sql = "UPDATE ouvidoria 
                SET OUV_SITUACAO=:situacao 
                WHERE
                OUV_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':situacao', $ouvidoria->__get('OUV_SITUACAO'));
                $stmt->bindParam(':id', $ouvidoria->__get('OUV_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }



        //Método para excluir um paciente (recebe o $id do Paciente a ser excluído)
        public function excluir($id)
        {
            try {
                $sql = "delete from ouvidoria where OUV_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }


        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($ouvidoria){
            try {
                $sql = "insert into ouvidoria ( 
                OUV_RECADO, 
                OUV_MOTIVO, 
                FK_USUARIOS_USU_ID
                ) 
                values (
                :recado,
                :motivo, 
                :usuario
                )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':recado',  $ouvidoria->__get('OUV_RECADO'));
                $stmt->bindParam(':motivo', $ouvidoria->__get('OUV_MOTIVO'));
                $stmt->bindParam(':usuario', $ouvidoria->__get('FK_USUARIOS_USU_ID'));
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM ouvidoria WHERE OUV_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $ouvidoria = new OuvidoriaModel();

                    $ouvidoria->__set('OUV_RECADO', $result['OUV_RECADO']);
                    $ouvidoria->__set('OUV_SITUACAO', $result['OUV_SITUACAO']);
                    $ouvidoria->__set('OUV_MOTIVO', $result['OUV_MOTIVO']);
                    $ouvidoria->__set('OUV_ID', $result['OUV_ID']);
                    $ouvidoria->__set('FK_USUARIOS_USU_ID', $result['FK_USUARIOS_USU_ID']);
                    

                    return $ouvidoria;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }