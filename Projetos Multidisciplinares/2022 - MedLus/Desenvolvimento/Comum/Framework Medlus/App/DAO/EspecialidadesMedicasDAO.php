<?php

namespace App\DAO;

use App\DAO;
use App\Model\EspecialidadesMedicasModel;
    
    class EspecialidadesMedicasDAO extends DAO{

        //Listando todos os dados da tabela pacientes em ordem crescente de ESP_ID
        public function listar(){
            try {
                $EspecialidadesMedicas = array();
                $sql = "SELECT * FROM especialidades ORDER BY ESP_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $EspecialidadesMedica = new EspecialidadesMedicasModel();
                    $EspecialidadesMedica->__set('ESP_ID', $row['ESP_ID']);
                    $EspecialidadesMedica->__set('ESP_NOME', $row['ESP_NOME']);

                    array_push($EspecialidadesMedicas, $EspecialidadesMedica); //Inserindo os dados persistidos da tabela em um array
                }

                return $EspecialidadesMedicas; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }



        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($EspecialidadesMedica){
            try {
                $sql = "UPDATE especialidades 
                SET ESP_NOME=:nome
                WHERE
                ESP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $EspecialidadesMedica->__get('ESP_ID'));
                $stmt->bindParam(':nome', $EspecialidadesMedica->__get('ESP_NOME'));

             

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function atualizaLista ($EspecialidadesMedica){
            try {
                $sql = "UPDATE especialidades 
                SET ESP_NOME=:nome 
                WHERE
                ESP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':nome', $EspecialidadesMedica->__get('ESP_NOME'));
                $stmt->bindParam(':id', $EspecialidadesMedica->__get('ESP_ID'));

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
                $sql = "delete from especialidades where ESP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error502');
                die();
            }
        }


        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($EspecialidadesMedica){
            try {
                $sql = "insert into especialidades ( 
                ESP_NOME
                ) 
                values (
                :nome
                )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':nome', $EspecialidadesMedica->__get('ESP_NOME'));

                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM especialidades WHERE ESP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $EspecialidadesMedica = new EspecialidadesMedicasModel();
                    $EspecialidadesMedica->__set('ESP_ID', $result['ESP_ID']);
                    $EspecialidadesMedica->__set('ESP_NOME', $result['ESP_NOME']);

                  
                    

                    return $EspecialidadesMedica;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }